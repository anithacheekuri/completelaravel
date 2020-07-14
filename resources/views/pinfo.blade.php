

<!doctype html>

<head>
    <title>cart page</title>
</head>

<body>
       <h1>Cart Page</h1>
     
       <table border = "2"></h1></a>
<tr>
<td>Id</td>
<td>ProducutName</td>
<td>ProducutPrice</td>
<td>ProducutImage</td>

<td>action</td>
</tr>
@foreach($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->ProducutName }}</td>
<td>{{ $user->ProducutPrice }}</td>
<td><image src="{{ asset('images/'.$user->ProducutImage) }}" width='100px' height="100px" alt="image"></td>

<td><a href = 'Buy/{{ $user->id }}'>Delete</a></td>



</tr>
@endforeach
</table>
   
</body>
</html>

<!--
<!doctype html>

<head>
    <title> RazorPay Integration in PHP - phpexpertise.com </title>
    <meta name="viewport" content="width=device-width">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <style>
    
      .razorpay-payment-button {
          display:none;
      
      }

      #paybtn{
        color: #ffffff !important;
        background-color: #7266ba;
        border-color: #7266ba;
        font-size: 14px;
        padding: 10px;

      }
    </style>
  </head>


<body>

<div align="center">


@if (count($errors) > 0)
     <ul>
      @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
<h1>OrderPage</h1>
          <h2>Producut Details:</h2>
          
 <form method="POST" action="/charge" >
 {{ csrf_field() }}
   
<table>
<tr>
<td>producutname</td>
<td>
<input type = 'text' name ='producutname'
value = '{{ $users[0]->ProducutName }}'  /> </td>
</tr>
<tr>
<td>ProducutPrice</td>
<td>
<input type = 'text' name = 'ProducutPrice'
value = '{{ $users[0]->ProducutPrice }}'/>
</td>
</tr>
<tr>
<td>ProducutImage</td>

<td><image src="{{ asset('images/'.$users[0]->ProducutImage) }}"
 width='100px' height="100px" alt="image"></td>

</tr>

</table>
  

     </form>
</div>
</body>

<html>-->