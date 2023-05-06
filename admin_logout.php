<?php
session_start();
echo "logging out please out.....";
session_unset();
session_destroy();
header("location:index.php");
?>