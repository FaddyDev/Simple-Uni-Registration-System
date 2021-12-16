<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetch=DB::table('register_users')
        ->select('register_users.id', 'course','fullname','phonenumber','id_number', 'photo', 'birth_certificate', 'result_certificate', 'id_copy', 'points')
        ->join('courses','register_users.course_id','=','courses.id')
            ->where('register_users.status','=',0)
            ->get();
        $data= array(
            'data'=>$fetch
        );
        return view('ViewBook',$data);
    }
}
