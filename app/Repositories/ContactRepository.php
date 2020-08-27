<?php

namespace App\Repositories;

use App\Contact;
use Illuminate\Http\Request;

class ContactRepository
{

    public function all()
    {
        return Contact::orderBy('name')
            ->get()
            ->map
            ->format();
    }

    public function findById($contactId)
    {
        return Contact::findOrFail($contactId)->format();
    }

    public function findByName($customerName)
    {
        return Contact::where('name', $customerName)->firstOrFail();
    }

    public function findByPhone($customerPhone)
    {
        return Contact::where('phone', $customerPhone)->firstOrFail();
    }

    public function store(Request $request)
    {
        $data = $this->validateRequest($request);

        $contact = new Contact;
        $contact->create($data);
    }

    public function edit($contactId)
    {
        return Contact::findOrFail($contactId);
    }

    public function update(Request $request, $contactId)
    {
        $data = $this->validateRequest($request);

        $contact = Contact::findOrFail($contactId);
        $contact->update($data);
    }

    public function delete($contactId)
    {
        $contact = Contact::findOrFail($contactId)->delete();
    }

    public function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|min:8|max:11'
        ]);
    }
}
