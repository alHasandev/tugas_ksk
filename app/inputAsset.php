<?php

include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));

$kode_barang = $conn->real_escape_string($data->KODE_BARANG);
$jenis_barang = $conn->real_escape_string($data->JENIS_BARANG);
$jumlah = $conn->real_escape_string($data->JUMLAH);
$kondisi_baik = $conn->real_escape_string($data->KONDISI_BAIK);
$kondisi_sedang = $conn->real_escape_string($data->KONDISI_SEDANG);
$kondisi_rusak = $conn->real_escape_string($data->KONDISI_RUSAK);
$kekurangan = $conn->real_escape_string($data->KEKURANGAN);
$btnName = $conn->real_escape_string($data->btnName);

if ($btnName == 'Simpan') {
    // proses input data
    $query = "INSERT INTO inventaris_kantor VALUES ('','$jenis_barang', '$jumlah', '$kondisi_baik', '$kondisi_sedang', '$kondisi_rusak', '$kekurangan')";
    $conn->query($query);
} else { // proses update data
    $query = "UPDATE inventaris_kantor SET jenis_barang = '$jenis_barang', jumlah = '$jumlah',
     kondisi_baik = '$kondisi_baik', kondisi_sedang = '$kondisi_sedang', kondisi_rusak = '$kondisi_rusak', kekurangan = '$kekurangan' WHERE kode_barang = '$kode_barang'";
    $conn->query($query);
}
