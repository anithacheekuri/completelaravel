<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Mail;

use App\Mail\OTPMail;

use Illuminate\Support\Facades\Log;

class Signin extends Controller
{

   public function __construct()
    { 
   // $this->middleware('test');
    }
      ###TODO THIS IS LOGON METHOD
   public function login(Request $request){

    return view('signin');


   }


   // admin dashboard 

   public function dashboard(Request $request){

    

  // return view('signin');
  $this->validate($request,[
 
    'email' => 'required',
     'password' => 'required',
 ]);


$email = $request->input('email');

$PassWord =$request->input('password');

if(!empty($email) && !empty($PassWord)){

   $request->session()->put('user',$email);

$re = DB::select('select * from users where email  = ? and password = ?',[$email,$PassWord]);


Log::info($re);



   if(!empty($re)){


     foreach ($re as $value) {
                      
       $array = $value;
               
                           }
                           //print_r($array);
                           $array1 = json_decode(json_encode($array), true);
                           //print_r($array1 ['role']);

                           if($array1 ['role']=='admin'){


                              $mail =  $request->input('email');

                               $OTP =rand(100000,999999);
                             
            
                               Mail::to('sareekacheekuri9@gmail.com')->send(new OTPMail($OTP));

                             /*  $mail =  $request->input('email');

                              Mail::send(['text'=>'mail'],['name'=>'anitha'] ,function($message){

                               $mail = 'sareekacheekuri9@gmail.com';

                                 $message->to($mail,'To Anitha')->subject('real');

                                // $message->from('sareekacheekuri9@gmail.com','Anitha');
                                // $message->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['file']); 
                        
                        
                         });*/
      
                       
                         //$this->middleware('test');
                         return view('admin')->with('userdata',$request->session()->get('user'));
                         // return view('home2');
                               //$val = array("message"=>"you are admin","status"=>"1");

                           }elseif(($array1 ['role']=='user')){
                              
                              $producuts = DB::table('producuts')->get();

                              return view('shopping',['users'=>$producuts]);
                              

                           }elseif(($array1 ['role']=='superAdmin')){

                              return view('superAdmin');
                           }
                   
   }else{
   
       $val = array("message"=>"invalid username and password","status"=>"1.0.1");
   
   }

}else{

   $val = array("message"=>"invalid data ","status"=>"1.1.0");

}


return json_encode($val,JSON_PRETTY_PRINT);

   }

   public function ProducutsInsert(Request $request){
          
      $this->validate($request,[
       
          'ProducutName' => 'required',
          'ProducutPrice' => 'required',
          'image' => 'required|image|max:2048',
         //'required|image|mimes:jpg,png,gif|max:2048',
       ]);
   
  $ProducutName = $request->input('ProducutName');
  
  $ProducutPrice = $request->input('ProducutPrice');
  

  $image = $request->file('image');

  $new_name = rand() . '.' . $image->getClientOriginalExtension();

  $iiii=$image->move(public_path('images'), $new_name);


 
  $data=array('ProducutName'=>$ProducutName,"ProducutPrice"=>$ProducutPrice,"ProducutImage"=>$new_name);
  
  $sql = DB::table('producuts')->insert($data);
     if( $sql==1){

      echo "Sucessfully inserted";

     echo "<a href = 'shopping'>  Visit Site</a>" ;

     }else{

      echo "NotInstalled";
     }


   }


  public function logout(Request $request){

   $request->session()->forget('user');

   return redirect('signin');

   }

   public function producut(Request $request){

       
      return view('home2')->with('userdata',$request->session()->get('user'));
   
      }
}
