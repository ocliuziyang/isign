<?php

namespace App\Http\Controllers\Admin\Api;

use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Auth;

class UserController extends ApiController
{


    public function me()
    {
        $user = Auth::user();
        return $this->responseJsonWith($user, new UserTransformer());
    }


    public function fetchUsers()
    {
        $users = User::all();
        return $this->responseWithCollection($users, new UserTransformer());
    }
}
