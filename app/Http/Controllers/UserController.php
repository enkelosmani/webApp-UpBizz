<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = $this->userService->getUserWithPosts(Auth::id()); // Fix negative ID
        if (!$user) {
            abort(404, 'User not found');
        }
        return view('users.index', compact('user'));
    }

    public function show(User $user)
    {
        $user->load(['posts' => function ($query) {
            $query->with('content');
        }]);
        return view('users.show', compact('user'));
    }
}
