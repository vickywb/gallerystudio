<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository {

    private $model;

    public function __construct(Transaction $model) {
        $this->model = $model;
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(Transaction $transaction)
    {
        $transaction->save();

        return $transaction;
    }
}