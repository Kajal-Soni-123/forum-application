<!--including the data base-->

<?php
$error="false";
$admin_error="";
if(isset($_GET['admin_loginerror'])){
  $admin_error=$_GET['admin_loginerror'];
  $error="true";
}
?>
<?php
//include '\xampp\htdocs\forum\db.php';
include '\xampp\htdocs\forum\_header.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <title>Medi Care </title>
  </head>
  <body>
  <!--including the header-->
    <?php 
    //include '\xampp\htdocs\forum\_header.php';
    ?>
    <?php
    if($error=="true"){
      echo'
      <div class="alert alert-warning alert-dismissible fade m-0 show" role="alert">
  '.$admin_error.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
      ';
    }
    ?>
  <!--the slider container starts here -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="height:500px" src="https://images.unsplash.com/photo-1511174511562-5f7f18b874f8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2050&q=100" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img style="height:500px" src="https://images.unsplash.com/photo-1584515933487-779824d29309?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjF8fGltYWdlJTIwcmVsYXRlZCUyMHRvJTIwbWVkaWNhbCUyMGNhcmV8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" class="d-block w-100"alt="...">
    </div>
    <div class="carousel-item">
      <img style="height:500px" src="https://images.unsplash.com/photo-1599045118108-bf9954418b76?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NTN8fGltYWdlJTIwcmVsYXRlZCUyMHRvJTIwbWVkaWNhbCUyMGNhcmV8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  <div class="container">
       <h2 class="text-center my-3">Medi-Care Browse Categories</h2>
<!--card container starts here-->
    <div class="row">
<!--fetch all the categories from the categories table-->
<?php
$sql="SELECT * FROM `categories`";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
  $cat_id=$row['category_id'];
 $name= $row['category_name'];
 $discription=$row['category_discription'];
 $image=$row['image'];

echo'<div class="col-md-4 my-2">      
        <div class="card" style="width: 18rem height:30rem;">
         <img class="card_image" src="forum_image/'.$image.'" class="card-img-top">
         <div class="card-body">
            <h5 class="card-title"><a href="/forum/threadlist.php?catid='.$cat_id.'">'.$name.'</a></h5>
         <p class="card-text">'.substr($discription,0,50).'.....</p>
         <a href="/forum/threadlist.php?catid='.$cat_id.'" class="btn btn-primary">View Thread</a>
         </div>
      </div>
      </div>';
}
?>
    </div>
  </div>  
    <?php
    include '\xampp\htdocs\forum\_footter.php';
    ?>
    <!-- Optional Javacript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>