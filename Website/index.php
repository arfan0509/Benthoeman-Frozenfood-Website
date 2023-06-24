<?php 
include 'koneksi.php';
session_start();
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
  <link rel="stylesheet" href="indexstyle.css">
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
        <li><a href="#about-us" class="list-menu">About</a></li>
        <li><a href="#produk" class="list-menu">Products </a></li>
        <li><a href="#kontak" class="list-menu">Contact</a></li>
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
                  echo $data['nama'];
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
                    echo $_SESSION['username'];
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



    <section class="header-container">
      <div class="banner">
        <!-- Teks -->
        <div class="text">
          <span class="teks-slogan">Fresh food, <br>For your mood</span><br>
          <span class="teks-animasi"></span><br>
          <a href="produk.php">
            <button type="button" class="btn-all-produk">View All Products ></button><br>
          </a>
        </div>
        <!-- Gambar-->
        <div class="img-makanan">
          <img src="src/img/bg2.png" alt="">
        </div>
      </div>
      <img id="img-es1" src="src/img/es.png">
    </section>

    <!-- Konten 1 -->
    <section class="slogan">
      <img id="img-es2" src="src/img/es2.png" alt="">

      <div class="slogan-content">
        <div class="card">
          <img src="../Website/src/img/cloche.svg" alt="">
          <h4>FRESH & BERKUALITAS</h4>
          <p>Makanan yang berkualitas dan bergizi tidak mengandung bahan pengawet dan aman untuk dikonsumsi</p>
        </div>
        <div class="card">
          <img src="../Website/src/img/garpu.svg" alt="">
          <h4>SIAP SAJI</h4>
          <p>Makanan yang berkualitas dan bergizi tidak mengandung bahan pengawet dan aman untuk dikonsumsi</p>
        </div>
        <div class="card">
          <img src="../Website/src/img/delivery.svg" alt="">
          <h4>PENGIRIMAN CEPAT</h4>
          <p>Makanan yang berkualitas dan bergizi tidak mengandung bahan pengawet dan aman untuk dikonsumsi</p>
        </div>
      </div>
    </section>
    <!-- End of Konten 1-->

    <section class="about-us" id="about-us">
      <div class="teks-about-us1">
        <img src="../Website/src/svg/daun.svg" class="daun1">
        <img src="../Website/src/svg/tangan.svg" class="tangan">
        <img src="../Website/src/svg/daun.svg" class="daun2">
      </div>
      <div class="teks-about-us2">
        <h1>About Us</h1>
        <p>Benthoeman Frozenfood menyediakan aneka ragam makanan beku mulai dari olahan ayam, daging, sayuran dan juga
          ikan</p>
      </div>
    </section>

    <section class="produk" id="produk">
      <div class="top-produk">
        <h1>Products</h1>
        <a href="produk.php" class="button-produk">
          <button><b>View All Products >></b></button>
        </a>
      </div>

      <div class="card">
          <?php 
            $query = mysqli_query($koneksi, "SELECT * FROM produk");
            while ($data = mysqli_fetch_array($query)) {
          ?>
        <div class="card-produk">
          <div class="img-produk">
            <img src="./admin/produk/img/<?= $data['img']?>" alt="">
          </div>
          <a href="detail-produk.php?idproduk=<?php echo $data['idproduk']  ?>" style="text-decoration: none; color: black;"><span><?= $data['nama_produk'] ?></span></a>
          <span><?= $data['harga'] ?></span>

          <form action="proses-cart.php" method="post">
            <div class="input">
              <input type="text" name="iduser" value="<?= $_SESSION['id']?>" class="form-control jumlah" id="" hidden>
              <input type="text" name="idproduk" value="<?= $data['idproduk']?>" class="form-control jumlah" id="" hidden>
              <input type="number" name="jumlah" min="1" value="1" class="input-jumlah">
              <button>
                <i class="fa-solid fa-cart-plus"></i>
              </button>
            </div>
          </form>
        </div>
        <?php } ?>
      </div>
    </section>

    <section class="bottom" id="kontak">
      <div class="teks">
        <h1>BISA PESAN MELALUI MOBILE APPS</h1>
        <p>Tersedia juga pemesanan produk frozen food Benthoeman melalui mobile apps Android yang dapat anda pesan
          secara mudah</p>
          
      </div>
      <div class="ornamen">
        <div class="slice"></div>
        <div class="bottom-bot">
          <h3>Kontak</h3>
          <br>
          <a href="https://wa.me/6281333007494"
            style="color: white; display: flex;  align-items: center; width: 200px; text-decoration: none; margin-bottom: 40px;">
            <i class="fa-brands fa-whatsapp" style="font-size: 2rem; margin-right: 10px;"></i>
            WhatsApp
          </a>
          <a href="https://wa.me/6281333007494"
            style="color: white; display: flex;  align-items: center; width: 40%; text-decoration: none; margin-bottom: 40px;">
            <i class="fa-solid fa-location-dot" style="font-size: 2rem; margin-right: 10px;"></i>
            Perum, Taman Candiloka, Ngampelsari, Kec. Candi, Kabupaten Sidoarjo, Jawa Timur 61271
          </a>
        </div>
      </div>
    </section>
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