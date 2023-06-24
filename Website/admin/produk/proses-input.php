<?php 
    include '../../koneksi.php';
    $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
    $img = $_FILES['file']['name'];
    $x = explode('.', $img);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];	
    
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $detail = $_POST['detail'];
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){			
            move_uploaded_file($file_tmp, 'img/'.$img);
            $register = mysqli_query($koneksi,"INSERT INTO produk (img, nama_produk, harga, detail)
            VALUES ('$img','$nama','$harga','$detail')");
            if($register){
                echo "
                        <script>
                            alert('Berhasil Menambahkan produk');
                            window.location = 'produk.php';
                        </script>
                    ";
            }else{
                echo "
                    <script>
                        alert('Gagal Menambahkan produk');
        
                        window.location = 'proses-input.php';
                    </script>
                ";
            }
        }else{
            echo 'UKURAN FILE TERLALU BESAR';
        }
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
?>