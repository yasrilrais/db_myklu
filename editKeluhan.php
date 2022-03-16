<?php

require "connect.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $response = array();
    $keluhan = $_POST['keluhan'];
    $fakultas = $_POST['fakultas'];
    $penerima = $_POST['penerima'];
    $tipe = $_POST['tipe'];
    $tindakan = $_POST['tindakan'];
    $stat = $_POST['stat'];
    $feedback = $_POST['feedback'];
    $idKeluhan = $_POST['idKeluhan'];

   
        $insert = "UPDATE keluhan SET keluhan='$keluhan',
         fakultas='$fakultas', penerima='$penerima',
          tipe='$tipe', tindakan='$tindakan',
           stat='$stat', feedback='$feedback' WHERE id='$idKeluhan'";
        if (mysqli_query($con, $insert)) {
            $response['value']=1;
            $response['message']="Berhasil input data";
            echo json_encode($response);
        } else {
            $response['value']=0;
            $response['message']="Gagal input data";
            echo json_encode($response);
        }

}
