<?php
    include "koneksi.php";
    $nama_kapal;
    $longitude;
    $latitude;
    $yaw;
    $pitch;
    $roll;
    if(isset($_GET['nama_kapal'])) $nama_kapal = $_GET['nama_kapal'];
    if(isset($_GET['longitude'])) $longitude = $_GET['longitude'];
    if(isset($_GET['latitude'])) $latitude = $_GET['latitude'];
    if(isset($_GET['yaw'])) $yaw = $_GET['yaw'];
    if(isset($_GET['pitch'])) $pitch = $_GET['pitch'];
    if(isset($_GET['roll'])) $roll = $_GET['roll'];

    if(isset($_POST['nama_kapal'])) $nama_kapal = $_POST['nama_kapal'];
    if(isset($_POST['longitude'])) $longitude = $_POST['longitude'];
    if(isset($_POST['latitude'])) $latitude = $_POST['latitude'];
    if(isset($_POST['yaw'])) $yaw = $_POST['yaw'];
    if(isset($_POST['pitch'])) $pitch = $_POST['pitch'];
    if(isset($_POST['roll'])) $roll = $_POST['roll'];

    $query = "INSERT INTO `kapals` (`id`, `nama_kapal`, `longitude`, `latitude`, `yaw`, `pitch`, `roll`, `created_at`) VALUES (NULL, '".$nama_kapal."', '".$longitude."', '".$latitude."', '".$yaw."', '".$pitch."', '".$roll."', NULL);";
    $result = mysqli_query($koneksi, $query);