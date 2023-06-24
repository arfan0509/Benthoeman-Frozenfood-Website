<?php 
    include 'koneksi.php';
    $sql_user = mysqli_query($koneksi, "SELECT * FROM cart WHERE iduser = '8' AND idproduk = 12 AND status = 'CEKOUT' OR status = 'DITERIMA' OR status = 'DIKIRIM' OR status = 'SELESAI'");
    $user = mysqli_fetch_assoc($sql_user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="buttontes/konfirmasi.php?idproduk=12&iduser=8">Konfirmasi</a>
    <a href="buttontes/kirim.php?idproduk=12&iduser=8">Proses Kirim</a>
    <a href="buttontes/terima.php?idproduk=12&iduser=8">Diterima</a>
    <a href="buttontes/batal.php?idproduk=12&iduser=8">Batalkan</a>
</body>
</html>