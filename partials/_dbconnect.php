<?php 
$server="localhost";
$username="root";
$password="";
$databse="gymusers";

$conn=mysqli_connect($server,$username,$password,$databse);

if($conn){
    // echo "Succeess!";
}
else{
    die("Error".mysqli_connect_error());
}

?>