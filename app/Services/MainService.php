<?php


namespace App\Services;


use App\Comment;
use App\Repositories\MainRepository;


class MainService implements Interfaces\ServiceInterface
{

    private $mainRepository;

    public function __construct(MainRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }


    public function all($model) : object
    {
        return $all = $this->mainRepository->all($model);
    }

    public function query($model) : object
    {
        return $query = $this->mainRepository->query($model);
    }

    public function findById($model, $id) : object
    {
        return $this->mainRepository->findById($model, $id);
    }

    public function store($model, $data) : void
    {
        $store = $this->mainRepository->store($model, $data);
    }

    public function edit($model, $id) : object
    {
        return $edit = $this->mainRepository->edit($model, $id);
    }

    public function update($model, $data, $id) : void
    {
        $this->mainRepository->update($model, $data, $id);
    }

    public function delete($model, $id) : void
    {
        $this->mainRepository->delete($model, $id);
    }
}