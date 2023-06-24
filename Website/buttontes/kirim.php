<?php 
    include '../koneksi.php';
    $idproduk = $_GET['idproduk'];
    $iduser = $_GET['iduser'];

    $sql_konfirmasi = mysqli_query($koneksi, "UPDATE cart SET status = 'DIKIRIM' WHERE id = 1 ");

    if($sql_konfirmasi){
        echo "
        <script>
            window.location = '../button_test.php';
        </script>
        ";
    }
?>