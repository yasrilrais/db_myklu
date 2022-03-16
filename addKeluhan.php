<?php

require "connect.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $response = array();
    $keluhan = $_POST['keluhan'];
    // $fakultas = $_POST['fakultas'];
    // $penerima = $_POST['penerima'];
    $tipe = $_POST['tipe'];
    // $tindakan = $_POST['tindakan'];
    // $stat = $_POST['stat'];
    // $feedback = $_POST['feedback'];
    $idUsers = $_POST['idUsers'];

    $image = date('dmYHis').str_replace(" ","", basename($_FILES['image']['name']));
    $imagePath = "upload/".$image;
    move_uploaded_file($_FILES['image']['tmp_name'],$imagePath);
   
        $insert = "INSERT INTO keluhan VALUE(NULL,'$keluhan','$image','','','$tipe','','','',NOW(),'$idUsers')";
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

?>