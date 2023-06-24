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

    //produk
    $totaluser = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) AS totaluser FROM user WHERE rule='client'"));
    $totalproduk = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) AS totalproduk FROM produk"));
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="icon" type="image/x-icon" href="../../src/img/bg2.png">
  <link rel="stylesheet" href="dashboard.css">
  <script src="https://kit.fontawesome.com/3119dd19b3.js" crossorigin="anonymous"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
  <div class="container">
    <aside id="aside">
      <div class="top">
        <div class="logo">
          <h4>Benthoeman</h4>
          <i class="fa-solid fa-xmark" id="close-nav"></i>
        </div>
      </div>

      <div class="toggle">
        <a href="#">
          <i class="fa-solid fa-bars"></i>
        </a>
      </div>

      <div class="sidebar">
        <ul>
          <li >
            <a href="../../admin/dashboard/dashboard.php" class="active">
              <i class="fa-solid fa-house"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="../../admin/account/akun.php">
              <i class="fa-solid fa-id-badge"></i>
              <span>Akun</span>
            </a>
          </li>
          <li>
            <a href="../../admin/klien/klien.php">
              <i class="fa-solid fa-users"></i>
              <span>Klien</span>
            </a>
          </li>
          <li>
            <a href="../../admin/produk/produk.php">
              <i class="fa-solid fa-basket-shopping"></i>
              <span>Produk</span>
            </a>
          </li>
          <li>
            <a href="../../admin/pesanan/pesanan.php">
              <i class="fa-solid fa-truck-fast"></i>
              <span>Pesanan</span>
            </a>
          </li>
          <li>
            <a href="../../logout.php">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>




      </div>
    </aside>

    <section class="konten" id="konten">
      
      <div class="topbar">
        <ul>
          <li>
            <i class="fa-solid fa-bars-staggered" id="toggle-aside" onclick="hideAside()"></i>
          </li>
          <li>
            <div class="profil">
              <div class="pp">
                <img src="../../src/img/avatar.png" alt="">
              </div>
              <span><?php echo "".$data['nama']."";?></span>
            </div>
          </li>
        </ul>
      </div>

      <div class="container-konten">
        <div class="container-1">
          <div class="welcome">
            <h3>Selamat datang, <?php echo "".$data['nama']."";?> </h3>
            <h5>Benthoeman FrozenFood<br> Dashboard</h5>
          </div>
          <div class="total-user">
            <h1><?php echo "".$totaluser['totaluser']."";?></h1>
            <h4>Total Pengguna</h4>
          </div>
          <div class="total-produk">
            <h1><?php echo "".$totalproduk['totalproduk']."";?></h1>
            <h4>Total Produk</h4>
          </div>
          <div class="total-pesanan">
            <h1>32</h1>
            <h4>Total Pesanan</h4>
          </div>
        </div>
        <div class="container-2">
          <div class="produk-view">
            <h2>PRODUK</h2>
            <div class="container-tabel">
              <table>
                <tr>
                  <th class="th-produk">GAMBAR</th>
                  <th>NAMA</th>
                  <th>DETAIL</th>
                  <th>HARGA</th>
                </tr>
                <?php 
                  $query = mysqli_query($koneksi, "SELECT * FROM produk");
                  while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                  <td class="gmbr-produk">
                    <img src="../produk/img/<?= $data['img']?>" alt="<?= $data['nama_produk'] ?>">
                  </td>
                  <td><?= $data['nama_produk'] ?></td>
                  <td><?= $data['detail'] ?></td>
                  <td>Rp. <?= $data['harga'] ?></td>
                </tr>
                <?php } ?>
                
              </table>
            </div>

          </div>
          <div class="user-view">
            <h3>PENGGUNA</h3>
            <div class="container-user">
              <?php 
                  $query = mysqli_query($koneksi, "SELECT * FROM user WHERE rule='client'");
                  while ($data = mysqli_fetch_array($query)) {
                ?>
              <div class="user">
                <img src="../../src/img/avatar.png" alt="">
                <div class="info-user">
                  <h4><?= $data['username'] ?></h4>
                  <span><?= $data['email'] ?></span>
                </div>
              </div>
                <?php } ?>
                
            </div>
          </div>
        </div>
      </div>
    </section>  
  </div>


  <script src="dashboard.js"></script>
</body>

</html>