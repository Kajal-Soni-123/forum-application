
<?php
//include '\xampp\htdocs\forum\db.php'; 
$id=$_GET['threadid'];
session_start();
if(isset($_SESSION['user_id'])){
  $user_id=$_SESSION['user_id'];
  }
include '\xampp\htdocs\forum\_header.php';
$sql="SELECT * FROM `thread` WHERE thread_id='$id'";
$result=mysqli_query($conn,$sql);
$num =mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result)){
 $ttitle= $row['thread_title'];
 $tdesc=$row['thread_desc'];
 $u_id=$row['thread_user_id'];
 $sql2="SELECT * FROM `login` WHERE user_id='$u_id'";
 $result2=mysqli_query($conn,$sql2);
 $row=mysqli_fetch_assoc($result2);
 $name=$row['user_name'];
}
?>

<?php 
    //include '\xampp\htdocs\forum\_header.php';
    ?>
<?php
$method=$_SERVER['REQUEST_METHOD'];
if($method=='POST'){
  $content=$_POST['content'];
  $content=str_replace("<","&lt",$content);
  $content=str_replace(">","&gt",$content);
  $sql='INSERT INTO `comments` (`comment_content`, `thread_id`, `thread_by`, `comment_time`) VALUES ("'.$content.'", "'.$id.'", "'.$user_id.'", current_timestamp())';
  $result=mysqli_query($conn,$sql);
  
  if($result){
    echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>your commnent has been posted successfully</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  else{
    echo'<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>There is a problem in posting your comment please try again</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Medi care</title>
  </head>
  <body>
  
    <!--Ihave put the jumbo tron here-->
    
    <div class="jumbotron container my-4">
  <h1 class="display-4"><?php echo $ttitle ?></h1>
  <b class="lead"><?php echo $tdesc?></b>
  <hr class="my-4">
  <p>Guidelines to be followed while using this forum are as follows:Introduce yourself,Ask your question, Participate,Do not dominate the discussion</p><br>
  <strong class="text-left">Posted by: <?php echo $name?></strong><br><br>
  <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
</div>
<!--creating form to add comments-->
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
echo'<div class="container">
<h1>POST your comment</h1>
<form method="post" action="'.$_SERVER['REQUEST_URI'].'">
<div class="form-group">
    <label for="exampleFormControlTextarea1"></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Add post</button>
</form>
</div>';
}
else{
 echo'<p class="container lead">you need to logged in to post your comment</p>';
}
?>
<h1 class="container">Discussion</h1>

<!--here is media object where people can see the discussion-->
<?php
$sql="SELECT * FROM `comments` WHERE thread_id='$id';";
$result=mysqli_query($conn,$sql);
$isresult=false;
while($row=mysqli_fetch_assoc($result)){
$isresult=true;
$t_id=$row['thread_id'];
$content=$row['comment_content'];
$user_id=$row['thread_by'];
$sql2="SELECT * FROM `login` WHERE user_id='$user_id'";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
$email=$row2['user_email'];
$thread_time=$row2['time'];
echo '<div class="media my-3 container">
<img src="https://tse4.mm.bing.net/th?id=OIP.RkwFcXHFD8E_xorEIAmCgAAAAA&pid=Api&P=0" height="70px"width="60px" class="mr-3" alt="...">
<div class="media-body">
<p class="font-weight-bold my-0">Commented by '.$email.' at '.$thread_time.'</p>
<p>'.$content.'</p>
  </div>
</div>';
}
if(!$isresult){
  echo'<div class="jumbotron jumbotron-fluid container">
  <div class="container">
    <p class="display-4">No thread found!</p>
    <p class="lead">Be the first person to start the discussion</p>
  </div>
</div>';
}
?>


  <?php
    include '\xampp\htdocs\forum\_footter.php';
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>