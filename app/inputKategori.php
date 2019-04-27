<?php

include "connectdb.php";
include "helper.php";

$data = json_decode(file_get_contents("php://input"));

$id = $conn->real_escape_string($data->ID);
$nama = $conn->real_escape_string($data->NAMA);
$btnName = $conn->real_escape_string($data->btnName);

if ($btnName == 'Simpan') {
    $nama = enkripsi($nama);
    // proses input data
    $query = "INSERT INTO kategori VALUES ('','$nama')";
    $conn->query($query);
} else { // proses update data
    $query = "UPDATE kategori SET nama= '$nama' WHERE id = '$id'";
    $conn->query($query);
}
