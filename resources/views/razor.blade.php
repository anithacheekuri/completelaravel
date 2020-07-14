
<html>
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
    <form action="/charge" method="POST">
    <!-- Note that the amount is in paise = 50 INR -->
    {{ csrf_field() }}
    <img src="../images/mouse.jpg" /> </a>    
                <br/>
                <p>Mouse </p>
                <p><br/>Price: 2475INR </p>
                <input type="hidden" name="Amount"   value="2475"/>
                
    <button id="paybtn">Pay With razorpay</button>
<br><br>
    <script
     
      src="https://checkout.razorpay.com/v1/checkout.js"

        data-key="{{ env('RAZORPAY_KEY') }}",
        data-amount="247500";
        data-name="lenova"
        data-description="Mouse"
        data-image="https://i.imgur.com/n5tjHFD.png"
        data-prefill.name="anitha"
        data-prefill.email="anithacheekuri1@gmail.com"
        data-theme.color="#3594E2"
       
    >var totalamout = $(this).attr("value");</script>
    </form>
  </body>
  

</html>