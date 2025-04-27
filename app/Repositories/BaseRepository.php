<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\IElequent\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all($pageSize=0)
    {
        if($pageSize){
            return $this->model->orderBy('id', 'desc')->paginate($pageSize);
        } else {
            return  $this->model->orderBy('id', 'desc')->get();
        }
    }

    public function find($id): ?Model
    {
        return $this->model->where('id',$id)->first();
    }

    public function create(array $attributes): ?Model
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, $id): ?Model
    {
        $model = $this->find($id);
        if($model){
            $model->fill($attributes);
            $model->update();
        }
        return $model;
    }

    public function delete($id){
        $model = $this->find($id);
        if($model){
            $model->delete();
        }
        return false;
    }
}
