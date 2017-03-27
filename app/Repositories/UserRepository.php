<?php

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository {


    /**
     * @var User
     */
    protected $user;

    /**
     * UserRepository constructor.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param Request $request
     * @return int
     */
    public function storeUser(Request $request)
    {
        $userArr = $request->get('user');
        $res = User::wherePhoneNumber($userArr['phone_number'])->get()->count();

        if ($res > 0) {
            return -1;
        }

        if (User::create($userArr)) {

            return 1;
        } else {
            return 0;
        }
    }

    /**
     * @param Request $request
     * @return int
     */
    public function updateUser(Request $request)
    {
        $userArr = $request->get('user');
        $res = User::wherePhoneNumber($userArr['phone_number'])->where('id', '!=', $userArr['id'] )->get()->count();
        if ($res > 0) {
            return -1;
        }

        if (User::whereId($userArr['id'])->update($userArr)) {

            return 1;
        } else {
            return 0;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteUserWithId($id)
    {
        $res = User::destroy($id);
        if ($res> 0) {
            return true;
        } else {
            return false;
        }
    }

}