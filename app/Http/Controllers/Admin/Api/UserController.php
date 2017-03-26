<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;
use App\User;
use \Auth;
use Illuminate\Http\Request;


/**
 * Class UserController
 * @package App\Http\Controllers\Admin\Api
 */
class UserController extends ApiController
{


    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = Auth::user();
        return $this->responseJsonWith($user, new UserTransformer());
    }


    /**
     * @return \Cyvelnet\Laravel5Fractal\Adapters\ScopeDataAdapter
     */
    public function index()
    {
        $users = User::whereRoleLevel(0)->get();
        return $this->responseWithCollection($users, new UserTransformer());
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserRequest $request)
    {

        $res = $this->userRepository->updateUser($request);

        if ($res == -1) {

            return $this->responseWithArray([
                'status' => 0,
                'message' => 'repeat phone_number!'
            ]);

        } elseif ($res == 0) {

            return $this->responseWithArray([
                'status' => 0,
                'message' => 'update failed!'
            ]);

        } else {

            return $this->responseWithArray([
                'status' => 1,
                'message' => 'update successful!'
            ]);
        }

    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {
        $res = $this->userRepository->updateUser($request);

        if ($res == -1) {

            return $this->responseWithArray([
                'status' => 0,
                'message' => 'repeat phone_number!'
            ]);

        } elseif ($res == 0) {

            return $this->responseWithArray([
                'status' => 0,
                'message' => 'update failed!'
            ]);

        } else {

            return $this->responseWithArray([
                'status' => 1,
                'message' => 'update successful!'
            ]);
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
       $res = $this->userRepository->deleteUserWithId($id);
       if ($res) {
           return $this->responseWithArray([
               'status' => 1,
               'message' => 'delete successful!'
           ]);

       } else {

           return $this->responseWithArray([
               'status' => 0,
               'message' => 'delete successful!'
           ]);
       }

    }

    public function importUsersFromExcel(Request $request)
    {

        \Log::alert($request);
        if ($request->hasFile('file')) {
            \Log::alert('含有file');
        } else {
            \Log::alert('不含');
        }
    }




}
