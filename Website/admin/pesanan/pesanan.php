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
  <title>Produk</title>
  <link rel="icon" type="image/x-icon" href="../../src/img/bg2.png">
  <link rel="stylesheet" href="pesanan.css">
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
          <li>
            <a href="../../admin/dashboard/dashboard.php">
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
            <a href="../../admin/klien/klien.php" >
              <i class="fa-solid fa-users"></i>
              <span>Klien</span>
            </a>
          </li>
          <li>
            <a href="../../admin/produk/produk.php" >
              <i class="fa-solid fa-basket-shopping"></i>
              <span>Produk</span>
            </a>
          </li>
          <li>
            <a href="../../admin/pesanan/pesanan.php" class="active">
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
        <h2>DAFTAR PESANAN</h2>
        <div class="container-klien">
            <table>
              <tr style="text-transform:  uppercase;">
                <th scope="col">no</th>
                <th scope="col">username klien</th>
                <th scope="col">gambar</th>
                <th scope="col">nama produk</th>
                <th scope="col">harga</th>
                <th scope="col">detail</th>
                <th scope="col">status</th>
                <th scope="col">Tanggal Pesanan</th>
                <th scope="col">konfirmasi pesanan</th>
              </tr>
                  <?php 
                    include '../../koneksi.php';
                    $no = 1;
                    $querypesanan = mysqli_query($koneksi, "SELECT pesanan.*, produk.detail, user.username FROM pesanan
                                                    INNER JOIN produk ON pesanan.idproduk = produk.idproduk
                                                    INNER JOIN user ON pesanan.iduser = user.id
                                                    WHERE user.rule='client'");
                    while ($datapesanan = mysqli_fetch_array($querypesanan)) {
                  ?>
              <tr>
                <td scope="row"><?php echo $no++ ?></td>
                <td><?php echo $datapesanan['username'] ?></td>
                <td><img src="../produk/img/<?php echo $datapesanan['img_produk'] ?>" alt="" width="150px" height="120px"></td>
                <td><?php echo $datapesanan['nama_produk'] ?></td>
                <td>Rp<?php echo $datapesanan['harga'] ?></td>
                <td><?php echo $datapesanan['detail'] ?></td>
                <td><?php echo $datapesanan['status'] ?></td>
                <td><?php echo $datapesanan['tgl_pesanan'] ?></td>
                <td class="btn">
                  <a href="konfirmasi-pesanan.php?idpesanan=<?php echo $datapesanan['id'] ?>">
                    <i class="fa-solid fa-pen"></i>
                  </a>
                </td>
              </tr>
              <?php } ?>
            </table>
        </div>
      </div>
    </section>
  </div>


  <script src="produk.js"></script>
</body>

</html>