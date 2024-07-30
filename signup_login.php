<?php
// Signup
$alert=FALSE;
$exists=FALSE;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sbtnn'])) {
  include 'partials/_dbconnect.php';
  $username=$_POST["logname"];
  $password=$_POST["logpass"];
  $email=$_POST["logemail"];
  
  $sql1="Select * from signup where username='$username' AND password='$password'";
  $res=mysqli_query($conn,$sql1);
  $num=mysqli_num_rows($res);



  if ($num>=1) {
    $exists=TRUE;
  }
  elseif($username=="" || $email=="" || $password==""){
    echo "Fill all the details";
  }

  elseif(strlen($password)<=6){
    echo "Password length must be more than 8..";
  }

  else{
  // if($exists==false){
    
    $sql="INSERT INTO `signup` (`username`, `email`, `password`, `dateNtime`) VALUES ('$username', '$email', '$password', current_timestamp())";

    if ($username!="" & $password!="" & $email!="") {
      $result = mysqli_query($conn,$sql);
      // echo "Done";
      $alert=TRUE;
      $username="";
      $password="";
      $email="";
    }
    header("location: signup_login.php");
  }

}

//Login

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lbtnn'])) {
  
  include 'partials/_dbconnect.php';
  $lusername=$_POST["loggname"];
  $lpassword=$_POST["loggpass"];
  
  $sql1="Select * from signup where username='$lusername' AND password='$lpassword'";
  $res=mysqli_query($conn,$sql1);
  $num=mysqli_num_rows($res);
  if ($num==1) {
    session_start();
    $_SESSION['uid']=$lusername;
    $log=TRUE;
    header("location: index.html");
  }

  else{
    echo"Invalid Credentials";
  }

}

include 'partials/_dbconnect.php'

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fitness Hub | Signup/Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="home.css">

<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');

body {
    font-family:DynaPuff;
    font-weight: 300;
    font-size: 15px;
    line-height: 1.7;
    color: #fff;
    /* background-color: black; */  
    background: linear-gradient(rgba(3, 0, 3, 1), rgba(66, 1, 77, 0.5)), url("images/sbg.jpg");
    /* background: url(sbg.jpg); */
    
    background-size: cover;
    overflow-x: hidden;
}

a {
    cursor: pointer;
    transition: all 200ms linear
}

a:hover {
    text-decoration: none
}

.link {
    color: #fff
}

.link:hover {
    color: black
}

p {
    font-weight: 500;
    font-size: 14px;
    line-height: 1.7
}

h4 {
    font-weight: 600
}

h6 span {
    padding: 0 20px;
    text-transform: uppercase;
    font-weight: 700
}

.section {
    position: relative;
    width: 100%;
    display: block
}

.full-height {
    min-height: 100vh
}

[type="checkbox"]:checked,
[type="checkbox"]:not(:checked) {
    position: absolute;
    left: -9999px
}

.checkbox:checked+label,
.checkbox:not(:checked)+label {
    position: relative;
    display: block;
    text-align: center;
    width: 60px;
    height: 16px;
    border-radius: 2px;
    padding: 0;
    margin: 10px auto;
    cursor: pointer;
    background-color: #ffffff;
}

.checkbox:checked+label:before,
.checkbox:not(:checked)+label:before {
    position: absolute;
    display: block;
    width: 36px;
    height: 36px;
    border-radius: 10%;
    color: #CC99CC;
    background-color: #2a2b38;
    content:'';
    z-index: 20;
    font-size: 12px;
    top: -10px;
    left: -10px;
    line-height: 36px;
    text-align: center;
    font-size: 24px;
    transition: all 0.5s ease
}

.checkbox:checked+label:before {
    transform: translateX(44px) rotate(-270deg)
}

.card-3d-wrap {
    position: relative;
    width: 440px;
    max-width: 100%;
    height: 400px;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    perspective: 800px;
    margin-top: 40px
}

.card-3d-wrapper {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    transition: all 600ms ease-out
}

.login-div {
    width: 150px
}

.card-front,
.card-back {
    width: 100%;
    height: 100%;
    background-color: #CC99CC;
    position: absolute;
    border-radius: 0px;
    left: 0;
    top: 0;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    backface-visibility: hidden
}

.card-back {
    transform: rotateY(180deg)
}

.checkbox:checked~.card-3d-wrap .card-3d-wrapper {
    transform: rotateY(180deg)
}

.center-wrap {
    position: absolute;
    width: 100%;
    padding: 0 35px;
    top: 50%;
    left: 0;
    transform: translate3d(0, -50%, 35px) perspective(100px);
    z-index: 20;
    display: block
}

.form-group {
    position: relative;
    display: block;
    margin: 0;
    padding: 0
}

.form-style {
    padding: 13px 20px;
    padding-left: 55px;
    height: 48px;
    width: 100%;
    font-weight: 500;
    border-radius: 4px;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0.5px;
    outline: none;
    color: #c4c3ca;
    background-color: #1f2029;
    border: none;
    transition: all 200ms linear;
    box-shadow: 0 4px 8px 0 rgba(21, 21, 21, .2)
}

.form-style:focus,
.form-style:active {
    border: none;
    outline: none;
    box-shadow: 0 4px 8px 0 rgba(21, 21, 21, .2)
}

.input-icon {
    position: absolute;
    top: 0;
    left: 18px;
    height: 48px;
    font-size: 24px;
    line-height: 48px;
    text-align: left;
    color: #EA2C62;
    transition: all 200ms linear
}

