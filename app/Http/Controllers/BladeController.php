<?php

namespace App\Http\Controllers;

use Session;
use App\RegServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BladeController extends Controller
{
    public function IndexBlade(){
        return view('Index');
    }
    public function StudentIndex(){
        return view('StudentIndex');
    }

    public function StudentHome(Request $request)
    {
        $idno = Session::get('idno');
        $regno = Session::get('regno');

        $data = DB::table('register_users')
            ->join('more_details', 'register_users.id', '=', 'more_details.student_id')
            ->where('register_users.id_number', '=', $idno)
            ->where('more_details.reg_number', '=', $regno)
            ->join('courses', 'register_users.course_id', '=', 'courses.id')
            ->first();


        $fetch = array(
            'data' => $data

        );

        if (empty($data)) {
            return redirect('login/student');
        } else {

//            dd($fetch);
            return view('/Respond', ['data' => $fetch]);
        }

    }
    public function DownloadNotes(){
        $cid = Session::get('course_id');
        $schid = DB::table('courses')
        ->where('id', '=', $cid)
        ->value('school_id');
        $new=DB::table('subjects')
        ->where('school_id', '=', $schid)
        ->where('course_id', '=', $cid)
        ->orwhere('course_id', '=', '0')
            ->get();

        //Student details
        $idno = Session::get('idno');
        $regno = Session::get('regno');

        $data = DB::table('register_users')
            ->join('more_details', 'register_users.id', '=', 'more_details.student_id')
            ->where('register_users.id_number', '=', $idno)
            ->where('more_details.reg_number', '=', $regno)
            ->join('courses', 'register_users.course_id', '=', 'courses.id')
            ->first();


        $details = array(
            'notes' => $data

        );

//        dd($fetch);
//        ['data'=>$fetch]
        return view('StudentIndex')->with('datanotes',$new)->with('data', $details);
    }

    public function UploadNotes(){
        $fetch=DB::table('courses')
            ->where('status','=',1)
            ->get();
        $data= array(
            'courses'=>$fetch
        );
        return view('UploadNotes',$data);
    }
    public function LoginBlade(){
        return view('Login');
    }
    public function UsersBlade(){
        $fetch=DB::table('courses')
            ->where('status','=',1)
            ->get();
        $data= array(
            'data'=>$fetch
        );
        return view('Users',$data);
    }
    public function BookedBlade(){
        $fetch=DB::table('register_users')
            ->where('status','=',1)
            ->get();
        $data= array(
            'data'=>$fetch
        );
        return view('ViewBook',$data);
    }
    public function AddSchool(){
        $data = DB::table('schools')->get();
        return view('AddSchool')->with('schools',$data);
    }
    public function AddCourse(){
        $fetch=DB::table('schools')
            ->where('status','=',1)
            ->get();
        $data= array(
            'data'=>$fetch
        );

        $courses=DB::table('courses')
        ->join('schools', 'courses.school_id', '=', 'schools.id')
        ->get();
        return view('AddCourse',$data)->with('courses',$courses);
    }
    public function AddCluster(){
        $fetch=DB::table('courses')
        ->where('status','=',1)
        ->get();
    $data= array(
        'data'=>$fetch
    );

    $clusters=DB::table('clusters')
    ->join('courses', 'clusters.course_id', '=', 'courses.id')
    ->get();
    return view('AddCluster',$data)->with('clusters',$clusters);
    }
    public function CheckpointBlade(){
        $fetch=DB::table('courses')
            ->where('status','=',1)
            ->get();
        $data= array(
            'data'=>$fetch
        );
        return view('CheckPoint',$data);
    }
    public function RegServices()
    {
        $regs=DB::table('registrar_services')
        ->where('student_regno','=',Session::get('regno'))
        ->get();

        //Student details
        $idno = Session::get('idno');
        $regno = Session::get('regno');

        $data = DB::table('register_users')
            ->join('more_details', 'register_users.id', '=', 'more_details.student_id')
            ->where('register_users.id_number', '=', $idno)
            ->where('more_details.reg_number', '=', $regno)
            ->join('courses', 'register_users.course_id', '=', 'courses.id')
            ->first();


        $fetch = array(
            'data' => $data
        );
        return view('RegServices')->with('data2', $regs)->with('data', $fetch);
        
    }

    public function RegService(Request $request)
    {
        $this->validate($request, ['message' => 'required|max:250',]); 

        $reg = new RegServices();
        $reg->service = $request->input('service');
        $reg->student_regno = Session::get('regno');
        $reg->message = $request->input('message');
        $reg->response = 'No Response';
        $reg->status = 0;
        if($reg->save()){
            $regs=DB::table('registrar_services')
            ->where('student_regno','=',Session::get('regno'))
            ->get();

            //Student details
            $idno = Session::get('idno');
            $regno = Session::get('regno');
    
            $data = DB::table('register_users')
                ->join('more_details', 'register_users.id', '=', 'more_details.student_id')
                ->where('register_users.id_number', '=', $idno)
                ->where('more_details.reg_number', '=', $regno)
                ->join('courses', 'register_users.course_id', '=', 'courses.id')
                ->first();
    
    
            $fetch = array(
                'data' => $data
    
            );

             return view('RegServices')->with('success','Your request has been submitted to the registrar. Check later for response')->with('data2', $regs)->with('data', $fetch);
        }else{
        return redirectBack()->withErrors();}

    }
}
