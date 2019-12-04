<?php 
    include "koneksi.php";
    if(!isset($_SESSION['login'])){
        header('location:login.php');
    }

    $path = '/berkalajp/new/index.php';

    // Cek jumlah feedback baru
    $sql2 = "SELECT * FROM feedback WHERE dibaca = 'N'";
    $hasil2 = $db->query($sql2);
    $belumdibaca = $hasil2->num_rows;

?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/favicon.ico">
    <title>Aplikasi Berkala</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom/style.css">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
<body class="bg-light">
<!-- NAVBAR -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Aplikasi Berkala</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="?">Daftar Tenaga Kerja</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?act=pembayaran">Pembayaran</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?act=kartukontrol">Kartu Kontrol</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?act=keladmin">Kelola Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?act=feedback">Feedback  <span class="badge badge-danger"><?=$belumdibaca?></span></a>
      </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li><a href="logout.php" class="btn btn-danger text-white"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>  
</nav>