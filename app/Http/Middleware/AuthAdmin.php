<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ( $request->user() && ($request->user()->role_level == 9) ) {

            return $next($request);

        }

        //如果是 ajax 请求
        if ($request->ajax()) {
            \Log::alert('ajax 请求');
            return \Response::json([
                'error' => [
                    'http_code' => 'CODE_Unauthorized',
                    'statusCode' => 401,
                    'message' => 'Unauthorized'
                ]
            ]);
        } else {
            \Log::alert('不是ajax 请求');
        }


        return redirect('dashboard/login');


    }
}
