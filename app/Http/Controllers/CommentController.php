<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;

use App\Comment;
use App\Services\MainService;

class CommentController extends Controller
{

    private $Comment;
    private $mainService;

    public function __construct(Comment $Comment, MainService $mainService)
    {
        $this->Comment = $Comment;
        $this->mainService = $mainService;
    }

    public function index()
    {
        $comments = $this->mainService->all($this->Comment);
        return view('Comment.index', compact('comments'));
    }

    public function query()
    {
        $query = $this->mainService->query($this->Comment)->select('name')->where('id', 1)->first();
    }

    public function create()
    {
        return view('Comment.create');
    }

    public function store(CommentRequest $request)
    {
        $this->mainService->store($this->Comment, $request->toArray());
        return redirect()->back()->withInput()->with('success', 'We Have New Comment');
    }


    public function show($contactId)
    {
        $contact = $this->mainService->findById($this->Comment, $contactId);
        return view('Comment.show', compact('contact'));
    }


    public function edit($contactId)
    {
        $contact = $this->mainService->edit($this->Comment, $contactId);
        return view('Comment.edit', compact('contact'));
    }

    public function update(CommentRequest $request, $contactId)
    {
        $this->mainService->update($this->Comment, $request->toArray(), $contactId);
        return redirect()->back()->withInput()->with('success', 'Comment Updated Successfully');
    }


    public function destroy($contactId)
    {
        $this->mainService->delete($this->Comment, $contactId);
        return redirect()->route('comment.index');
    }
}
