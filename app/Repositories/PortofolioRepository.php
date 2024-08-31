<?php

namespace App\Repositories;

use App\Models\Portofolio;

class PortofolioRepository {

    private $model;

    public function __construct(Portofolio $model) {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $portofolios = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            });

        if (!empty($params['pagination'])) {
            return $portofolios->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page');
        }

        return $portofolios->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function save(Portofolio $portofolio)
    {
        $portofolio->save();

        return $portofolio;
    }
}