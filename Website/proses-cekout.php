<?php 
include 'koneksi.php';
$id = $_POST['id'];
$idu = $_POST['iduser'];
// var_dump($idu);
$updatePesanan = "INSERT INTO pesanan (iduser, idproduk,img_produk, nama_produk, jumlah,harga, total_harga, status, tgl_pesanan) 
                SELECT cart.iduser, cart.idproduk,produk.img, produk.nama_produk, SUM(cart.jumlah),produk.harga, 
                ((SUM(cart.jumlah))*produk.harga), 'proses', CURRENT_TIMESTAMP 
                FROM cart INNER JOIN produk ON cart.idproduk = produk.idproduk WHERE cart.iduser='$idu' GROUP BY cart.idproduk";
$deleteCart = "DELETE cart.* FROM cart WHERE iduser=$idu";
$resetAI = "ALTER TABLE cart AUTO_INCREMENT = 1";

$update_pesanan = mysqli_query($koneksi, $updatePesanan);
$delete_cart = mysqli_query($koneksi, $deleteCart);
$resetAutoIncrement = mysqli_query($koneksi, $resetAI);

var_dump($update_pesanan);
var_dump($deleteCart);
var_dump($resetAutoIncrement);
// foreach($id as $key=>$value){
//     $update_cart = mysqli_query($koneksi,"UPDATE cart SET status='CEKOUT' WHERE id='".$value."'");
// }
// while($update_cart = mysqli_query($koneksi,"UPDATE cart SET status='CEKOUTsefewfwe' WHERE iduser='$idu'"));
// var_dump($update_cart);
if ($update_pesanan){
    echo "
        <script>
            alert('Berhasil memesan, silahkan tunggu konfirmasi pesanan');
            window.location = 'index.php';
        </script>
    ";
}
else{
    // mysqli_error();
    echo "
        <script>
        alert('Gagal Cekout produk');
        window.location = 'cart.php';
        </script>
    ";
    // echo mysqli_error($register);
}
?>