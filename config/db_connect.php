<?php 
    //connect to database, mysqli takes 4 parameters, localhost, username, password and password and database created name.
$conn = mysqli_connect("localhost","Maryam", "Websitelady","ninja-pizza");

//check connection
if(!$conn){
    die("Connection error:".mysqli_connect_error());
}
?>