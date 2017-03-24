<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    //

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLogin(Request $request)
    {

        $res = Auth::attempt(['phone_number' => $request->get('phoneNumber'), 'password' => $request->get('password')], $request->get('rememberToken'));
        if ($res) {
            //success login

            return redirect('admin');
        }

        return back()->withErrors('用户名或密码出错');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect('admin/login');
    }
}
