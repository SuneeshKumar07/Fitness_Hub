<?php
// Signup
$alert=FALSE;
$exists=FALSE;
$un=FALSE;
$cn=FALSE;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['paybt'])) {
  include 'partials/_dbconnect.php';
  $username=$_POST["name"];
  $card=$_POST["cardn"];
  $val=$_POST["val"];

  if ($username=="") {
    $un==TRUE;
    if ($card=="") {
      $cn==TRUE;
    }
  }
  else{

      $sql= "INSERT INTO `product_purchases` (`name`, `card_no`, `amount`, `time`) VALUES ( '$username', '$card', '$val', current_timestamp());";
      $result = mysqli_query($conn,$sql);
      $alert=TRUE;
    
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Payments</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <style type="text/css">
      @import url("https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap");

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Montserrat", sans-serif;
      }

      body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #0c4160;

        /* padding: 30px 10px; */
      }

      .card {
        max-width: 500px;
        margin: auto;
        color: black;
        border-radius: 20px;
      }

      p {
        margin: 0px;
      }

      .container .h8 {
        font-size: 30px;
        font-weight: 800;
        text-align: center;
      }

      .btn.btn-primary {
        width: 100%;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        /* padding: 0 15px; */
        background-image: linear-gradient(
          to right,
          #77a1d3 0%,
          #79cbca 51%,
          #77a1d3 100%
        );
        border: none;
        transition: 0.5s;
        background-size: 200% auto;
      }

      .btn.btn.btn-primary:hover {
        background-position: right center;
        color: #fff;
        text-decoration: none;
      }

      .btn.btn-primary:hover .fas.fa-arrow-right {
        transform: translate(15px);
        transition: transform 0.2s ease-in;
      }

      .form-control {
        color: white;
        background-color: #223c60;
        border: 2px solid transparent;
        height: 60px;
        /* padding-left: 20px; */
        vertical-align: middle;
      }

      .form-control:focus {
        color: white;
        background-color: #0c4160;
        border: 2px solid #2d4dda;
        box-shadow: none;
      }

      .text {
        font-size: 14px;
        font-weight: 600;
      }

      ::placeholder {
        font-size: 14px;
        font-weight: 600;
      }

      .paybt {
        height: auto;
        border: none;
        width: 100%;
        background-color: none;
        padding: none;
        outline: none;
      }

      .col-12{
        padding:0px;
      }
      .paybt:focus {
        outline:none;
      }
      .da{
       margin-top: -40%;
       position: relative;
       /* margin-left: 300px; */
       width: 100%;

      }

      .whole{
        position: absolute;
      }

      #val{
        background:transparent;
        border:none;
        color:white;
      }
      #val:hover{
        cursor: pointer;
      }
      #val:focus{
        outline:none;
      }
      .link{
            color: rgb(160, 33, 228);
            text-decoration: none;
        }
    </style>
  </head>
  <body>
  <?php

if($un==TRUE){
  
  echo'<div class="alert alert-success alert-dismissible fade show da" role="alert">
  <strong>Please enter all the details..</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
if($alert==TRUE){
  echo'<div class="alert alert-success alert-dismissible fade show da" role="alert">
  <strong>Thank You For Your Purchase!!</strong><a class="link" href="store.html">Click here to Keep Shopping..</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
$username="";
$card="";
}

?>

<div class="whole">

    <form action="payscript.html" method="post">
      <div class="container p-0">
        <div class="card px-4">
          <p class="h8 py-3">Payment Details</p>
          <div class="row gx-3">
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Person Name</p>
                <input
                  name="name"
                  class="form-control mb-3"
                  type="text"
                  placeholder="Name"
                />
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Card Number</p>
                <input
                  name="cardn"
                  class="form-control mb-3"
                  type="text"
                  placeholder="1234 5678 435678"
                />
              </div>
            </div>
            <div class="col-6">
              <div class="d-flex flex-column">
                <p class="text mb-1">Expiry</p>
                <input
                  class="form-control mb-3"
                  type="text"
                  placeholder="MM/YYYY"
                />
              </div>
            </div>
            <div class="col-6">
              <div class="d-flex flex-column">
                <p class="text mb-1">CVV/CVC</p>
                <input
                  class="form-control mb-3 pt-2"
                  type="password"
                  placeholder="***"
                />
              </div>
            </div>
            

            <button type="submit" name="paybt" value="paybt" class="paybt">
              <div class="col-12">
                <div class="btn btn-primary mb-3">
                  <span class="ps-3">Total - ₹<input id="val" name="val"> </span>

                  <!-- <span class="fas fa-arrow-right"></span> -->
                </div>
              </div>
            </button>
          </div>
        </div>
      </div>
    </form>
    <script>
      document.getElementById('val').value = localStorage.getItem('val');
    </script>
  
</div>

    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"
  ></script>
  </body>
</html>