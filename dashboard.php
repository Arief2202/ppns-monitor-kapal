<?php 
  include "koneksi.php";
  
  session_start();
  if(!isset($_SESSION['user'])) header("Location: /login.php");
  $_SESSION["error"] = null;
  
  if(isset($_POST['logout'])){
    $_SESSION['user'] = null;
    header("Location: /dashboard.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monitor Kapal</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-2 float-start">
        <form action="" method="post">
            <button type="submit" class="btn btn-danger" name="logout">Logout</button>
        </form>
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
  </body>
</html>