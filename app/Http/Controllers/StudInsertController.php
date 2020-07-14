<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use session;
use App\Events\UserRegistered;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Nexmo\Laravel\Facade\Nexmo;
class StudInsertController extends Controller {


public function insertform(){

        return view('signuppage');

}

public function insert(Request $request){

 

$first_name = $request->input('first_name');

$last_name = $request->input('last_name');
$city_name = $request->input('city_name');
$role = $request->input('Role');
$number = $request->input('number');
$email = $request->input('email');
$PassWord = bcrypt($request->input('password'));
$data=array('firstname'=>$first_name,"lastname"=>$last_name,"city_name"=>$city_name,"role"=>$role,"phone_number"=>$number,"email"=>$email,"password"=>$PassWord);


if(empty($first_name) || empty($last_name) || empty($city_name)||empty($email) || 
empty($PassWord)){

    $val = array("message"=>"Invalid Input","data"=>"Invalid","error"=>"1.0.2");
//return view('form', compact('re'))->render();
  
}else{

   
$re = DB::table('users_record')->insert($data);

print_r($re);
exit;

if($re == 1){

    $val = array("message"=>"Data inserted Sucessfully","data"=>$data,"error"=>"1.0.0"); 
        //return view('Stud_Login');


}else{

    $val = array("message"=>"Data Not inserted","data"=>$data,"error"=>"1.0.1");

}





}
return json_encode($val,JSON_PRETTY_PRINT);

}






public function registration(Request $request){

   
    $this->validate($request,[
         
        'first_name' => 'required',
        'last_name' => 'required',
        'city_name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'Role' => 'required',

     ]);
 
     $first_name = $request->input('first_name');

     $last_name = $request->input('last_name');
     $city_name = $request->input('city_name');
     $role = $request->input('Role');
     $number = $request->input('number');
     $email = $request->input('email');
     $PassWord = bcrypt($request->input('password'));
     $data=array('firstname'=>$first_name,"lastname"=>$last_name,"city_name"=>$city_name,"role"=>$role,"phone_number"=>$number,"email"=>$email,"password"=>$PassWord);
     
   /*  Nexmo::message()->send([
        'to' => '916302275091',
        'from' => 'Vonage APIs',
        'text' => 'Hello from Vonage SMS API'
    ]);*/
    
$re = DB::table('users_record')->insert($data);


if($re == 1){

    echo "record inserted ";
   // console.log("Record added successfully");
    
   // return view('signin');
   

}else{

    echo "record NOT inserted ";

    //return view('signuppage');

}

}

public function formWithAjax(){

        return view('formWithAjax');

}

public function jj(Request $request){


    $first_name = $request->input('first_name');

    $last_name = $request->input('last_name');
    $city_name = $request->input('city_name');
    $role = $request->input('Role');
    $number = $request->input('number');
    $email = $request->input('email');
    $PassWord = bcrypt($request->input('password'));
    $data=array('firstname'=>$first_name,"lastname"=>$last_name,"city_name"=>$city_name,"role"=>$role,"phone_number"=>$number,"email"=>$email,"password"=>$PassWord);
    
    
    if(empty($first_name) || empty($last_name) || empty($city_name)||empty($email) || 
    empty($PassWord)){
    
        $val = array("message"=>"Invalid Input","data"=>"Invalid","error"=>"1.0.2");
    //return view('form', compact('re'))->render();
      
    }else{
    
       
    $re = DB::table('users_record')->insert($data);
    //Session::flash('message','file Upload Successfully.');
   /* return back()
    ->with('success','message is uploaded.');
*/

return response()->json(['success'=>'Form is successfully submitted!']);

}

return json_encode($val,JSON_PRETTY_PRINT);
}

}








