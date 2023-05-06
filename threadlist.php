
<?php
include '\xampp\htdocs\forum\db.php';
$id=$_GET['catid'];
session_start();
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
  $user_id= $_SESSION['user_id'];
}

$sql="SELECT * FROM `categories` WHERE category_id='$id'";
$result=mysqli_query($conn,$sql);
$num =mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result)){
  $cat_id=$row['category_id'];
 $name= $row['category_name'];
 $discription=$row['category_discription'];
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
  <?php 
    include '\xampp\htdocs\forum\_header.php';
    ?> 
  <!--writing a php to store the thread in the database-->
  <?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
  $t_title=$_POST['thread_title'];
  $t_desc=$_POST['thread_desc'];
  $t_desc=str_replace("<","&lt",$t_desc);
  $T_desc=str_replace(">","&gt",$t_desc);
  $t_cat_id=$id;
  $sql='INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_user_id`, `thread_category_id`, `time`) VALUES ("'.$t_title.'", "'.$t_desc.'", "'.$user_id.'", "'.$t_cat_id.'", current_timestamp())';
  $result=mysqli_query($conn,$sql);
  if($result){
    echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>your problem has been posted successfully</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  }

  ?>
    <!--Ihave put the jumbo tron here-->
    <div class="jumbotron container my-4">
  <h1 class="display-4">Welcome to <?php echo $name ?> Forum</h1>
  <p class="lead"><?php echo $discription?></p>
  <hr class="my-4">
  <p>Guidelines to be followed while using this forum are as follows:Introduce yourself,Ask your question, Participate,Do not dominate the discussion</p>
  <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
</div>
<!--here i am going to show the form to the user so that that they can ask the questions-->
<?php
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
echo'
<div class=container>
<div class="my-3 py-2"><h1>Start the dicussion</h1></div>
<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Problem title</label>
    <input type="text" class="form-control" id="thread_title" aria-describedby="emailHelp" name="thread_title" placeholder="Enter the problem">
    <small id="emailHelp" class="form-text text-muted">keep your title short and crisp</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Elaborate your problem</label>
    <textarea class="form-control" id="thread_desc" rows="3" name="thread_desc" placeholder="describe your problem"></textarea>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>';
}
else{
  echo'<p class="lead container">You need to be logged in to start the discussion</p>';
}
?>

<div class="container my-3 py-2"><h1>Browse Questions</h1></div>
<!--here is media object where people can see the discussion-->
<?php
$sql="SELECT * FROM `thread` WHERE thread_category_id='$id'";
$result=mysqli_query($conn,$sql);
$isresult=false;
while($row=mysqli_fetch_assoc($result)){
$isresult=true;
$title=$row['thread_title'];
$desc=$row['thread_desc'];
$tid=$row['thread_category_id'];
$t_user_id=$row['thread_user_id'];
$thread_time=$row['time'];
$t_id=$row['thread_id'];
$sql2="SELECT * FROM `login` WHERE user_id='$t_user_id'";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
$email=$row2['user_email'];
echo'<div class="media container">
<img height="70px" width="60px" src="https://tse4.mm.bing.net/th?id=OIP.RkwFcXHFD8E_xorEIAmCgAAAAA&pid=Api&P=0" class="align-self-start mr-3" alt="...">
<div class="media-body">
<p class="font-weight-bold my-0">Asked by '.$email.' at '.$thread_time.'</p>
  <h5 class="mt-0"><a class="text-dark" href="/forum/thread.php?threadid='.$t_id.'">'.$title.'</a></h5>
  <p>'.$desc.'</p>
</div>
</div>';
}
//when no thread is found: 
if(!$isresult){
 echo'<div class="jumbotron jumbotron-fluid container">
  <div class="container">
    <p class="display-4">No thread found!</p>
    <p class="lead">Be the first person to ask the question</p>
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