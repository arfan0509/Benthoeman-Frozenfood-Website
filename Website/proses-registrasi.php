<?php 
include './koneksi.php';
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    
    $register = mysqli_query($koneksi,"INSERT INTO user (nama, username, email, password, alamat, notelp, rule) VALUES ('$nama','$username','$email','$password','$alamat','$nohp','client')");
    // header("Location:registrasi.html");
    if ($register){
        echo "
            <script>
                alert('Anda berhasil mendaftar');
                window.location = 'registrasi.html';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Gagal dalam melakukan pendaftaran');

                // window.location = 'registrasi.html';
            </script>
        ";  
    }
?>