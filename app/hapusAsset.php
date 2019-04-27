<?php

include "connectdb.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$kode = $request->KODE_BARANG;

$query = "DELETE FROM inventaris_kantor WHERE kode_barang = '$kode'";
$conn->query($query);
