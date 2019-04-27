<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "tugas_ksk");

$conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE) or
    die("Gagal Koneksi Database");
