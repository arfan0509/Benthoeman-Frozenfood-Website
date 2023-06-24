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
  <link rel="stylesheet" href="produk.css">
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
            <a href="../../admin/produk/produk.php" class="active">
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
        <h2>DAFTAR PRODUK</h2>
        <a href="input-produk.php" 
            style="background-color: rgba(41, 48, 66); padding: 10px; width: 100px; 
                    margin-top: 1rem; margin-left: 1rem;
                    color: white; text-align: center;" >
          <i class="fa-solid fa-plus"></i> Produk
          <!-- <button>input barang</button> -->
        </a>

        <div class="container-klien">
            <table>
              <tr style="text-transform:  uppercase;">
                <th scope="col">no</th>
                <th scope="col">gambar</th>
                <th scope="col">nama produk</th>
                <th scope="col">harga</th>
                <th scope="col">detail</th>
                <th scope="col">edit</th>
                <th scope="col">hapus</th>
              </tr>
                  <?php 
                    include '../../koneksi.php';
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM produk");
                    while ($data = mysqli_fetch_array($query)) {
                  ?>
              <tr>
                <td scope="row"><?php echo $no++ ?></td>
                <td><img src="img/<?php echo $data['img'] ?>" alt="" width="150px" height="120px"></td>
                <td><?php echo $data['nama_produk'] ?></td>
                <td>Rp<?php echo $data['harga'] ?></td>
                <td><?php echo $data['detail'] ?></td>
                <td class="btn">
                  <a href="edit-produk.php?id=<?php echo $data['idproduk'] ?>">
                    <i class="fa-solid fa-pen"></i>
                  </a>
                </td>
                <td class="btn">
                  <a href="proses-hapus.php?id=<?php echo $data['idproduk']  ?>" onclick="return confirm('apakah anda yakin untuk menghapus?')" >
                    <i class="fa-regular fa-trash-can"></i>
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