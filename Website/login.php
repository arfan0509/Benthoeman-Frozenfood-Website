<?php 
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
$user = mysqli_fetch_array($login);

$admin = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password' AND rule='admin'");
$adm_cek = mysqli_num_rows($admin);
$adm = mysqli_fetch_array($admin);

if ($adm_cek > 0) {
  session_start();
  $_SESSION['id'] = $adm['id'];
  $_SESSION['nama'] = $adm['nama'];
  $_SESSION['username'] = $username;
  $_SESSION['email'] = $adm['email'];
  $_SESSION['alamat'] = $adm['alamat'];
  $_SESSION['pwd'] = $adm['password'];
  $_SESSION['notelp'] = $adm['notelp'];
  $_SESSION['status'] = "login";
  $_SESSION['rule'] = "admin";
  header("location:../Website/admin/dashboard/dashboard.php");
}
else if ($cek > 0) {
  session_start();
  $_SESSION['id'] = $user['id'];
  $_SESSION['nama'] = $user['nama'];
  $_SESSION['username'] = $username;
  $_SESSION['email'] = $user['email'];
  $_SESSION['pwd'] = $user['password'];
  $_SESSION['alamat'] = $user['alamat'];
  $_SESSION['notelp'] = $user['notelp'];
  $_SESSION['status'] = "login";
  $_SESSION['rule'] = "user";
  header("location:index.php");
}
else if ($username=="" && $password== md5("")) {
  echo "<script> 
  alert('Login gagal! Pastikan Username dan Password tidak kosong')
  window.location = 'registrasi.html' </script>";
}
else if ($username=="") {
  echo "<script> 
  alert('Login gagal! Pastikan Username tidak kosong')
  window.location = 'registrasi.html' </script>";
}
else if ($password== md5("")) {
  echo "<script> 
  alert('Login gagal! Pastikan Password tidak kosong')
  window.location = 'registrasi.html' </script>";
}
else {
  echo "<script> 
  alert('Login gagal! Username atau Password salah')
  window.location = 'registrasi.html' </script>";
  // header("location:registrasi.html");
}
?>