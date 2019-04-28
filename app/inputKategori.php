<?php

include "connectdb.php";
include "helper.php";

$data = json_decode(file_get_contents("php://input"));

$nama = htmlspecialchars($conn->real_escape_string($data->NAMA));
$btnName = $conn->real_escape_string($data->btnName);

$pesan = [
    'type' => 'warning',
    'title' => 'KOSONG',
    'text' => 'Tidak ada data!'
];

if ($btnName == 'Simpan') {
    $nama = enkripsi($nama);

    // proses input data
    $query = "INSERT INTO kategori VALUES (NULL,'$nama')";

    $hasil = $conn->query($query);
    if ($hasil) {
        // success
        $pesan = [
            'type' => 'success',
            'title' => 'SIMPAN BERHASIL',
            'text' => 'Data Berhasil Disimpan!'
        ];
    } else {
        // failed
        $pesan = [
            'type' => 'error',
            'title' => 'SIMPAN GAGAL',
            'text' => $conn->error
        ];
    }
} else { // proses update data
    $id = $conn->real_escape_string($data->ID);
    $query = "UPDATE kategori SET nama = '$nama' WHERE id = '$id'";

    $hasil = $conn->query($query);

    if ($hasil) {
        // success
        $pesan = [
            'type' => 'success',
            'title' => 'EDIT BERHASIL',
            'text' => 'Data Berhasil Diedit!'
        ];
    } else {
        // failed
        $pesan = [
            'type' => 'error',
            'title' => 'EDIT GAGAL',
            'text' => $conn->error
        ];
    }
}

echo json_encode($pesan);
