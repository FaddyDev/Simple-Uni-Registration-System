<?php

namespace App\Http\Controllers;

use App\FeesUpdate;
use Illuminate\Http\Request;
use App\sms\AfricasTalkingGateway;
use Illuminate\Support\Facades\DB;


class RespondController extends Controller
{

    public function respond(Request $request){

        $studentname = $request->input('name');
       $amount= $request->input('feetopay');

        $arr = DB::table('people')

            ->select(DB::raw('
            people.Firstname as firstname,
            people.Lastname as lastname,
            people.RgNo as regno,
            people.PhoneNumber as phoneno
            '))
            ->where('id', '=', $studentname)
            ->first();

        $firstname=$arr->firstname;
        $secondname=$arr->lastname;
        $regno=$arr->regno;
        $phoneno=$arr->phoneno;



        $acc = new FeesUpdate();
        $code=mt_rand(10000,999999);
        $acc->studentname = $studentname;
        $acc->amountpaid = $amount;
        $acc->TransId = $code;
        $acc->save();


        $message="Dear ".$firstname." ".$secondname.", You have paid ksh: ".$amount." for account:"  .$regno." and PhoneNumber: ".$phoneno." .Your TransAction Code is :  ".$code;
        //$recipients="+254716177880";
        $recipients=$phoneno;

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

            return redirect('finance')-> with('status','messasge sent successfully');

        }
        catch ( AfricasTalkingGatewayException $e )
        {
            echo "Encountered an error while sending: ".$e->getMessage();
        }
        // DONE!!!
    }



}
