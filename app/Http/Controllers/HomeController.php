<?php

namespace App\Http\Controllers;

use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use mysql_xdevapi\Result;

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

        $detail_data = DB::table("user_detail")
            ->where('id_num', $id_num)
            ->first();

        $result = [
            'user_data' => $user_data,
            'detail_data' => $detail_data,
        ];

        return view('pages.person', $result);
    }


    public function get_date_data(Request $request)
    {
        $user_id = $request->get('user_id');
        $date = $request->get('date');

        $user_data = DB::table("user_data")
            ->where('user_id', $user_id)
            ->first();
        $id_num = $user_data->id_num;


        $detail_data = DB::table("user_detail")
            ->where('id_num', $id_num)
            ->where('record_date', $date)
            ->first();
        if ($detail_data === null) {
            return 'none';
        }

        return $detail_data;
    }

    //person_ordinary
    public function person_ordinary_data(Request $request)
    {
        $user_id = $request->get('user_id');

        $user_data = DB::table("user_data")
            ->where('user_id', $user_id)
            ->first();

        $id_num = $user_data->id_num;

        $detail_data = DB::table("user_detail")
            ->where('id_num', $id_num)
            ->first();

        $result = [
            'user_data' => $user_data,
            'detail_data' => $detail_data,
        ];

        return view('pages.person_ordinary', $result);
    }

    public function get_ordinary_date_data(Request $request)
    {
        $user_id = $request->get('user_id');
        $date = $request->get('date');

        $user_data = DB::table("user_data")
            ->where('user_id', $user_id)
            ->first();
        $id_num = $user_data->id_num;


        $detail_data = DB::table("user_detail")
            ->where('id_num', $id_num)
            ->where('record_date', $date)
            ->first();
        if ($detail_data === null) {
            return 'none';
        }

        return $detail_data;
    }

    //person_ordinary

    public function edit_person_data(Request $request)
    {
        $user_id = $request->get('user_id');
        $date = $request->get('date');

        $user_data = DB::table("user_data")
            ->where('user_id', $user_id)
            ->first();
        $id_num = $user_data->id_num;

        DB::table("user_detail")
            ->where('id_num', $id_num)
            ->where('record_date', $date)
            ->update([
                'blood' => $request->blood,
                'hand' => $request->hand,
                'sit' => $request->sit,
                'walk' => $request->walk,
                'user_tall' => $request->tall,
                'user_weight' => $request->weight,
                'user_bfr' => $request->user_bfr,
            ]);
    }

    public function insert_person_data(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_data = DB::table("user_data")
            ->where('user_id', $user_id)
            ->first();
        $id_num = $user_data->id_num;

        DB::table("user_detail")
            ->insert([
                'id_num' => $id_num,
                'record_date' => $request->date,
                'blood' => $request->blood,
                'hand' => $request->hand,
                'sit' => $request->sit,
                'walk' => $request->walk,
                'user_tall' => $request->tall,
                'user_weight' => $request->weight,
                'user_bfr' => $request->user_bfr,
            ]);
    }


//    residents
    public function all_people()
    {
        $data = DB::table('user_data')
            ->orderBy('user_name', 'asc')
            ->get();


        $result = [
            'data' => $data,
        ];

        return view('pages.residents', $result);
    }


    public function insert_residents_data(Request $request)
    {

        try {
            $password = substr($request->add_id_num, -4);
            $birthday=substr($request->birthday, -4);
            DB::table("user_data")
                ->insert([
                    'id_num' => $request->add_id_num,
                    'user_name' => $request->add_name,
                    'account' => $request->add_id_num,
                    'password' => $password.$birthday,
                    'user_birth'=>$request->user_birth,
                    'auth' => 1,
                ]);
        }catch (\Exception $exception){
            return $exception;
        }

    }

    public function delete_residents_data(Request $request)
    {
        $user_id = $request->user_id;
        DB::table("user_data")
            ->where('user_id', $user_id)
            ->delete();

        return redirect()->back();
    }

    public function search_residents_data(Request $request)
    {
        try {

            $key_word = $request->key_word;

            $repeat = DB::table('user_data')
                ->groupBy('user_name')
                ->having(DB::raw('count(user_name)'), '>', 1)
                ->get('user_name');

            $data = DB::table('user_data')
                ->where('user_name', 'like', '%' . $key_word . '%')
                ->orderBy('user_name', 'asc')
                ->get();
//            select userName from Dept group by userName having count(*) > 1


            $result = [
                'data' => $data,
                'repeat' => $repeat
            ];

            return $result;
        } catch (Exception $exception) {
            return $exception;
        };


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
