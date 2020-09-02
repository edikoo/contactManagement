<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface IqueryableRepositoryInterface
{
    public function all();

    public function query();

    public function findById($contactId);

    public function findByName($customerName);

    public function store(Request $request);

    public function edit($contactId);

    public function update(Request $request, $contactId);

    public function delete($contactId);
}