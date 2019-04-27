<?php

include "connectdb.php";
include "helper.php";

$data = json_decode(file_get_contents("php://input"));

$nama = $conn->real_escape_string($data->NAMA);
$btnName = $conn->real_escape_string($data->btnName);
$pesan = "kosong";

if ($btnName == 'Simpan') {
    $nama = enkripsi($nama);

    // proses input data
    $query = "INSERT INTO kategori VALUES ('','$nama')";

    $hasil = $conn->query($query);
    if ($hasil) {
        // success
        $pesan = "Berhasil Menyimpan data";
    } else {
        // failed
        $pesan = "Gagal Menyimpan data";
    }
} else { // proses update data
    $id = $conn->real_escape_string($data->ID);
    $query = "UPDATE kategori SET nama = '$nama' WHERE id = '$id'";

    $hasil = $conn->query($query);
    if ($hasil) {
        // success
        $pesan = "Berhasil Update Data";
    } else {
        // failed
        $pesan = "Gagal Update Data";
    }
}

echo $pesan;
