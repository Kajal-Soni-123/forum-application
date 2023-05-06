<?php
if(isset($_GET['inserted'])){
  echo'<script>alert("One category has been inseted successfully")</script>';
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

    <title>Medi Care</title>
  </head>
  <body>
    <!-- As a heading -->
<nav class="navbar navbar-light bg-dark">
  <span class="navbar-brand mb-0 h1 text-light">Medi Care</span>
  <span class="navbar-brand mb-0"><a class="text-light" href="admin_logout.php">Logout</a></span>
</nav>
<div class="container my-5">
<form action="category_handle.php" method="post">
  <div class="form-group">
    <label for="exampleInputPassword1">Category Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="name"  placeholder="Enter Category Name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Category Description</label>
    <textarea class="form-control" id="exampleInputPassword1" name="desc" required> Enter Category Description</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Category Image</label>
    <input type="file" class="form-control" id="exampleInputPassword1" name="image" required />
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>