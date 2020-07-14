<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class instamojocontroller extends Controller
{
    
    public function instamojo(Request $request){
       
    
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:test_5b8b91741f5ca5919fe486e8a1e",
                          "X-Auth-Token:test_47fac8bdebef0a4211d5140c24b"));
        $payload = Array(
            'purpose' =>$request->producutname,
            'amount' => $request->ProducutPrice,
            'phone' => $request->phone,
            'buyer_name' => $request->name,
            'redirect_url' => 'http://local.laravel.com/redirect',
            'send_email' => true,
            //'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => true,
            'email' =>$request->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 

        $decodeRes=json_decode($response,true);
        print_r( $decodeRes);
      //  echo $response;
     
      exit;
        $data = json_decode($response,true);

       
        return redirect($data['payment_request']['longurl']);
    
    }

}
