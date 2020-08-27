<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ContactRepositoryInterface
{
    public function all();

    public function findById($contactId);

    public function findByName($customerName);

    public function findByPhone($customerPhone);

    public function store(Request $request);

    public function edit($contactId);

    public function update(Request $request, $contactId);

    public function delete($contactId);

    public function validateRequest(Request $request);
}