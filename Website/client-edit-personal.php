
<?php 
  include 'koneksi.php';
  session_start();

    $id       = mysqli_real_escape_string($koneksi, $_POST['id']);
    $nama       = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username   = mysqli_real_escape_string($koneksi, $_POST['username']);
    $alamat     = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $nomor      = mysqli_real_escape_string($koneksi, $_POST['nomor']); 
    $email      = mysqli_real_escape_string($koneksi, $_POST['email']); 

    $query      = "UPDATE user SET nama='$nama', username='$username', email='$email', alamat='$alamat', notelp='$nomor' WHERE id='$id'";
    if (mysqli_query($koneksi, $query)){
      // session_start();
      // session_regenerate_id();
      $_SESSION['proses'] = "Data Berhasil Diperbarui";
      
      // echo "<script> 
      //       alert('Berhasil Merubah data');
      //       window.history.back(); 
      //   </script>";
    }
    mysqli_close($koneksi);
    header("Location: " . $_SERVER['HTTP_REFERER']);
?>