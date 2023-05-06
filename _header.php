<?php
include '\xampp\htdocs\forum\db.php';
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/forum">Medi Care</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/forum/About.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
     $sql="SELECT * FROM `categories`";
     $result=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($result)){
     $cat_name=$row['category_name'];
     $cat_id=$row['category_id'];
    echo'<a class="dropdown-item" href="/forum/threadlist.php?catid='.$cat_id.'">'.$cat_name.'</a>';
     }

  echo'</div>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/forum/contact.php">Contact</a>
  </li> 
  </ul>
  <div class="row mx-2">
  <form class="form-inline my-2 my-lg-0" action="/forum/search.php" method="get">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  <button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#loginModal">
  login
</button>
<button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#signinModal">
 Sign up
</button>
<button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#adminModal">
 Admin Login
</button>
<button type="button" class="btn btn-success ml-2"><a class="text-light" href="/forum/logout.php">log out</a></button>

<div>
</div>
</nav>';
include '\xampp\htdocs\forum\login.php';
include '\xampp\htdocs\forum\signin.php';
include '\xampp\htdocs\forum\admin_login.php';

?>