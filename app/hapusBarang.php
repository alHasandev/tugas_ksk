<?php

include "connectdb.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$kode = $request->KODE;

$query = "DELETE FROM daftar_barang WHERE kode = '$kode'";
$conn->query($query);
