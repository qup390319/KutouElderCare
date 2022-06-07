<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
//    public function residents_all()
//    {
//        return view('pages.residents');
//    }
    public function person_data(Request $request)
    {
        $user_id = $request->get('user_id');

        $user_data = DB::table("user_data")
            ->where('user_id', $user_id)
            ->first();

        $id_num = $user_data->id_num;

        $detail_data=DB::table("user_detail")
            ->where('id_num', $id_num)
            ->first();

        $result = [
            'user_data' => $user_data,
            'detail_data'=>$detail_data,
        ];

        return view('pages.person', $result);
    }

    public function all_people()
    {
        $data = DB::table('user_data')
            ->get();

        $result = [
            'data' => $data,

        ];

        return view('pages.residents', $result);
    }

//    public function test()
//    {
//        $data = DB::table('as;dfkljas;dlfkj')
//            ->where('a;sdlkf',$val)
//            ->get()
//
//        $result = [
//            'test' => $data,
//        ];
//
//
//        return View('123',$result);
//        $data = ['a','b','c'];
////        foreach($data as $key => $row){
////            return $key;// => 2
////        }
//    }


    //
}
