<?php

require "connect.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $response = array();

    $idKeluhan = $_POST['idKeluhan'];

   
        $insert = "DELETE FROM keluhan WHERE id='$idKeluhan'";
        if (mysqli_query($con, $insert)) {
            $response['value']=1;
            $response['message']="Berhasil hapus data";
            echo json_encode($response);
        } else {
            $response['value']=0;
            $response['message']="Gagal hapus data";
            echo json_encode($response);
        }

}
