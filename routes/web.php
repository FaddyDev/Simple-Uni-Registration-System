<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    $fetch=DB::table('register_users')
        ->where('status','=',1)
        ->get();
    $data= array(
        'data'=>$fetch
    );
    return view('ViewBook',$data);
});

Route::get('/map', function () {
    return view('contact');
});

Route::get('/','BladeController@IndexBlade');
Route::get('/users','BladeController@UsersBlade');
Route::get('/addschool','BladeController@AddSchool');
Route::get('/addcourse','BladeController@AddCourse');
Route::get('/addcluster','BladeController@AddCluster');
Route::get('/checkpoint','BladeController@CheckpointBlade')->name('checkpoint');
Route::get('/login/student','BladeController@LoginBlade');
Route::get('/view/book','BladeController@BookedBlade');
Route::get('/upload/notes','BladeController@UploadNotes');
Route::get('/student/index','BladeController@StudentIndex');
Route::get('/student','BladeController@StudentHome');
Route::get('/download/notes','BladeController@DownloadNotes');
Route::get('/regservices','BladeController@RegServices');
Route::post('/regservice','BladeController@RegService');




//post data
Route::get('/decline/{id}','WebController@Decline');
Route::get('/accept/{id}','WebController@Accept');
Route::post('/add/school','WebController@AddSchool');
Route::post('/subject/notes',['as'=>'fileUpload','uses'=>'WebController@UploadNotes']);
Route::post('/login/user','WebController@Login');
Route::get('/logout','WebController@Logout');
Route::post('/add/course','WebController@AddCourse');
Route::post('/add/cluster','WebController@AddCluster');
Route::post('/check/point','WebController@Checkpoint');
Route::post('/register/user',['as'=>'fileUpload','uses'=>'WebController@RegisterUser']);
Route::get('/requests','WebController@Requests');
Route::get('/approveReq/{id}','WebController@ApproveRequest');
Route::get('/declineReq/{id}','WebController@DeclineRequest');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
