<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository {

    private $model;

    public function __construct(Contact $model) {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $contacts = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            })
            ->when(!empty($params['search']['name']), function ($query) use ($params) {
                return $query->where('name', 'like', '%' . $params['search']['name'] . '%');
            })
            ->when(!empty($params['search']['email']), function ($query) use ($params) {
                return $query->where('email', 'like', '%' . $params['search']['email'] . '%');
            })
            ->when(!empty($params['search']['date']), function ($query) use ($params) {
                return $query->where('created_at', 'like', '%' . $params['search']['date'] . '%');
            });

        if (!empty($params['pagination'])) {
            return $contacts->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page');
        }

        return $contacts->get();
    }

    public function findByColumn($value, $column) 
    {
        $this->model->where($column, $value)->first();
    }

    public function store(Contact $contact)
    {
        $contact->save();

        return $contact;
    }
}