<?php

$alert=FALSE;
$exists=FALSE;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reg'])) {
  include 'partials/_dbconnect.php';
  $username=$_POST["name"];
  $email=$_POST["mail"];
  $phone=$_POST["phone"];
  

  $sql1="Select * from contact where name='$username'";
  $res=mysqli_query($conn,$sql1);
  $num=mysqli_num_rows($res);

  
  if ($num>=1) {
    $exists=TRUE;
  }
  else{
      $sql= "INSERT INTO `contact` (`name`, `email`, `contact`, `date_time`) VALUES ('$username', '$email', '$phone', current_timestamp())";
      $result = mysqli_query($conn,$sql);
      $alert=TRUE;
  }
} 

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap"
      rel="stylesheet"
    />
    <!-- <link href="/dist/output.css" rel="stylesheet"> -->
    <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="home.css" />
    <link rel="stylesheet" href="contact.css" />
    <style>
      .lform{
        /* border: 2px solid red; */
        width: 40%;
        margin:auto;
      }
      .btncn{
  height: 3em;
  width: 30%;
  border-radius: 25px;
  background-color: transparent;
  border: 2px solid purple;
  transition: all 0.4s ease;
}
.btncn:hover{
  background-color: purple;
  border: 2px solid purple;
  letter-spacing: 0.2em;
}
    </style>
  </head>
  <body>
    <div class="al">
      <nav class="navbar navbar-dark navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">FitnessHub</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="nanv">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.html"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="gallery.html">Gallery</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="workouts.html">Workouts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link store" href="store.html"
                    ><img
                      class="store"
                      src="images/shop2.jpg"
                      height="70px"
                      width="80px"
                      alt=""
                  /></a>
                </li>
                

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li> -->
              </ul>
              <div class="sign">
                <a href="signup_login.php" class="sup">
                  <button class="signup">Signup | Login</button></a
                >
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>


    <?php
    if($alert==TRUE){
      echo'<div class="alert alert-success alert-dismissible fade show da" role="alert">
      <strong>Thank You For Registering!!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class="top">
      <img src="images/sven-mieke-Lx_GDv7VA9M-unsplash.jpg"100%" height="700"
      alt="Site logo">
      <div class="centered">
        <h4>We'd Love To Hear From You</h4>
        <p><b>CONTACT US</b></p>
      </div>
    </div>



    <div class="footer">
      <img
        src="images/jonathan-borba-zfPOelmDc-M-unsplash.jpg"
        width="100%"
        height="700"
        alt="Site logo"
      />
      <div class="center">
        Apply Today And Be Part Of Our Family
        <p>
          <b>
            <pre>
FALL IN LOVE WITH TAKING
CARE OF YOUR BODY
      </pre
            >
          </b>
        </p>
      </div>
    </div>
    <br />
<a href="subscription.html">
    <button class="btn1">Join Us Today</button>
  </a>

  <!-- <div class="details">
      <pre>
<br>TAKE THE FIRST STEP,
WE WILL DO THE REST.</pre>
      <img src="images/contact.jpg" id="1" />
      <h3>585-346-6021</h3>

      <img src="images/address.jpg" id="2" />
      <h3>Borivali West</h3>

      <img src="images/timing.jpg" id="3" />
      <h3>6:00 - 00:00</h3>
    </div>
    <div class="col-lg-7">
      
    </div> -->

  <form class="mb-5 lform" method="POST">
        <div class="form-outline mb-5">
          <input
            type="text"
            id="typeText"
            name="name"
            class="form-control form-control-lg"

            placeholder="John Doe"

          />
          <label class="form-label" for="typeText"
            >Your Name</label
          >
        </div>

        <div class="form-outline mb-5">
          <input
            type="email"
            name="mail"
            id="typeName"
            class="form-control form-control-lg"
            
            placeholder="John@gmail.com"
          />
          <label class="form-label" for="typeName"
            >Your E-mail</label
          >
        </div>

        <div class="row">
          <div class="col-md-6 mb-5">
            <div class="form-outline">
              <input
                type="text"
                name="phone"
                class="form-control form-control-lg"
                placeholder="+91 9136228224"

              />
              <label class="form-label" for="typeExp"
                >Phone Number</label
              >
            </div>
          </div>
          
        </div>

        
        <button 
          type="submit"
          name="reg"
          class="btn btn-primary btn-block btn-lg btncn"
        >
          Register!!
        </button>
      


      </form>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
