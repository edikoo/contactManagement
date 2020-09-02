<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Repositories\Interfaces\IqueryableRepositoryInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    private $commentRepository;

    public function __construct(IqueryableRepositoryInterface $commentRepository)
    {

        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        $comments = $this->commentRepository->all();
        return view('Comment.index', compact('comments'));
    }

    public function query()
    {
        $query = $this->commentRepository->query()->select('name')->where('id', 1)->first();
    }

    public function create()
    {
        return view('Comment.create');
    }

    public function store(CommentRequest $request)
    {
        $this->commentRepository->store($request->toArray());
        return redirect()->back()->withInput()->with('success', 'We Have New Comment');
    }


    public function show($contactId)
    {
        $contact = $this->commentRepository->findById($contactId);
        return view('Comment.show', compact('contact'));
    }


    public function edit($contactId)
    {
        $contact = $this->commentRepository->edit($contactId);
        return view('Comment.edit', compact('contact'));
    }

    public function update(CommentRequest $request, $contactId)
    {
        $this->commentRepository->update($request->toArray(), $contactId);
        return redirect()->back()->withInput()->with('success', 'Comment Updated Successfully');
    }


    public function destroy($contactId)
    {
        $this->commentRepository->delete($contactId);
        return redirect()->route('comment.index');
    }
}
