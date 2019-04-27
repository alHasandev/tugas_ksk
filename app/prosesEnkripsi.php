<?php

include "helper.php";

if (isset($_POST)) {
    $post = $_POST;

    $encryptext = $post['plaintext'];

    echo dekripsi($encryptext);
}
