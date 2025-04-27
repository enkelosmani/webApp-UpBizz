<?php

namespace App\Repositories\IElequent;

use Illuminate\Database\Eloquent\Model;

interface IBaseRepository
{
    public function all($pageSize);
    public function find($id): ?Model;
    public function create(array $attributes): ?Model;
    public function update(array $attributes, $id): ?Model;
    public function delete($id);
}
