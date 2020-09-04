<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface ServiceInterface
{
    public function all(Model $model) : object;

    public function query(Model $model) : object;

    public function findById(Model $model, $id) : object;

    public function store(Model $model, $data) : void;

    public function edit(Model $model, $id) : object;

    public function update(Model $model, $data, $id) : void;

    public function delete(Model $model, $id) : void;
}