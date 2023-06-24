
<?php 
  include '../../koneksi.php';
  session_start();
    $id       = mysqli_real_escape_string($koneksi, $_POST['id']);
    $password = md5($_POST['password']);

    $query      = "UPDATE user SET password='$password' WHERE id='$id'";
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