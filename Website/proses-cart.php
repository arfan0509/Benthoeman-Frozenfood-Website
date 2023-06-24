<?php 

include "./koneksi.php";

$id = $_POST['idproduk'];
$jumlah = $_POST['jumlah'];
$iduser = $_POST['iduser'];

$simpan_cart = mysqli_query($koneksi,"INSERT INTO cart (iduser, idproduk, jumlah, status) VALUES ('$iduser','$id','$jumlah','KERANJANG')");

if($simpan_cart){
    echo "
        <script>
            alert('Barang telah masuk ke keranjang anda');
            window.location = 'index.php';
        </script>
    ";
}else{
    
    echo "
        <script>
            alert('Barang gagal masuk ke keranjang anda');
            window.location = 'index.php';
        </script>
    ";
}

?>