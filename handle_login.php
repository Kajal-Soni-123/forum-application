<?php
include '\xampp\htdocs\forum\db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$hash=password_hash($password,PASSWORD_DEFAULT);

$sql="SELECT * FROM `login` WHERE user_email='$email'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
echo $num;
if($num==1){
    echo "yes";
    $row=mysqli_fetch_assoc($result);
    $user_id=$row['user_id'];
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['user_id']=$row['user_id'];
    $_SESSION['user_email']=$row['user_email'];
    if(isset($_SESSION['user_id'])&&$_SESSION['user_id']){
        echo "<br>".$_SESSION['user_id'];
    }
    header("location:index.php?loginsuccess=true");
    exit();
    }

elseif($num>1){
    $showError = "you are not a valid user";
    header("location:index.php?loginsuccess=false&loginerror=$showError");
    exit();
}
else{
    $showError = "you are not signed in kindly signup";
    header("location:index.php?loginsuccess=false&loginerror=$showError");
    exit();
}
}
?>
