<?php
include '\xampp\htdocs\forum\_header.php';
$search=$_GET['search'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  
 <div class="searchresult my-3 container">
<h2>Your search results for "<em><?php echo $search;?></em>"</h2>
 
 <?php
  $sql='SELECT * FROM `thread` WHERE match(thread_title,thread_desc) against ("'.$search.'")';
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if($num>0){
  while($row=mysqli_fetch_assoc($result)){
    $title=$row['thread_title'];
    $desc=$row['thread_desc'];
    $tid=$row['thread_id'];
    echo'
    <div class="result">
    <a class=text-dark href="/forum/thread.php?threadid='.$tid.'">'. $title .'</a>
    <p>'.$desc.'</p>
    </div>
    ';
  }
}
else{
    echo'<div class="jumbotron jumbotron-fluid container my-3">
    <div class="container">
      <p class="display-4">No thread found!</p>
      <p class="lead">please try to type something else</p>
    </div>
  </div>';
}
  ?>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
include '\xampp\htdocs\forum\_footter.php';
?>