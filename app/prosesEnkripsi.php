<?php

include "helper.php";

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$plaintext = $request->data;

if ($plaintext) {
    $data = [
        'title' => enkripsi($plaintext),
        'type' => 'success',
        'text' => 'Enkripsi Berhasil'
    ];
} else {
    $data = [
        'title' => 'FAILED',
        'type' => 'warning',
        'text' => 'Tolong inputkan plaintext'
    ];
}

echo json_encode($data);
