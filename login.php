<?php

require "connect.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $response = array();
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $cek = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = mysqli_fetch_array(mysqli_query($con, $cek));

    if (isset($result)) {
        $response['value']=1;
        $response['message']="Login Berhasil";
        $response['nama']=$result['nama'];
        $response['nim']=$result['nim'];
        $response['id']=$result['id'];
        echo json_encode($response);
    } else {
        $response['value']=0;
        $response['message']="Login Gagal";
        echo json_encode($response);
    }



}

?>