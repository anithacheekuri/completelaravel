<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentGateWay extends Controller
{
    //
    public function payment(Request $request){
       
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:test_5b8b91741f5ca5919fe486e8a1e",
                          "X-Auth-Token:test_47fac8bdebef0a4211d5140c24b"));
        $payload = Array(
            'purpose' =>$request->pppppp,
            'amount' => $request->ppp,
            'phone' => $request->phone,
            'buyer_name' => $request->name,
            'redirect_url' => 'http://local.laravel.com/redirect',
            'send_email' => false,
            //'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => false,
            'email' =>$request->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 
        
     echo $response;

        //echo 'http://local.laravel.com/response',


       $data = json_decode($response,true);
        return redirect($data['payment_request']['longurl']);
       
    
    }
       

    public function redirect(Request $request){

        $data = json_encode($request->all(),true);
       
        /*$json = '{"countryId":"84","productId":"1","status":"0","opId":"134"}';
        $json = json_decode($json, true);
        echo $json['countryId'];
        echo $json['productId'];*/

        $data = json_decode($data, true);
        echo $payment_status = $data['payment_status'];
      
      /*$payment_status = $data['payment_request']['payment_status'];

     echo $payment_status;
      $payment_id = $data['payment_request']['payment_id'];
      $payment_request_id = $data['payment_request']['payment_request_id'];*/

      if( $payment_status=='Credit' ){

       // return redirect($data['payment_request']['longurl']);
        echo 'Transaction has been succesful , please continue shopping';
        echo "<a href ='http://local.laravel.com/shopping'> website</a>" ;
     
    }
    else{

        echo 'Transaction has been failed , please contact helpdesk';
        echo "<a http://local.laravel.com/failedTransacton> file </a>" ;
    }
    // return view('sucessPage',['response'=>$response]);
    }

    public function failedTransacton(){

        // return "thank you purchasing";
 
         return view('responsepage');
     }

     public function sucessTransacton(){

        // return "thank you purchasing";
 
         return view('sucessPage');
     }
}
