<?php

include "connectdb.php";
include "helper.php";

$data = json_decode(file_get_contents("php://input"));

$nama_barang = htmlspecialchars($conn->real_escape_string($data->NAMA_BARANG));
$jenis_barang = htmlspecialchars($conn->real_escape_string($data->JENIS_BARANG));
$jumlah_unit = htmlspecialchars($conn->real_escape_string($data->JUMLAH_UNIT));
$kondisi = htmlspecialchars($conn->real_escape_string($data->KONDISI));
$harga_beli = htmlspecialchars($conn->real_escape_string($data->HARGA_BELI));
$keterangan = htmlspecialchars($conn->real_escape_string($data->KETERANGAN));
$btnName = $conn->real_escape_string($data->btnName);

// enkripsi properti
$nama_barang = enkripsi($nama_barang);
$kondisi = enkripsi($kondisi);
$keterangan = enkripsi($keterangan);

// set pesan jika tidak ada data yang diinput / kosong
$pesan = [
    'type' => 'warning',
    'title' => 'KOSONG',
    'text' => 'Tidak ada data!'
];

if ($btnName == 'Simpan') {

    // proses input data
    $query = "INSERT INTO daftar_barang VALUES (
                NULL,
                '$nama_barang', 
                '$jenis_barang', 
                '$jumlah_unit', 
                '$kondisi', 
                '$harga_beli', 
                '$keterangan')";
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

    $kode = $conn->real_escape_string($data->KODE);

    $query = "UPDATE daftar_barang 
                SET 
                    nama_barang = '$nama_barang', 
                    jenis_barang = '$jenis_barang', 
                    jumlah_unit = '$jumlah_unit', 
                    kondisi = '$kondisi', 
                    harga_beli = '$harga_beli', 
                    keterangan = '$keterangan' 
                WHERE kode = '$kode'";

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
