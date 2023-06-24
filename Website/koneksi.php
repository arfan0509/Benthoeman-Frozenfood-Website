<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "frozenfood";

    $koneksi = mysqli_connect( $servername, $username, $password, $database);

    if(!$koneksi)
    {
        die("Error, Please Try Again:" . mysqli_connect_error());
    }
    
    
?>