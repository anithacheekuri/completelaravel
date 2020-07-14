
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>          
                        $(document).ready(function()
                        {
                        $(registration).validate({
                        rules: {
                                    
                                    first_name:"required",
                                    last_name:"required",
                                    city_name:"required",

                                    email: { 
                                             required: true,
                                                   email: true,
                                                
                                                accept:"[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}" ,
                                                },
                                    
                                                password:{
                                             
                                             required: true,
                                                   minlength: 5,
                                       
                                                },    
                           },
                        messages: {
                           first_name: "Please enter FirstName",
                           last_name: "Please enter LastName",
                           city_name: "Please enter  CityName ",
                           email: "Please enterrr  email address",
                           password:"please enter your password ",
                        },
                        function(registration) {
                           registration.submit();
                        }
                        });
                        });


                        
                                 </script>

<meta charset="utf-8">
<title>RegisterPage</title>
      
</head>


<body  style=" background-color: #bf2020">
@foreach($errors->all() as $error)
               {{  $error  }}
            <br>
            @endforeach
<img src="../image/logo.png"  alt="CompanyName" />
<hr>
<div align="center">
<h1>Register Form<h1>

@if(session()->has('message'))

              {{ session()->get('message')}}

               @endif
           
             
<form name="form1"  id="registration" action = "registration" method = "post"> 

            <input type = "hidden" name = "_token" value = "<?php  echo csrf_token(); ?>">
                     <label>First Name:</label>
                     <input type='text' name='first_name' /><br><br>
                     <label>Last Name:</label>
                     <input type="text" name='last_name'/><br><br>
                     <label>City Name:</label>
                     <input type="text"name="city_name"/><br><br>
                     <label for="cars">Choose Your Role:</label>
                        <select id="Role" name="Role">
                            <option value="admin">admin</option>
                            <option value="superadmin">superadmin</option>
                            <option value="user">user</option>
                           
                        </select><br><br>
                        <label>Phone Number:</label>
                  <input type='number' name='number'/><br><br>
                     <label>Email:</label>
                  <input type='text' name='email'/><br><br>
                  <label>PassWord:</label>
                     <input type="text" name='password'/><br><br>
            <input type="submit" name="submit" value="Submit" /><br><br>

<a href="signin ">Signin</a>

</form>
</div>

</body>
</html>

