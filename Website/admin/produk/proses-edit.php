<?php 
    include '../../koneksi.php';
    $ekstensi_diperbolehkan	= array('png','jpg', 'jpeg');
    $img = $_FILES['file']['name'];
    $x = explode('.', $img);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];	

    $fotolama = $_POST['foto-lama'];
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $detail = $_POST['detail'];

    if(empty($img)){
        $register = mysqli_query($koneksi,"UPDATE produk set img='$fotolama', nama_produk='$nama', harga='$harga', detail='$detail' WHERE idproduk='$id'");
            
            if($register){
                echo "
                        <script>
                            alert('Berhasil Mengedit produk');
                            window.location = 'produk.php';
                        </script>
                    ";
            }else{
                echo "
                    <script>
                        alert('Gagal Mengedit produk');
        
                         window.location = 'produk.php';
                    </script>
                ";
            }
    }else{

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){		
                $target = "./img/".$fotolama;
                if(file_exists($target)){
                    unlink($target);
                }
                
                move_uploaded_file($file_tmp, 'img/'.$img);
                $register = mysqli_query($koneksi,"UPDATE produk set img='$img', nama_produk='$nama', harga='$harga', detail='$detail' WHERE idproduk='$id'");
                
                if($register){
                    echo "
                            <script>
                                alert('Berhasil Mengedit produk');
                                window.location = 'produk.php';
                            </script>
                        ";
                }else{
                    echo "
                        <script>
                            alert('Gagal Mengedit produk');
            
                            // window.location = 'produk.php';
                        </script>
                    ";
                }
            }else{
                echo 'UKURAN FILE TERLALU BESAR';
            }
        }else{
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        }
    }

?>