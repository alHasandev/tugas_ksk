<?php

include "connectdb.php";
include "helper.php";

$query = "SELECT 
            daftar_barang.kode, 
            daftar_barang.nama_barang,
            daftar_barang.jenis_barang AS id_jenis, 
            kategori.nama AS jenis_barang, 
            daftar_barang.jumlah_unit, 
            daftar_barang.kondisi, 
            daftar_barang.harga_beli, 
            daftar_barang.keterangan 
            FROM daftar_barang INNER JOIN kategori 
            ON daftar_barang.jenis_barang = kategori.id";

$rs = $conn->query($query);

$data = NULL;

while ($row = $rs->fetch_assoc()) {
    $data[] = $row;
}

// $data = dekripsi($data);

if ($data) {
    print json_encode($data);
}
