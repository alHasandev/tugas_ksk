<?php

include "connectdb.php";

$query = "SELECT * FROM view_inventaris";

$rs = $conn->query($query);

$data = NULL;

while ($row = $rs->fetch_assoc()) {
    $data[] = $row;
}

if ($data) {
    print json_encode($data);
}
