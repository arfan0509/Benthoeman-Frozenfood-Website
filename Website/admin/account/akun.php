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
  <title>Akun</title>
  <link rel="icon" type="image/x-icon" href="../../src/img/bg2.png">
  <link rel="stylesheet" href="akun.css">
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
            <a href="../../admin/dashboard/dashboard.php" >
              <i class="fa-solid fa-house"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="../../admin/account/akun.php" class="active">
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
        <div class="profil">
          <img src="../../src/img/avatar.png" alt="">
          <h3 class="nama"><?php echo "".$data['nama']."";?></h3>
          <span class="username">Administrator</span>
          
          <ul>
            <li onclick="profile()">
              <i class="fa-solid fa-user"></i>Profile
            </li>
            <li onclick="password()"">
              <i class="fa-solid fa-key"></i>Password
            </li>
            <li><a href="../../../Website/"><i class="fa-solid fa-store"></i>E-commerce</a></li>
          </ul>
        </div>

        <div class="edit-profil" id="edit-profil">
          <div class="con-editprofil" id="con-editprofil">
            <h2>PROFILE</h2>
            <!-- notif berhasil -->
                <?php if(isset($_SESSION['proses'])): ?>
                <div class="alertEdit" id="alertEdit">
                  <p>
                    <?php 
                        echo $_SESSION['proses'];
                        ?>
                  </p>
                  <i class="fa-solid fa-xmark" onclick="closeAlert()"></i>
                </div>
                <?php 
                unset($_SESSION['proses']);
                endif;
                ?>
            <form action="edit-profile.php" method="POST" class="form-editprofil">
              <input type="text" name="id" id="id" value="<?php echo $_SESSION['id']; ?>" hidden>
              <label for="name">Name</label>
              <input type="text" name="nama" id="name" placeholder="Your Name" value="<?php echo "".$data['nama']."" ?>"
                required>
              <br>
              <label for="username">Username</label>
              <input type="text" name="username" id="username" placeholder="Your Username"
                value="<?php echo "".$data['username']."" ?>" required>
              <br>
              <label for="address">Address</label>
              <input type="text" name="alamat" id="address" placeholder="Your Address"
                value="<?php echo "".$data['alamat']."" ?>" required>
              <br>
              <label for="number">Phone Number</label>
              <input type="tel" name="nomor" id="number" placeholder="*08123456789"
                value="<?php echo "".$data['notelp']."" ?>" required>
              <br>
              <label for="email">Email Address</label>
              <input type="email" name="email" id="email" placeholder="Your E-mail"
                value="<?php echo "".$data['email']."" ?>" required>
              <br>
              <input type="submit" id="save-btn" value="SAVE">
            </form>
          </div>
        </div>

        <div class="edit-password" id="edit-password">
          <div class="con-editprofil" id="con-editprofil">
            <h2>PASSWORD</h2>

            <!-- notif berhasil -->
                <?php if(isset($_SESSION['proses'])): ?>
                <div class="alertEdit" id="alertEdit">
                  <p>
                    <?php 
                        echo $_SESSION['proses'];
                        ?>
                  </p>
                  <i class="fa-solid fa-xmark" onclick="closeAlert()"></i>
                </div>
                <?php 
                unset($_SESSION['proses']);
                endif;
                ?>
            <form action="edit-password.php" method="POST" class="form-editprofil">
              <input type="text" name="id" id="id" value="<?php echo $_SESSION['id']; ?>" hidden>
              <label for="password">Password</label>
              <input type="text" name="password" id="password" placeholder="New Password" required>
              <br>
              <input type="submit" id="save-btn" value="SAVE">
            </form>
          </div>

        </div>
      </div>
    </section>  
  </div>


  <script src="akun.js"></script>
</body>

</html>