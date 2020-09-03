<?php

namespace App\Repositories;

use App\Comment;
use App\Services\LogService;
use Illuminate\Support\Facades\DB;

use App\Events\NotificationEvent;


class CommentRepository implements Interfaces\IqueryableRepositoryInterface
{
    public function all()
    {
        return Comment::orderBy('name')
            ->get()
            ->map
            ->format();
    }

    public function query()
    {
        return Comment::query();
    }

    public function findById($commentId)
    {
        return Comment::findOrFail($commentId)->format();
    }

    public function findByName($customerName)
    {
        return Comment::where('name', $customerName)->firstOrFail();
    }

    public function store($data)
    {
        DB::transaction(function () use ($data) {
            $comment = new Comment;
            $comment->create($data);

            $LogService = new LogService;
            $LogService->createLog("Inserted New Comment");

            event(new NotificationEvent("Created New Record In Database"));

        });
    }

    public function edit($commentId)
    {
        return Comment::findOrFail($commentId);
    }

    public function update($data, $commentId)
    {
        DB::transaction(function () use ($data, $commentId) {
            $comment = Comment::findOrFail($commentId);
            $comment->update($data);

            $LogService = new LogService;
            $LogService->createLog("Updated Current Data! commentId: ".$commentId);

            event(new NotificationEvent("Updated Current Record In Database"));

        });

    }

    public function delete($commentId)
    {
        $contact = Comment::findOrFail($commentId)->delete();
    }

}
