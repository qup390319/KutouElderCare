<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function get_login_page()
    {
        return view('pages.login');
    }

    public function post_login_page(Request $request)
    {
        $account = $request->get('account');
        $password = $request->get('password');
//
//        //資料庫的比對，有比對到管理員身分auth = admin,比對到一班使用者auth = normal

        if ($account==''){
            return redirect()->route('get_login_page');
        }
        if ($password==''){
            return redirect()->route('get_login_page');
        }

        $user_data = DB::table('user_data')
            ->where('account', $account)
            ->where('password', $password)
            ->first();
//        $auth = 'none';

        $result = [
            'user_id' => $user_data->user_id,
        ];


        if ($user_data) {
            $auth = $user_data->auth;
        }
//
        if ($auth == '0') {
            //return 管理員
            return redirect()->route('all_people',$result);
        }
        if ($auth == '1') {
            //return 一般使用者
            return redirect()->route('person_data',$result);
        }
        if ($auth === 'none') {
            return redirect()->route('get_login_page');
        }

    }
}
