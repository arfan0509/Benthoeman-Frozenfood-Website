<?php 
include '../../koneksi.php';
// $tabel = $_POST['delete'];
$id = $_GET['id'];

// foreach($tabel as $key=>$value){
//     $hapus_produk = mysqli_query($koneksi,"DELETE FROM produk WHERE idproduk='".$value."'");
// }
$hapus_produk = mysqli_query($koneksi,"DELETE FROM produk WHERE idproduk='$id'");

if ($hapus_produk){
    $_SESSION['hapus'] = "Data Berhasil Dihapus";
    // echo "
    //     <script>
    //         window.location = 'produk.php';
    //     </script>
    // ";
}
else{
    echo "
        <script>
            alert('Gagal menghapus produk');
            window.location = 'produk.php';
        </script>
    ";
    // echo mysqli_error($register);
}
    mysqli_close($koneksi);
    header("Location: " . $_SERVER['HTTP_REFERER']);
?>