<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\MainService;

use App\Contact;

class ContactController extends Controller
{

    private $Contact;
    private $mainService;

    public function __construct(Contact $Contact, MainService $mainService)
    {
        $this->Contact = $Contact;
        $this->mainService = $mainService;
    }

    public function index()
    {
        $contacts = $this->mainService->query($this->Contact)->get();



        return view('Contact.index', compact('contacts'));
    }

    public function query()
    {
        $query = $this->mainService->query($this->Contact);
    }

    public function create()
    {
        return view('Contact.create');
    }

    public function store(ContactRequest $request)
    {
        $this->mainService->store($this->Contact, $request);
    }

    public function show($contactId)
    {
        $contact = $this->mainService->findById($this->Contact, $contactId);
        return view('Contact.show', compact('contact'));
    }


    public function edit($contactId)
    {
        $contact = $this->mainService->edit($this->Contact, $contactId);
        return view('Contact.edit', compact('contact'));
    }

    public function update(ContactRequest $request, $contactId)
    {
        $this->mainService->update($this->Contact, $request, $contactId);
        return redirect()->back()->withInput()->with('success', 'Contact Updated Successfully');
    }


    public function destroy($contactId)
    {
        $this->mainService->delete($this->Contact, $contactId);
        return redirect()->route('index');
    }
}
