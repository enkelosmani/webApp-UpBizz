<?php

namespace App\Services;


class BaseService
{
    protected $repository;

    public function __construct($repository){
        $this->repository = $repository;
    }

    public function all($pageSize=0){
        return $this->repository->all($pageSize);
    }

    public function find($id){
        return $this->repository->find($id);
    }

    public function save($request){
        $attributes=$request->input();
        return $this->repository->create($attributes);
    }

    public function update($request, $id){
        $attributes=$request->input();
        return $this->repository->update($attributes, $id);
    }

    public function delete($id){
        return $this->repository->delete($id);
    }
}
