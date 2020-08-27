<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    private $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {

        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        $contacts = $this->contactRepository->all();
        return view('index', compact('contacts'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->contactRepository->store($request);
        return redirect()->back()->withInput()->with('success', 'We Have New Contact');
    }


    public function show($contactId)
    {
        $contact = $this->contactRepository->findById($contactId);
        return view('show', compact('contact'));
    }


    public function edit($contactId)
    {
        $contact = $this->contactRepository->edit($contactId);
        return view('edit', compact('contact'));
    }

    public function update(Request $request, $contactId)
    {
        $this->contactRepository->update($request, $contactId);
        return redirect()->back()->withInput()->with('success', 'Contact Updated Successfully');
    }


    public function destroy($contactId)
    {
        $this->contactRepository->delete($contactId);
        return redirect()->route('index');
    }
}
