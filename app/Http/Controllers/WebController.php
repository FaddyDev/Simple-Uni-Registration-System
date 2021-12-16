<?php

namespace App\Http\Controllers;

use Session;
use App\Cluster;
use App\Course;
use App\MoreDetail;
use App\RegisterUser;
use App\School;
use App\sms\AfricasTalkingGateway;
use App\sms\AfricasTalkingGatewayException;
use App\Subject;
use App\RegServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class WebController extends Controller
{
    public function Login(Request $request)
    {
        $idno = $request->input('idnumber');
//        $phone = $request->input('regNo');
        $regno = $request->input('regNo');

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
            Session::put('is_logged',true);
            Session::put('regno',$regno);
            Session::put('idno',$idno);
            Session::put('photo',$data->photo);
            Session::put('course_id',$data->course_id);

//            dd($fetch);
            return view('/Respond', ['data' => $fetch]);
        }

    }


    public function AddSchool(Request $request)
    {

        $sch = new School();
        $sch->school = $request->input('schoolname');
        $sch->status = 1;
        $sch->save();

        $data = DB::table('schools')->get();

        return view('AddSchool')->with('success','School added successfully')->with('schools',$data);

    }

    public function AddCourse(Request $request)
    {

        $sch = new Course();
        $sch->course = $request->input('coursename');
        $sch->school_id = $request->input('school_id');
        $sch->level = $request->input('level');
        $sch->status = 1;
        $sch->save();

        $fetch=DB::table('schools')
        ->where('status','=',1)
        ->get();
    $data= array(
        'data'=>$fetch
    );

    $courses=DB::table('courses')
    ->join('schools', 'courses.school_id', '=', 'schools.id')
    ->get();
    return view('AddCourse',$data)->with('courses',$courses)->with('success','Course added successfully');

    }

    public function AddCluster(Request $request)
    {

        $sch = new Cluster();
        $sch->course_id = $request->input('course_id');
        $sch->maths = $request->input('maths');
        $sch->languages = $request->input('languages');
        $sch->sciences = $request->input('sciences');
        $sch->aggregate = $request->input('total');
        $sch->status = 1;
        $sch->save();

        $fetch=DB::table('courses')
        ->where('status','=',1)
        ->get();
    $data= array(
        'data'=>$fetch
    );

    $clusters=DB::table('clusters')
    ->join('courses', 'clusters.course_id', '=', 'courses.id')
    ->get();
    return view('AddCluster',$data)->with('clusters',$clusters)->with('success','Cluster added successfully');
    }

    public function Checkpoint(Request $request)
    {
        try {

            $csid = $request->input('course_id');
            $maths = $request->input('maths');
            $lang = $request->input('languages');
            $scien = $request->input('sciences');
            $tot = $request->input('total');


            $fetch = DB::table('clusters')
                ->where('status', '=', 1)
                ->where('course_id', '=', $csid)
                ->first();

            if (!$fetch) {
                return redirect('/checkpoint');
            } else {
                $confmath = $fetch->maths;
                $conflang = $fetch->languages;
                $confsci = $fetch->sciences;
                $conftot = $fetch->aggregate;


                if (
                    $maths >= $confmath &&
                    $lang >= $conflang &&
                    $scien >= $confsci &&
                    $tot >= $conftot

                ) {
                    return redirect()->route('checkpoint')->with('success','You qualify for the course, go ahead and apply for it!');
                } else {
                    return redirect()->route('checkpoint')->with('fail','You do not qualify for the course, try another!!');
                }
            }
        } catch (Exception $e) {
        }
    }

    public function RegisterUser(Request $request)
    { 
        $this->validate($request, ['photo' => 'max:2048','birth' => 'max:2048','result' => 'max:2048','national' => 'max:2048',]);

         $idd = $request->input('id_no');
        if ($request->has('photo', 'birth', 'result', 'national')) {
            $filename = $request->photo->getClientOriginalName();
            $birth_certificate = $request->birth->getClientOriginalName();
            $result_certificate = $request->result->getClientOriginalName();
            $id_copy = $request->national->getClientOriginalName();
           /* $request->photo->storeAs('public/uploads', $filename);
            $request->birth->storeAs('public/uploads', $birth_certificate);
            $request->result->storeAs('public/uploads', $result_certificate);
            $request->national->storeAs('public/uploads', $id_copy);*/
            $request->photo->move(public_path('/storage/uploads'), $filename);
            $request->birth->move(public_path('/storage/uploads'), $birth_certificate);
            $request->result->move(public_path('/storage/uploads'), $result_certificate);
            $request->national->move(public_path('/storage/uploads'), $id_copy);


            $reg = new RegisterUser();
            $reg->fullname = $request->input('fullname');
            $reg->phonenumber = $request->input('phonenumber');

            $reg->id_number = $idd;
            $reg->address = $request->input('address');
            $reg->status = 0;

            $reg->parentfullname = $request->input('parentfullname');
            $reg->parentphonenumber = $request->input('parentphonenumber');
            $reg->parentid_number = $request->input('parentid_no');
            $reg->highschool = $request->input('highschool');
            $reg->index_number = $request->input('index_number');
            $reg->points = $request->input('pointsattained');
            $reg->course_id = $request->input('course_id');

            $reg->photo = $filename;
            $reg->birth_certificate = $birth_certificate;
            $reg->result_certificate = $result_certificate;
            $reg->id_copy = $id_copy;

            $reg->save();
            return redirect('login/student');
        }
    }

    public function UploadNotes(Request $request)
    {
        $this->validate($request, ['uploadnotes' => 'max:2048',]);


        if ($request->hasFile('uploadnotes')) {
            $filename = $request->uploadnotes->getClientOriginalName();
            //$request->uploadnotes->storeAs('public/uploads', $filename);
            $request->uploadnotes->move(public_path('/storage/uploads'), $filename);

            $school_id = DB::table('courses')->where('id','=',$request->input('course_id'))->value('school_id');

            $reg = new Subject();
            $reg->subject = $request->input('unitname');
            $reg->school_id = $school_id;
            $reg->course_id = $request->input('course_id');
            $reg->notes = $filename;
            $reg->status = 1;

            $reg->save();

            $fetch=DB::table('courses')
            ->where('status','=',1)
            ->get();
        $data= array(
            'courses'=>$fetch
        );
        return view('UploadNotes',$data)->with('success','Notes uploaded sucessfully');
        }
    }

    public function Accept($id)
    {


        $new = DB::table('register_users')
            ->join('courses', 'register_users.course_id', '=', 'courses.id')
            ->where('register_users.id', '=', $id)
            ->first();


        $school = $new->school_id;
        $fname = $new ->fullname;
        $pphone = $new->phonenumber;
        $iddno = $new ->id_number;

        if ($school == 1) {

            $con = "C027-02-";
            $year = "/2018";

        } elseif ($school == 2) {
            $con = "E027-02-";
            $year = "/2018";
        } elseif ($school == 3) {
            $con = "B027-02-";
            $year = "/2018";
        } elseif ($school == 4) {
            $con = "S027-02-";
            $year = "/2018";
        } elseif ($school == 5) {
            $con = "H027-02-";
            $year = "/2018";
        }  elseif ($school == 6) {
            $con = "G027-02-";
            $year = "/2018";
        } else {
            $con = "Z027-02-";
            $year = "/2018";
        }


        $code = mt_rand(1000, 99999);
        $fin = $con . $code . $year;

        $add = new MoreDetail();
        $add->student_id = $id;
        $add->reg_number = $fin;
        $add->status = 1;
       $add->save();

       $reg = RegisterUser::find($id);
       $reg->status = 1; //Student accepted
       $reg->save();


        $message="Dear ".$fname.",Your request to join Dedan Kimathi University was approved. Here is your registration number  :".$fin." and your ID number:".$iddno." Use them to access the school's portal";
        //$recipients="+254716177880";


        $recipients=$pphone;


        $username   = "vyctarpytar";
        $apikey     = "d7280ebc60417760858f05d4abbc90088bffd92628a4a6088f3259b7185ba057";
        // Specify the numbers that you want to send to in a comma-separated list
        // Please ensure you include the country code (+254 for Kenya in this case)
        //    $recipients = "+254723108293,+254716177880";
        // And of course we want our recipients to know what we really do
        //        $message    = "Evening Sir";
        // Create a new instance of our awesome gateway class
        $gateway    = new AfricasTalkingGateway($username, $apikey);
        // Any gateway error will be captured by our custom Exception class below,
        // so wrap the call in a try-catch block
        try
        {
            // Thats it, hit send and we'll take care of the rest.
            $results = $gateway->sendMessage($recipients, $message);

            return redirect('home')-> with('status','messasge sent successfully');

        }
        catch ( AfricasTalkingGatewayException $e )
        {
            echo "Encountered an error while sending: ".$e->getMessage();
        }
        //
//        return redirect('home');
    }


    public function Decline($id)
    {
        $new = DB::table('register_users')
            ->where('id', '=', $id)
            ->first();
        
            //$data= array('data'=>$new );
        $fname = $new ->fullname;
        $pphone = $new->phonenumber;

        $message="Dear ".$fname.", your request to join Dedan Kimathi University was declined. Contact us via 0713123021 to find out why.";
        //$recipients="+254716177880";

        $recipients=$pphone;

        $username   = "vyctarpytar";
        $apikey     = "d7280ebc60417760858f05d4abbc90088bffd92628a4a6088f3259b7185ba057";
        // Specify the numbers that you want to send to in a comma-separated list
        // Please ensure you include the country code (+254 for Kenya in this case)
        //    $recipients = "+254723108293,+254716177880";
        // And of course we want our recipients to know what we really do
        //        $message    = "Evening Sir";
        // Create a new instance of our awesome gateway class
        $gateway    = new AfricasTalkingGateway($username, $apikey);
        // Any gateway error will be captured by our custom Exception class below,
        // so wrap the call in a try-catch block
        try
        {
            // Thats it, hit send and we'll take care of the rest.
            $results = $gateway->sendMessage($recipients, $message);

            return redirect('home')-> with('status','messasge sent successfully');

        }
        catch ( AfricasTalkingGatewayException $e )
        {
            echo "Encountered an error while sending: ".$e->getMessage();
        }
        //
//        return redirect('home');
    }
    public function Requests()
    {
        $regs=DB::table('registrar_services')
        ->where('status','0')
        ->get();
        
        return view('ViewRequests')->with('regs', $regs);
        
    }
    public function ApproveRequest($id)
    {
        $reg = RegServices::find($id);
        $reg->response = 'Approved';
        $reg->status = 1;
        if($reg->save()){
        $regs=DB::table('registrar_services')
        ->where('status','0')
        ->get();        
        return view('ViewRequests')->with('regs', $regs);}
        else{
            return redirectback()->withErrors();
        }
        
    }

    public function DeclineRequest($id)
    {
        $reg = RegServices::find($id);
        $reg->response = 'Rejected';
        $reg->status = 1;
        if($reg->save()){
        $regs=DB::table('registrar_services')
        ->where('status','0')
        ->get();        
        return view('ViewRequests')->with('regs', $regs);}
        else{
            return redirectback()->withErrors();
        }
        
    }

    public function Logout(){
        Session::flush();
        return redirect('/');
    }
}
