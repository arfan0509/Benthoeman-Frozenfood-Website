<?php 
  include '../../koneksi.php';
    session_start();
    if($_SESSION['status']!== "login"){
      header("location:../../logout.php");
    }
    if($_SESSION['rule']!== "admin"){
      echo "
        <script> 
          alert('Anda bukan administrator')
          window.location = '../../index.php' 
        </script>";
      // header("location:../../logout.php");
    }
    $id = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE id='$id'";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($hasil);

    $idpesanan = $_GET['idpesanan'];
    $querydata = mysqli_query($koneksi, "UPDATE pesanan SET status = 'pesanan diterima' WHERE pesanan.id='$idpesanan'");
    // $konfirmasi = mysqli_fetch_array($querydata);
    if($querydata){
      header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    mysqli_close($koneksi);
?> 
