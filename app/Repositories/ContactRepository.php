<?php

namespace App\Repositories;

use App\Contact;
use App\Services\LogService;
use Illuminate\Support\Facades\DB;

use App\Events\NotificationEvent;

class ContactRepository implements Interfaces\IqueryableRepositoryInterface
{

    public function all()
    {
        return Contact::orderBy('name')
            ->get()
            ->map
            ->format();
    }
    
    public function query()
    {
        return Comment::query();
    }


    public function findById($contactId)
    {
        return Contact::findOrFail($contactId)->format();
    }

    public function findByName($customerName)
    {
        return Contact::where('name', $customerName)->firstOrFail();
    }

    public function store($data)
    {
        DB::transaction(function () use ($data) {
            $contact = new Contact;
            $contact->create($data);

            $LogService = new LogService;
            $LogService->createLog("Inserted New Contact");

            event(new NotificationEvent("Created New Record In Database"));
        });

    }

    public function edit($contactId)
    {
        return Contact::findOrFail($contactId);
    }

    public function update($data, $contactId)
    {
        DB::transaction(function () use ($data, $contactId) {
            $contact = Contact::findOrFail($contactId);
            $contact->update($data);

            $LogService = new LogService;
            $LogService->createLog("Updated Current Data! ContactId: ".$contactId);

            event(new NotificationEvent("Updated Current Record In Database"));
        });
    }

    public function delete($contactId)
    {
        $contact = Contact::findOrFail($contactId)->delete();
    }

}
