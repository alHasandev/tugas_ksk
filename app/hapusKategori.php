<?php

include "connectdb.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$id = $request->ID;

$query = "DELETE FROM kategori WHERE id = '$id'";
$conn->query($query);
