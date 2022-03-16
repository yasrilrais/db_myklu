<?php

require "connect.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $response = array();
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];

    $cek = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_fetch_array(mysqli_query($con, $cek));

    if (isset($result)) {
        $response['value']=2;
        $response['message']="Username telah digunakan";
        echo json_encode($response);
    }else {
        $insert = "INSERT INTO users VALUE(NULL,'$username','$password','$nama','$nim',NOW())";
        if (mysqli_query($con, $insert)) {
            $response['value']=1;
            $response['message']="Berhasil didaftarkan";
            echo json_encode($response);
        } else {
            $response['value']=0;
            $response['message']="Gagal didaftarkan";
            echo json_encode($response);
        }
    }



}

?>