<?php

include "connectdb.php";
include "helper.php";

$data = json_decode(file_get_contents("php://input"));

$nama_barang = $conn->real_escape_string($data->NAMA_BARANG);
$jenis_barang = $conn->real_escape_string($data->JENIS_BARANG);
$jumlah_unit = $conn->real_escape_string($data->JUMLAH_UNIT);
$kondisi = $conn->real_escape_string($data->KONDISI);
$harga_beli = $conn->real_escape_string($data->HARGA_BELI);
$keterangan = $conn->real_escape_string($data->KETERANGAN);
$btnName = $conn->real_escape_string($data->btnName);

if ($btnName == 'Simpan') {
    $nama_barang = enkripsi($nama_barang);
    $kondisi = enkripsi($kondisi);
    $keterangan = enkripsi($keterangan);
    // proses input data
    $query = "INSERT INTO daftar_barang VALUES (
                '',
                '$nama_barang', 
                '$jenis_barang', 
                '$jumlah_unit', 
                '$kondisi', 
                '$harga_beli', 
                '$keterangan')";
    $conn->query($query);
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
    $conn->query($query);
}
