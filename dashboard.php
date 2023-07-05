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
<html lang="en" style="height: 100%;width: 100%;margin: 0px; padding:0px;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monitor Kapal</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-inner {
          padding: 1em;
        }
        .card {
          margin: 0 0.5em;
          box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
          border: none;
          background-color: rgba(22, 22, 26, 0.18);
        }
        .carousel-control-prev,
        .carousel-control-next {
          background-color: #e1e1e1;
          width: 6vh;
          height: 6vh;
          border-radius: 50%;
          top: 50%;
          transform: translateY(-50%);
        }
        @media (min-width: 768px) {
          .carousel-item {
            margin-right: 0;
            flex: 0 0 33.333333%;
            display: block;
          }
          .carousel-inner {
            display: flex;
          }
        }
    </style>
  </head>
  <body style="height: 90%;width: 100%;margin: 0px; padding:0px;background:linear-gradient(56deg, rgba(34,193,195,1) 0%, rgba(251,251,251,1) 29%, rgba(235,213,255,1) 43%, rgba(251,243,225,1) 65%, rgba(130,96,255,1) 100%);">
    <div class="row m-0 ms-4 me-4 mt-4">
      <div class="col">
        <h2><b>Dashboard</b></h2>
      </div>
      <div class="col">
        <div class="d-flex justify-content-end me-4">
          <form action="" method="post">
              <button type="submit" class="btn btn-danger" name="logout" style="border-radius:50px; width:100px;"><b>Logout</b></button>
          </form>
        </div>
      </div>
    </div>
    <div class="row p-5 pt-0 d-flex justify-content-center align-items-center" style="width:100%;">
        <div class="col-xl-7">
          <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner" id="carousel-item">
                <?php 
                include 'koneksi.php';
                $sql = "select nama_kapal from kapals";
                $query = mysqli_query($koneksi, $sql);
                $datas = array();
                while($data = mysqli_fetch_object($query)){
                  $datas[] = $data->nama_kapal;
                }
                $datas = array_unique($datas);
                foreach($datas as $data){ 
                  $sql2 = "select * from kapals where nama_kapal='".$data."' order by created_at DESC;";
                  $query2 = mysqli_query($koneksi, $sql2);
                  $dataKapal = mysqli_fetch_object($query2);
                ?>
                <div class="carousel-item">
                    <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-center align-items-center">
                            <div class="alert alert-primary text-center p-1 ps-3 pe-3" style="display: inline-block; border-radius:20px;">
                              <h5 class="card-title pt-1"><?=$data?></h5>
                            </div>
                          </div>
                          <p style="font-size:16px; font-weight:20px; padding:0px; margin:0px;"><b>Longitude:</b></p>
                          <p style="font-size:16px; font-weight:20px;"><?=$dataKapal->longitude?></p>
                          <p style="font-size:16px; font-weight:20px; padding:0px; margin:0px;"><b>Latitude:</b></p>
                          <p style="font-size:16px; font-weight:20px;"><?=$dataKapal->latitude?></p>
                          <p style="font-size:16px; font-weight:20px; padding:0px; margin:0px;"><b>Yaw:</b></p>
                          <p style="font-size:16px; font-weight:20px;"><?=$dataKapal->yaw?></p>
                          <p style="font-size:16px; font-weight:20px; padding:0px; margin:0px;"><b>Pitch:</b></p>
                          <p style="font-size:16px; font-weight:20px;"><?=$dataKapal->pitch?></p>
                          <p style="font-size:16px; font-weight:20px; padding:0px; margin:0px;"><b>Roll:</b></p>
                          <p style="font-size:16px; font-weight:20px;"><?=$dataKapal->roll?></p>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
      </div>
      <div class="col-xl-5 h-100" style="position:relative;">
        <div class="mt-3 me-4">
          <div class="d-flex justify-content-end align-items-end" style="margin-top:0px;">
            <h3 style="font-weight:700;padding:0;margin:0;"><b>Sistem</b></h3>
          </div>
          <div class="d-flex justify-content-end align-items-end" style="margin-top:0px;">
            <h3 style="font-weight:700;padding:0;margin:0;"><b>Pendeteksi</h3>
          </div>
          <div class="d-flex justify-content-end align-items-end" style="margin-top:0px;">
            <h3 style="font-weight:700;padding:0;margin:0;"><b>Kapal</b></h3>
          </div>
        </div>
        <div class="d-flex justify-content-end align-items-end" style="position:absolrelativeute;">
          <img src="/img/ship2.png" alt="" width="80%">
        </div>
      </div>
  </div>

  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/jquery-3.7.0.js"></script>
  <script type="text/javascript">
    
        carousel_item();
        function carousel_item(){
          var multipleCardCarousel = document.querySelector(
            "#carouselExampleControls"
          );
          if (window.matchMedia("(min-width: 768px)").matches) {
            var carousel = new bootstrap.Carousel(multipleCardCarousel, {
              interval: false,
            });
            var carouselWidth = $(".carousel-inner")[0].scrollWidth;
            var cardWidth = $(".carousel-item").width();
            var scrollPosition = 0;
            $("#carouselExampleControls .carousel-control-next").on("click", function () {
              if (scrollPosition < carouselWidth - cardWidth * 4) {
                scrollPosition += cardWidth;
                $("#carouselExampleControls .carousel-inner").animate(
                  { scrollLeft: scrollPosition },
                  600
                );
              }
            });
            $("#carouselExampleControls .carousel-control-prev").on("click", function () {
              if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                $("#carouselExampleControls .carousel-inner").animate(
                  { scrollLeft: scrollPosition },
                  600
                );
              }
            });
          } else {
            $(multipleCardCarousel).addClass("slide");
          }
        }

        var lastLength = 0;
        function ajaxFunction(){
            var xhttp = new XMLHttpRequest();
            function stateck() {
                if(xhttp.readyState == 4){
                    document.getElementById("carousel-item").innerHTML = xhttp.responseText;
                    if(lastLength != xhttp.responseText.length){
                      console.log("new data detected, updating carousel");
                      carousel_item();
                    }
                    lastLength = xhttp.responseText.length;
                }
            }
            xhttp.onreadystatechange = stateck;
            xhttp.open("GET", "getData.php", true);
            xhttp.send(null);
        }
        setInterval(function() {
            ajaxFunction();
        }, 500);

    </script>
  </body>
</html>