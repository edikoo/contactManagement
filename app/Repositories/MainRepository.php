<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Traits\LogAndNotificationTrait;
use App\Services\LogService;


use App\Events\NotificationEvent;


class MainRepository implements Interfaces\RepositoryInterface
{
    use LogAndNotificationTrait;

    public function all($model) : object 
    {
        return $model::orderBy('name')
            ->get()
            ->map
            ->format();
    }

    public function query($model) : object
    {
        return $model::query();
    }

    public function findById($model, $id) : object
    {
        return $model::findOrFail($id);
    }

    public function store($model, $data) : void
    {
        DB::transaction(function () use ($model, $data) {
            $create = new $model;
            $create->create($data->toArray());

            $this->createLog("Inserted New Data");

            event(new NotificationEvent("Created New Record In Database"));

        });
    }

    public function edit($model, $id) : object
    {
        return $model::findOrFail($id);
    }

    public function update($model, $data, $id) : void
    {
        DB::transaction(function () use ($model, $data, $id) {
            $update = $model::findOrFail($id);
            $update->update($data->toArray());

            $this->createLog("Updated Current Data! Id: ".$id);

            event(new NotificationEvent("Updated Current Record In Database"));
        });

    }

    public function delete($model, $id) : void
    {
        $model = $model::findOrFail($id)->delete();
    }

}
