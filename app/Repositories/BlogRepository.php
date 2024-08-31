<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository {

    private $model;

    public function __construct(Blog $model) {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $blogs = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            });
        
        if (!empty($params['pagination'])) {
            return $blogs->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page');
        }

        return $blogs->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(Blog $blog)
    {
        $blog->save();

        return $blog;
    }
}