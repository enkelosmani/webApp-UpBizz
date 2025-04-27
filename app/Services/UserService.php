<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService {

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository);
        $this->userRepository=$userRepository;
    }
    public function create($request){
        $attributes=$request->only('firstname','lastname','email','password');
        $attributes['password']=Hash::make($attributes['password']);
        return $this->save($request->merge($attributes));
    }
    public function updateUser($request,$id){
        $attributes=$request->only('firstname','lastname','email','password');
        $attributes['password']=Hash::make($attributes['password']);
        return $this->update($request->merge($attributes),$id);
    }

    public function getUserWithPosts($userId)
    {
        return User::with(['posts' => function ($query) {
            $query->with('content');
        }])->find($userId);
    }
}
