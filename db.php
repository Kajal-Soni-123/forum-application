<?php
$servername="localhost";
$username="root";
$password="";
$database="forum";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("conection has not been established with the data base".mysqli_connect_error());
}
?>