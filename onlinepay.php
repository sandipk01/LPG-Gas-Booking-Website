<?php
session_start();
?>
<?php
date_default_timezone_set('Asia/Kolkata');
$date=date('d:m:y');
$time=date('h:i:s');
echo "$date";
$a = strtotime("+5 day", strtotime("$date"));
$date2=date("d-m-y", $a);
echo $date2;
?>

<?php
if(isset($_SESSION['currentuser']))
{
$user=$_SESSION['currentuser'];
}

else
{
  echo"<script>alert('you must login this page')</script>";
  header('location:homepage.php');
}
?>

</head>

<html >
<head>

  <meta charset="UTF-8">
  <title>Payment Form</title>
  

  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">

  

<body>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<div class="container">
  <div id="Checkout" class="inline">
      <h1>secure Pay</h1>
      <div class="card-row">
          <span class="visa"></span>
          <span class="mastercard"></span>
          <span class="amex"></span>
          <span class="discover"></span>
      </div>
      <form action="" method="post">
          <div class="form-group">
              <label for="PaymentAmount">Payment amount</label>
              <div class="amount-placeholder">
                  <span>Rs</span>
                  <span>550.00</span>
              </div>
          </div>
          <div class="form-group">
              <label or="NameOnCard">Name on card</label>
              <input id="NameOnCard" class="form-control" pattern="^[a-zA-Z]+$" title="Enter the Character only" type="text" maxlength="100" value="" required></input>
          </div>
          <div class="form-group">
              <label for="CreditCardNumber">Card number</label>
              <input id="CreditCardNumber" class="null card-image form-control" pattern="[0-9]{15}" title="Enter the valid card number" type="text"></input>
          </div>
          <div class="expiry-date-group form-group">
              <label for="ExpiryDate">Expiry date</label>
              <input id="ExpiryDate" class="form-control" type="text" placeholder="MM / YY" maxlength="7" required></input>
          </div>
          <div class="security-code-group form-group">
              <label for="SecurityCode">Security code</label>
              <div class="input-container" >
                  <input id="SecurityCode" pattern="[0-9]{3}" title="Enter the valid security code" class="form-control" type="text" required></input>
                  <i id="cvc" class="fa fa-question-circle"></i>
              </div>
              <div class="cvc-preview-container two-card hide">
                  <div class="amex-cvc-preview"></div>
                  <div class="visa-mc-dis-cvc-preview"></div>
              </div>
          </div>
          <div class="zip-code-group form-group">
              <label for="ZIPCode">ZIP/Postal code</label>
              <div class="input-container">
                  <input id="ZIPCode" class="form-control" pattern="[0-9]{6}" title="Enter the valid zip code" type="text" maxlength="10" required></input>
                  <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Enter the ZIP/Postal code for your credit card billing address."><i class="fa fa-question-circle"></i></a>
              </div>
          </div>
          <button id="PayButton" name="submit" class="btn btn-block btn-success submit-button" type="submit">
              <span class="submit-button-lock"></span>
              <span class="align-middle">Pay $500.00</span>
          </button>
      </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

    <script src="js/index.js"></script>
<?php
if(isset($_POST['submit']))
{
include "connect.php";
  $paymode='Online Payment';
$query= "INSERT INTO bookingdata(UserName,PaymentMode,Date,Time,Ddate) VALUES('$user','$paymode','$date','$time','$date2')";
  if(mysql_query($query))
  {
    $_SESSION['date']=$date;
    $_SESSION['deliverydate']=$date2;
    echo "<script>alert('Transaction is Successfull....')</script>";
    header('Refresh:0; cashonbooking.php');
  }
  else
  {
    echo "<script>alert('Transaction fails')</script>";
    
  }
}
?>
</body>
</html>