.form-group input:-ms-input-placeholder {
    color: #c4c3ca;
    opacity: 0.7;
    transition: all 200ms linear
}

.form-group input::-moz-placeholder {
    color: #c4c3ca;
    opacity: 0.7;
    transition: all 200ms linear
}

.form-group input:-moz-placeholder {
    color: #c4c3ca;
    opacity: 0.7;
    transition: all 200ms linear
}

.form-group input::-webkit-input-placeholder {
    color: #c4c3ca;
    opacity: 0.7;
    transition: all 200ms linear
}

.form-group input:focus:-ms-input-placeholder {
    opacity: 0;
    transition: all 200ms linear
}

.form-group input:focus::-moz-placeholder {
    opacity: 0;
    transition: all 200ms linear
}

.form-group input:focus:-moz-placeholder {
    opacity: 0;
    transition: all 200ms linear
}

.form-group input:focus::-webkit-input-placeholder {
    opacity: 0;
    transition: all 200ms linear
}

.btn {
    border-radius: 4px;
    height: 48px;
    width: 100%;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    transition: all 200ms linear;
    padding: 0 30px;
    letter-spacing: 1px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    -ms-flex-pack: center;
    text-align: center;
    border: none;
    background-color: #660066;
    color: #fff;
    box-shadow: 0 8px 24px 0 rgba(18, 248, 173, .2)
}

.btn:active,
.btn:focus {
    background-color: #fff;
    color: black;
    box-shadow: 0 8px 24px 0 rgba(255, 255, 255, .2)
}

.btn:hover {
    background-color: #fff;
    color: black;
    box-shadow: 0 8px 24px 0 rgba(255, 255, 255, .2)
}

.logo {
    position: absolute;
    top: 30px;
    right: 30px;
    display: block;
    z-index: 100;
    transition: all 250ms linear
}

.logo img {
    height: 26px;
    width: auto;
    display: block
}


.bs{
  width: 100%;
  background-color: transparent;
  border: none;
}

.da{
  font-size: 1.4em;
  color: rgb(5, 5, 5);
  background-color: rgb(150, 212, 150);
  border-color: green;
  font-weight: 500;
}
.da1{
  font-size: 1.4em;
  font-weight: 500;
}

</style>

  </head>
  <body>
    <div class="al">
      <nav class="navbar navbar-dark navbar-expand-lg">
          <div class="container-fluid ">
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
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.html">Home</a>
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
                  <a class="nav-link" href="contact.php">Contact Us</a>
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
              <a href="signup_login.php" class="sup"> <button class="signup">Signup | Login</button></a> 
            </div>
              
          </div>
             
            </div>
          </div>
        </nav>
      </div>

<?php
if ($alert==TRUE){
echo '
  <div class="alert alert-warning alert-dismissible fade show da" role="alert">
  <strong>Signed Up SuccessFully!!</strong> You can Now Login...
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';


}
if ($exists==TRUE){
echo '
  <div class="alert alert-warning alert-dismissible fade show da1" role="alert">
  <strong>User already Exists!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>
  
<form action="signup_login.php" method="post">
    <div class="section">
      <div class="container">
        <div class="row full-height justify-content-center">
          <div class="col-12 text-center align-self-center py-5">
            <div class="section pb-5 pt-5 pt-sm-2 text-center">
              <h6 class="mb-0 pb-3">
                <span>Log In </span><span>Sign Up</span>
              </h6>
              <input
                class="checkbox"
                type="checkbox"
                id="reg-log"
                name="reg-log"
              />
              <label for="reg-log"></label>
              <div class="card-3d-wrap mx-auto">
                <div class="card-3d-wrapper">
                  <div class="card-front">
                    <div class="center-wrap">
                      <div class="section text-center">
                        <h4 class="mb-4 pb-3">Log In</h4>
                        <div class="form-group">
                          <input
                            type="text"
                            name="loggname"
                            class="form-style"
                            placeholder="Your Username"
                            id="loggemail"
                            autocomplete="none"
                          />
                          <i class="input-icon fa fa-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input
                            type="password"
                            name="loggpass"
                            class="form-style"
                            placeholder="Your Password"
                            id="loggpass"
                            autocomplete="none"
                          />
                          <i class="input-icon fa fa-lock"></i>
                        </div>
                        <button type="submit" name="lbtnn" value="lbtnn" class="bs">
                        <a class="btn mt-4">Login</a></button>
                        <p class="mb-0 mt-4 text-center">
                          <a href="#0" class="link">Forgot your password?</a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="card-back">
                    <div class="center-wrap">
                      <div class="section text-center">
                        <h4 class="mb-4 pb-3">Sign Up</h4>
                        <div class="form-group">
                          <input
                            type="text"
                            name="logname"
                            class="form-style"
                            placeholder="Your Full Name"
                            id="logname"
                            autocomplete="none"
                          />
                          <i class="input-icon fa fa-user"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input
                            type="email"
                            name="logemail"
                            class="form-style"
                            placeholder="Your Email"
                            id="logemail"
                            autocomplete="none"
                          />
                          <i class="input-icon fa fa-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input
                            type="password"
                            name="logpass"
                            class="form-style"
                            placeholder="Your Password"
                            id="logpass"
                            autocomplete="none"
                          />
                          <i class="input-icon fa fa-lock"></i>
                        </div>
                        <button type="submit" name="sbtnn" value="sbtnn" class="bs">
                        <a class="btn mt-4">Signup</a></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
