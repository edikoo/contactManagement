<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\Interfaces\IqueryableRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    private $contactRepository;

    public function __construct(IqueryableRepositoryInterface $contactRepository)
    {

        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        $contacts = $this->contactRepository->all();
        return view('Contact.index', compact('contacts'));
    }

    public function query()
    {
        $query = $this->contactRepository->query();
    }

    public function create()
    {
        return view('Contact.create');
    }

    public function store(ContactRequest $request)
    {
        $this->contactRepository->store($request->toArray());
        return redirect()->back()->withInput()->with('success', 'We Have New Contact');
    }

    public function show($contactId)
    {
        $contact = $this->contactRepository->findById($contactId);
        return view('Contact.show', compact('contact'));
    }


    public function edit($contactId)
    {
        $contact = $this->contactRepository->edit($contactId);
        return view('Contact.edit', compact('contact'));
    }

    public function update(ContactRequest $request, $contactId)
    {
        $this->contactRepository->update($request->toArray(), $contactId);
        return redirect()->back()->withInput()->with('success', 'Contact Updated Successfully');
    }


    public function destroy($contactId)
    {
        $this->contactRepository->delete($contactId);
        return redirect()->route('index');
    }
}
