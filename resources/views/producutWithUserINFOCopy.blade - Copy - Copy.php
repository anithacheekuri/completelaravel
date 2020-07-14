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
<h1>OrderPage</h1>
          <h2>Producut Details:</h2>
          
 <form method="POST" action="/chargee" >
<table>
<tr>
<td>producutname</td>
<td>
<input type = 'text' name ='producutname'
value = '<?php echo$users[0]->ProducutName; ?>'  /> </td>
</tr>
<tr>
<td>ProducutPrice</td>
<td>
<input type = 'text' name = 'ProducutPrice'
value = '<?php echo$users[0]->ProducutPrice; ?>'/>
</td>
</tr>
<tr>
<td>ProducutImage</td>
<td>
<input type = 'text' name = 'ProducutImage'
value = '<?php echo$users[0]->ProducutImage; ?>'/>
</td>
</tr>

</table>

@if (count($errors) > 0)
     <ul>
      @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
    
     <h2>Enter Your Details:</h2>
     {{ csrf_field() }}
   
     <input type="text" name="name" placeholder="Enter your name"><br><br>

     <input type="phone" name="phone" placeholder="Enter your PhoneNUmber"><br><br>

     <input type="email" name="email" placeholder="Enter your emil"><br><br>

     <input type="submit" name="submit" value='Click To Pay <?php echo$users[0]->ProducutPrice; ?>'/>

     <input type="hidden" name="Amount"   value="2475"/>
                
               <input type="hidden" name="Amount"   value="2475"/>
                
    <button id="paybtn">Pay With razorpay</button>
     <script
     
     src="https://checkout.razorpay.com/v1/checkout.js"

       data-key="{{ env('RAZORPAY_KEY') }}",
       data-amount="247500";
       data-name="cup"
       data-description="cup"
       data-image="https://i.imgur.com/n5tjHFD.png"
       data-prefill.name="anitha"
       data-prefill.email="anithacheekuri1@gmail.com"
       data-theme.color="#3594E2"
      
   >var totalamout = $(this).attr("value");</script>
     </form>
</div>
</body>

<html>