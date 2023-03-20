<?php
include '\xampp\htdocs\forum\db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$hash=password_hash($password,PASSWORD_DEFAULT);
echo $hash;
$sql="SELECT * FROM `login` WHERE user_email='$email'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
$showError = "Email already exist";
header("location:index.php?signupsuccess=false&error=$showError");
exit();
}

if($password==$cpassword && $num==0){
$sql1="INSERT INTO `login` (`user_name`, `user_email`, `user_password`, `time`) VALUES ('$name','$email', '$hash', current_timestamp())";
$result1=mysqli_query($conn,$sql1);
header("location:index.php?signupsuccess=true");
}
else{
$showError="password do not matches";
header("location:index.php?signupsuccess=false&error=$showError");
}
}
?>