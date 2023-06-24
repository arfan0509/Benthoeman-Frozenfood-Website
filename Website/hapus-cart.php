<?php 

include './koneksi.php';
$id = $_GET['id'];

$hapus_produk = mysqli_query($koneksi,"DELETE FROM cart WHERE id='$id'");


if ($hapus_produk){
    echo "
        <script>
            window.location = './cart.php';
        </script>
    ";
}
else{
    echo "
        <script>
            alert('Gagal menghapus produk');
            window.location = './cart.php.php';
        </script>
    ";
    // echo mysqli_error($register);
}

?>