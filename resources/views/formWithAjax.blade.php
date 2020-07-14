
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>



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
@if(session()->has('message'))
              <h2 class="alert alert-sucess"> {{ session()->get('message')}}</h2>

               @endif
<h1>Register Form<h1>

@if(session()->has('message'))

              {{ session()->get('message')}}

               @endif
           
             
<form name="form1"  id="registration" action = "form" method = "post"> 

            <input type = "hidden" name = "_token" value = "<?php  echo csrf_token(); ?>">
                     <label>First Name:</label>
                     <input type='text' name='first_name' id='first_name' /><br><br>
                     <label>Last Name:</label>
                     <input type="text" name='last_name' id='last_name'/><br><br>
                     <label>City Name:</label>
                     <input type="text" name="city_name" id="city_name"/><br><br>
                     <label for="cars">Choose Your Role:</label>
                        <select id="Role" name="Role"  id="Role" >
                            <option value="admin">admin</option>
                            <option value="superadmin">superadmin</option>
                            <option value="user">user</option>
                           
                        </select><br><br>
                        <label>Phone Number:</label>
                  <input type='number' name='number' id='number' /><br><br>
                     <label>Email:</label>
                  <input type='text' name='email'  id='email'/><br><br>
                  <label>PassWord:</label>
                     <input type="text" name='password' id='password'/><br><br>
            <input type="submit" name="submit" value="Submit" /><br><br>

<a href="signin ">Signin</a>

</form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

 $('#registration').on('submit',function(event){
     event.preventDefault();

     first_name = $('#first_name').val();
     last_name = $('#last_name').val();
     city_name = $('#city_name').val();
     Role = $('#Role').val();
     number = $('#number').val();
     email = $('#email').val();
     password = $('#password').val();

     $.ajax({
       url: "/form",
       type:"POST",
       data:{
         "_token": "{{ csrf_token() }}",
         first_name:first_name,
         last_name:last_name,
         city_name:city_name,
         Role:Role,
         number:number,
         email:email,
         password:password,
       },
       success:function(response){
         console.log(response);
       },
      });
     });
   </script>

</body>
</html>

