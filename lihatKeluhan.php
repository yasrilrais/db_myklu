<?php

require "connect.php";

$idUsers = $_GET['idUsers'];
$response = array();

// $sql = mysqli_query($con, "SELECT a.*, b.nama FROM keluhan a left join users b on a.idUsers = b.id");
$sql = mysqli_query($con, "SELECT * FROM keluhan WHERE idUsers='$idUsers'");

while ($a = mysqli_fetch_array($sql)) {
    $b['id'] = $a['id'];
    $b['keluhan'] = $a['keluhan'];
    $b['fakultas'] = $a['fakultas'];
    $b['penerima'] = $a['penerima'];
    $b['tipe'] = $a['tipe'];
    $b['tindakan'] = $a['tindakan'];
    $b['stat'] = $a['stat'];
    $b['feedback'] = $a['feedback'];
    $b['createDate'] = $a['createDate'];
    $b['idUsers'] = $a['idUsers'];

    array_push($response, $b);
}

echo json_encode($response);
?>