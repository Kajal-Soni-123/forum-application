<?php
include '\xampp\htdocs\forum\db.php';
session_start();
if(!isset($_SESSION['admin_loggedin'])){
header("location:index.php");
}
else{
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $category_name=$_POST['name'];
        $category_desc=$_POST['desc'];
        $category_image=$_POST['image'];
        $sql="INSERT INTO `categories` (`category_name`, `category_discription`, `created`, `image`) VALUES ( '$category_name', '$category_desc', current_timestamp(), '$category_image')";
        $result=mysqli_query($conn,$sql);
        if($result){
        header("location:category.php?inserted");

        }
    
    }



    
}

?>