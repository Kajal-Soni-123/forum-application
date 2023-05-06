<?php
include '\xampp\htdocs\forum\db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$hash=password_hash($password,PASSWORD_DEFAULT);

$sql="SELECT * FROM `admin` WHERE admin_email='$email'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num==1){
    echo "yes";
    $row=mysqli_fetch_assoc($result);
    $admin_id=$row['admin_id'];
    session_start();
    $_SESSION['admin_loggedin']=true;
    $_SESSION['admin_id']=$row['admin_id'];
    $_SESSION['admin_email']=$row['admin_email'];
    if(isset($_SESSION['admin_id'])){
        echo "<br>".$_SESSION['admin_id'];
    }
    header("location:category.php");
    exit();
    }

elseif($num>1){
    $showError = "you are not a valid admin";
    header("location:index.php?loginsuccess=false&admin_loginerror=$showError");
    exit();
}
else{
    $showError = "you are not signed in as a Admin";
    header("location:index.php?loginsuccess=false&admin_loginerror=$showError");
    exit();
}
}
?>
