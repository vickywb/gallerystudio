<?php

namespace App\Repositories;

use App\Models\Package;

class PackageRepository {

    private $model;

    public function __construct(Package $model) {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $packages = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            })
            ->when(!empty($params['search']['title']), function ($query) use ($params) {
                return $query->where('title', 'like', '%' . $params['search']['title'] . '%');
            });

        if (!empty($params['pagination'])) {
            return $packages->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page');
        }

        return $packages->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value);
    }

    public function store(Package $package)
    {
        $package->save();

        return $package;
    }
}