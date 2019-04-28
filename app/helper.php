<?php

define('BASEURL', 'http://localhost/tugas_ksk/');

function base_url($param = null)
{
    if ($param == null) {
        return BASEURL;
    } else {
        return BASEURL . $param;
    }
}

// enkripsi plain text menjadi encrypted text
function enkripsi($plaintext)
{
    $arraytext = str_split($plaintext);

    // var_dump($arraytext);
    // $asciival = [];
    foreach ($arraytext as $index => $char) {
        $asciival[] = ord($char);
        $encryptext[] = chr($asciival[$index] + 3);
    }

    $encryptext = implode('', $encryptext);

    return $encryptext;
}

// dekripsi encrypted text menjadi plain text
function dekripsi($encryptext)
{
    $arraytext = str_split($encryptext);

    // var_dump($arraytext);
    // $asciival = [];
    foreach ($arraytext as $index => $char) {
        $asciival[] = ord($char);
        $plaintext[] = chr($asciival[$index] - 3);
    }

    $plaintext = implode('', $plaintext);

    return $plaintext;
}

function deskripsiAll($getArray)
{
    $setArray = [];
    foreach ($getArray as $key => $value) {
        $plaintext = $value['nama'];

        $arraytext = str_split($plaintext);

        foreach ($arraytext as $index => $text) {
            $arraytext[$index] = chr(ord($text) - 3);
        }

        $enkriptext = implode('', $arraytext);

        $setArray[$key]['id'] = $value['id'];
        $setArray[$key]['nama'] = $enkriptext;
    }

    return $setArray;
}
