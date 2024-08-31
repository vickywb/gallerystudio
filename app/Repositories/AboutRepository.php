<?php

namespace App\Repositories;

use App\Models\About;

class AboutRepository {

    private $model;

    public function __construct(About $model)
    {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $abouts = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            });

        if (!empty($params['pagination'])) {
            return $abouts->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page');
        }

        return $abouts->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(About $about)
    {
        $about->save();

        return $about;
    }
}