<?php 
  include "koneksi.php";
  
  session_start();
  if(isset($_SESSION['user'])) header("Location: /dashboard.php");
  $_SESSION["error"] = null;
  
  if(isset($_POST['email']) && isset($_POST['password'])){
    $sql1 = "SELECT * FROM users WHERE email='".$_POST['email']."';";
    $result1 = mysqli_query($koneksi, $sql1);
    $user = mysqli_fetch_object($result1);
    if($user){
      if(password_verify($_POST['password'], $user->password)){
        $_SESSION['user'] = $user;
        header("Location: /dashboard.php");
      }
      else{
        $_SESSION["error"] = "Wrong password!";
      }
    }
    else{
      $_SESSION["error"] = "Email not found!";
    }
  }
?>

<!doctype html>
<html lang="en" style="height: 100%;width: 100%;margin: 0;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monitor Kapal</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body style="height: 100%;width: 100%;margin: 0;background:linear-gradient(56deg, rgba(34,193,195,1) 0%, rgba(251,251,251,1) 29%, rgba(235,213,255,1) 43%, rgba(251,243,225,1) 65%, rgba(130,96,255,1) 100%);">
    <div class="row p-5" style="width:100%;">
        <div class="col-xl-7"></div>
        <div class="col-xl-4 p-5">
          <div class="card p-2" style="background-color:rgba(255,255,255,0.6); border-radius:20px;">
            <div class="card-body">
              <?php if(isset($_SESSION['error'])){ ?>
              <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error']; ?>
              </div>
              <?php } ?>
              <form method="POST">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"><b>Email address</b></label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;">Login</button>
                <hr>
                <p>dont have an account ? <a href="/register.php">Register Now</a></p>
              </form>
            </div>
          </div>
        </div>
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
  </body>
</html>