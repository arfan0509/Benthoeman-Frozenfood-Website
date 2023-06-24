<?php 
include 'koneksi.php';
session_start();
// session_regenerate_id();
if($_SESSION['status'] !== "login"){
  header("location:registrasi.html");
}

$id = $_SESSION['id'];
$query = "SELECT * FROM user WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Benthoeman Frozenfood</title>
  <link rel="icon" type="image/x-icon" href="../Website/src/img/bg2.png">
  <link rel="stylesheet" href="client.css">
  <script src="https://kit.fontawesome.com/3119dd19b3.js" crossorigin="anonymous"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
  <div class="fcontainer">

    <nav class="navbar">
      <div class="logo">
        <span id="lg1">Benthoeman</span><br>
        <span id="lg2">Frozenfood</span>
      </div>

      <ul class="menu">
        <li><a href="index.php" class="list-menu">Home</a></li>
        <li><a href="index.php#about-us" class="list-menu">About</a></li>
        <li><a href="produk.php" class="list-menu">Products </a></li>
        <li><a href="index.php#kontak" class="list-menu">Contact</a></li>
      </ul>

      <ul class="menu2">
        <li>
          <div class="cart">
            <a href="cart.php">
              <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M5 23C3.34315 23 2 21.6569 2 20C2 18.603 2.95486 17.429 4.24752 17.0952L4.69039 15.7666C3.68249 15.3428 2.94961 14.3834 2.8609 13.2301L2.15634 4.07081C2.10986 3.46658 1.60601 3 1 3C0.447715 3 0 2.55228 0 2C0 1.44772 0.447715 1 1 1C2.65109 1 4.02381 2.27119 4.15045 3.91741L23 3.94461C23.6306 3.94461 24.1038 4.52119 23.9808 5.13969L22.301 13.5852C22.0218 14.989 20.7899 16 19.3586 16H6.72076L6.29044 17.291C7.00909 17.6339 7.56987 18.2544 7.8341 19.0137C7.88806 19.0047 7.94348 19 8 19H16.1707C16.5825 17.8348 17.6938 17 19 17C20.6569 17 22 18.3431 22 20C22 21.6569 20.6569 23 19 23C17.6938 23 16.5825 22.1652 16.1707 21H8C7.94348 21 7.88806 20.9953 7.8341 20.9863C7.42615 22.1586 6.31133 23 5 23ZM4.98355 19.0001C4.43885 19.0089 4 19.4532 4 20C4 20.5523 4.44772 21 5 21C5.55228 21 6 20.5523 6 20C6 19.4533 5.56122 19.009 5.01659 19.0001C5.0056 19.0003 4.99458 19.0003 4.98355 19.0001V19.0001ZM19 21C19.5523 21 20 20.5523 20 20C20 19.4477 19.5523 19 19 19C18.4477 19 18 19.4477 18 20C18 20.5523 18.4477 21 19 21Z" />
              </svg>
            </a>
          </div>
        </li>

        <li class="profile">
          <a class="profile-btn">
            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="24"
              height="24">
              <path d="M16.043,14H7.957A4.963,4.963,0,0,0,3,18.957V24H21V18.957A4.963,4.963,0,0,0,16.043,14Z" />
              <circle cx="12" cy="6" r="6" />
            </svg>
          </a>

          <div class="profile-content">
            <a class="user">
              <div class="img-profile">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="24"
                  height="24">
                  <path d="M16.043,14H7.957A4.963,4.963,0,0,0,3,18.957V24H21V18.957A4.963,4.963,0,0,0,16.043,14Z" />
                  <circle cx="12" cy="6" r="6" />
                </svg>
              </div>
              <span>
                <?php 
                  echo "".$data['nama']."";
                ?>
              </span>
            </a>
            <hr>
            <a href="client.php" class="akun">
              <i class="fa-solid fa-house"></i>
              <span>Akun</span>
            </a>
            <a href="logout.php" class="akun">
              <i class="fa-solid fa-right-from-bracket"></i>
              <span>Keluar</span>
            </a>
          </div>
        </li>

        <li class="toggler">
          <div class="toggle">
            <a>
              <i class="fa-solid fa-bars"></i>
            </a>
          </div>

          <div class="toggle-content">
            <a class="user">
              <div class="img-profile">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="24"
                  height="24">
                  <path d="M16.043,14H7.957A4.963,4.963,0,0,0,3,18.957V24H21V18.957A4.963,4.963,0,0,0,16.043,14Z" />
                  <circle cx="12" cy="6" r="6" />
                </svg>
              </div>

              <span>
                <?php 
                    echo "".$data['nama'].""
                  ?>
              </span>
            </a>
            <hr>
            <a href="#" class="toggle-menu">
              <i class="fa-solid fa-house"></i>
              <span>Home</span>
            </a>
            <a href="#about-us" class="toggle-menu">
              <i class="fa-solid fa-info"></i>
              <span>About</span>
            </a>
            <a href="#" class="toggle-menu">
              <i class="fa-solid fa-basket-shopping"></i>
              <span>Products</span>
            </a>
            <a href="#" class="toggle-menu">
              <i class="fa-solid fa-phone"></i>
              <span>Contact</span>
            </a>
            <a href="logout.php" class="toggle-menu">
              <i class="fa-solid fa-right-from-bracket"></i>
              <span>Log out</span>
            </a>
          </div>
        </li>
      </ul>
    </nav>

    <section class="konten">
      <div class="path">
        <a href="index.php">Homepage </a>
        /
        <a href="client.php"> My Account</a>
      </div>
      <div class="wrapper-akun">
        <div class="menu-akun">
          <h1>My Account</h1>
          <ul>
            <li><a href="#" class="list-menu-akun1 active-menu-akun" onclick="showform1()">
              <i class="fa-solid fa-user"></i>
                Account Details
            </a></li>
            <li><a href="#" class="list-menu-akun2" onclick="showform2()">
              <i class="fa-solid fa-basket-shopping"></i>
                My Order
            </a></li>
          </ul>
        </div>
  
        <div class="form-akun">

            <div class="MyAccount" id="MyAccount">
              <h1>Account Details</h1>
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
              <div class="wrapper">
                <!--Personal-->
                <div class="personal">
                  <h4>Personal Information</h4>
                  <hr>
                  <form action="client-edit-personal.php" method="POST" class="form-MyAccount-personal">
                    <input type="text" name="id" id="id" value="<?php echo $_SESSION['id']; ?>" hidden>
                    <label for="name">Name</label>
                    <input type="text" name="nama" id="name" placeholder="Your Name" value="<?php echo "".$data['nama']."" ?>" required>
                    <br>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your Username" value="<?php echo "".$data['username']."" ?>" required>
                    <br>
                    <label for="address">Address</label>
                    <input type="text" name="alamat" id="address" placeholder="Your Address" value="<?php echo "".$data['alamat']."" ?>" required>
                    <br>
                    <label for="number">Phone Number</label>
                    <input type="tel" name="nomor" id="number" placeholder="*08123456789" value="<?php echo "".$data['notelp']."" ?>" required>
                    <br>
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Your E-mail" value="<?php echo "".$data['email']."" ?>" required>
                    <br>
                    <input type="submit" id="save-btn" value="SAVE">
                  </form>
                </div>
              </div>
            </div>


            <div class="MyOrder" id="MyOrder">
              <h1>Your Order</h1>
              <table>
                <thead>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Tanggal Pesanan</th>
                  <th>Action</th>
                </thead>
                <tbody>
                    <?php 
                      $no= 1;
                        $sqlPesanan = mysqli_query($koneksi,"SELECT * FROM pesanan where iduser='".$_SESSION['id']."'");
                        while($datapesanan = mysqli_fetch_array($sqlPesanan)){
                    ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><img src="admin/produk/img/<?= $datapesanan['img_produk'] ?>" alt="" width="150px" height="120px" ></td>
                    <td><?= $datapesanan['nama_produk'] ?></td>
                    <td><?= $datapesanan['harga'] ?></td>
                    <td><?= $datapesanan['jumlah'] ?></td>
                    <td><?= $datapesanan['total_harga'] ?></td>
                    <td><?= $datapesanan['status'] ?></td>
                    <td><?= $datapesanan['tgl_pesanan'] ?></td>
                    <td><a href="detail-cart.php?idproduk=<?= $datapesanan['idproduk'] ?>" >Detail</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </section>

    <?php 
      mysqli_close($koneksi);
    ?> 


  </div>

  <script src="index.js"></script>
  <!-- Search -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- End Search -->
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script>
    var typed = new Typed('.teks-animasi', {
      strings: [
        'Benthoeman frozen food menyediakan aneka ragam makanan beku' + '<br>' +
        ' mulai dari olahan ayam, daging, sayur dan juga ikan.'
      ],
      typeSpeed: 35,
      showCursor: true,
      cursorChar: '|',
      autoInsertCss: true,
      loop: true,
      backSpeed: 60

    });
  </script>
</body>

</html>