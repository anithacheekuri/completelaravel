<!doctype html>
<html>

<head>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
 <title>Login</title>

 <script>          
                        $(document).ready(function()
                        {
                        $(registration).validate({
                        rules: {
                                    
                                   
                                    email:{ 
                                                required: true,
                                                   email: true,
                                                
                                              
                                                },
                                    
                                    password:{
                                             
                                                   required: true,
                                                   minlength: 5,
                                       
                                                },    
                           },
                        messages: {
                          
                           email: "Please enter a valid email address",
                           password:"please enter your password ",
                        },
                        function(registration) {
                           registration.submit();
                        }
                        });
                        });
                                 </script>
</head>

<body style="background-color: #bf2020">

<img src="../image/logo.png"  alt="CompanyName" />
<hr>
<div align="center"> 

            @foreach($errors->all() as $error)
               {{  $error  }}
            <br>
            @endforeach
<form id="registration"  action="/dashboard" method="Post">

   
       
        <h2>Please Login</h2>
        <input type = "hidden" name = "_token" value = "<?php  echo csrf_token(); ?>">
		E-mail: <input type="text" name="email" id="email">
		<br><br>
		password: <input type="password" name="password" id="password" autocomplete="off">
		<br><br>
		<input type="submit" name="submit" value="Submit"><br><br>

  </form>
  <a href = "/signup"><b>Sign Up Form</b></a>
  </div>
</body>
</html>