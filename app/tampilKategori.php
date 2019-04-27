<?php

include "connectdb.php";
include "helper.php";

$query = "SELECT * FROM kategori";

$rs = $conn->query($query);

$data = NULL;

while ($row = $rs->fetch_assoc()) {
    $data[] = $row;
}

// $data = dekripsi($data);

if ($data) {
    print json_encode($data);
}
