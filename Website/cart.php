<?php 
include 'koneksi.php';
session_start();
$id = $_SESSION['id'];
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
  <title>Keranjang</title>
  <link rel="stylesheet" href="cart.css">
  <link rel="icon" type="image/x-icon" href="src/img/bg2.png">
  <script src="https://kit.fontawesome.com/3119dd19b3.js" crossorigin="anonymous"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
  <div class="fcontainer">

    <nav>
      <div class="logo">
        <span id="lg1">Benthoeman</span><br>
        <span id="lg2">Frozenfood</span>
      </div>

      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php#about-us">About</a></li>
        <li><a href="produk.php">Products </a></li>
        <li><a href="index.php#kontak">Contact</a></li>
      </ul>


      <ul>
        <li>
          <div class="cart">
            <a href="cart.php">
              <svg width="24" height="24" viewBox="0 0 24 24   " fill="black" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M5 23C3.34315 23 2 21.6569 2 20C2 18.603 2.95486 17.429 4.24752 17.0952L4.69039 15.7666C3.68249 15.3428 2.94961 14.3834 2.8609 13.2301L2.15634 4.07081C2.10986 3.46658 1.60601 3 1 3C0.447715 3 0 2.55228 0 2C0 1.44772 0.447715 1 1 1C2.65109 1 4.02381 2.27119 4.15045 3.91741L23 3.94461C23.6306 3.94461 24.1038 4.52119 23.9808 5.13969L22.301 13.5852C22.0218 14.989 20.7899 16 19.3586 16H6.72076L6.29044 17.291C7.00909 17.6339 7.56987 18.2544 7.8341 19.0137C7.88806 19.0047 7.94348 19 8 19H16.1707C16.5825 17.8348 17.6938 17 19 17C20.6569 17 22 18.3431 22 20C22 21.6569 20.6569 23 19 23C17.6938 23 16.5825 22.1652 16.1707 21H8C7.94348 21 7.88806 20.9953 7.8341 20.9863C7.42615 22.1586 6.31133 23 5 23ZM4.98355 19.0001C4.43885 19.0089 4 19.4532 4 20C4 20.5523 4.44772 21 5 21C5.55228 21 6 20.5523 6 20C6 19.4533 5.56122 19.009 5.01659 19.0001C5.0056 19.0003 4.99458 19.0003 4.98355 19.0001V19.0001ZM19 21C19.5523 21 20 20.5523 20 20C20 19.4477 19.5523 19 19 19C18.4477 19 18 19.4477 18 20C18 20.5523 18.4477 21 19 21Z" />
              </svg>
            </a>
          </div>
        </li>

        <li class="profile">

          <a href="#" class="profile-btn">
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
      </ul>
    </nav>

    <div class="cart-produk">
      <h2>Keranjang Anda</h2>

      <div class="cart-container">
        <!-- Tabel -->
        <table >
          <tr>
            <th class="th-produk">Produk</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Hapus</th>
          </tr>
          <form action="proses-cekout.php" method="post">
          <?php 
            $no = 1;
            $total_item = 0;
            $total_bayar = 0;
            $total = 0;
            $jmlh_barang = 0;
            $sql_cart = mysqli_query($koneksi,"SELECT DISTINCT id, iduser, idproduk, status FROM cart WHERE iduser = '$id' AND status = 'KERANJANG'");
            while($cart = mysqli_fetch_array($sql_cart)){
              
              $sql_jumlah = mysqli_query($koneksi,"SELECT * FROM cart WHERE iduser = '$id' AND idproduk = '".$cart['idproduk']."' AND status = 'KERANJANG'");
              while($jumlah = mysqli_fetch_array($sql_jumlah)){
                $jumlah_total = $jumlah['jumlah'];

                $jmlh_barang += $jumlah_total;
              }
              
              
              $sql_produk = mysqli_query($koneksi,"SELECT * FROM produk WHERE idproduk = '".$cart['idproduk']."'");
              $produk = mysqli_fetch_array($sql_produk);
              
              $total = $produk['harga'] * $jmlh_barang;
              $total_harga = $produk['harga'] * $jmlh_barang;
              $total_item += $jmlh_barang;
              $total_bayar += $total_harga;

          ?>
          
          <!-- contoh produk -->
          <tr>
            <td class="td-produk">
            <input type="text" name="id" value="<?php echo $cart['id'] ?>" hidden>
            <input type="text" name="iduser" value="<?php echo $cart['iduser'] ?>" hidden>
              <img src="admin/produk/img/<?php echo $produk['img'] ?>" alt="">
              <div class="produk-detail">
                <span>nama produk: <?php echo $produk['nama_produk'] ?></span>
                <span>harga: Rp. <?php echo $produk['harga'] ?></span>
              </div>
            </td>
            <td><?php echo $jmlh_barang?></td>
            <td>Rp. <?php echo $total_harga ?></td>
            <td><a href="hapus-cart.php?id=<?= $cart['id'] ?>">hapus</a></td>
          </tr>
          <?php $jmlh_barang = 0; ?>
          <?php } ?>
        </table>
        <!-- END of Tabel -->
        
        <!-- Pesanan -->
        <div class="order">
          <h3>Rincian Belanja</h3>
          <span>Total Item: <?php echo $total_item ?></span>
          <span>Total Harga: <?php echo $total_bayar ?></span>
          <h4>Metode pembayaran : COD (cash on delivery)<br>*hanya mendukung pembayaran COD area sidoarjo</h4>
          <button type="submit" value="order">Order</button>
        </div>
      </form>
        <!-- end of Pesanan -->
      </div>
    </div>

    <section class="bottom">
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
</body>
</html>