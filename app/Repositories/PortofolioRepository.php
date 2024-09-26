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
            })
            ->when(!empty($params['search']['title']), function ($query) use ($params) {
                return $query->where('title', 'like', '%' . $params['search']['title'] . '%');
            })
            ->when(!empty($params['search']['category']), function ($query) use ($params) {
                return $query->whereHas('category', function ($query) use ($params) {
                    return $query->where('title', 'like', '%' . $params['search']['category'] . '%');
                });
                
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

    public function store(Portofolio $portofolio)
    {
        $portofolio->save();

        return $portofolio;
    }
}