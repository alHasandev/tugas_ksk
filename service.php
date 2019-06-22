<?php

function connectDB()
{
	return mysqli_connect("localhost", "root", "", "tugas_ksk");
}

function getTb()
{
	// membuat query ke database: menampilkan semua record dari table daftar_barang
	$result = mysqli_query(connectDB(), "SELECT * FROM daftar_barang");

	$index = 0;

	$tblist = [];

	while ($data = mysqli_fetch_array($result)) {
		$tblist[$index] = array(
			"kode" => $data['kode'],
			"nama_barang" => $data['nama_barang'],
			"jenis_barang" => $data['jenis_barang'],
			"jumlah_unit" => $data['jumlah_unit'],
			"kondisi" => $data['kondisi'],
			"harga_beli" => $data['harga_beli'],
			"keterangan" => $data['keterangan']

		);

		$index++;
	}

	// menutup koneksi database
	mysqli_close(connectDB());

	return $tblist;
}

function getTest()
{
	return "Test Berhasil !";
}

function insertTb($kode, $nama_barang, $jenis_barang, $jumlah_unit, $kondisi, $harga_beli, $keterangan)
{
	mysqli_query(connectDB(), "INSERT INTO daftar_barang (kode, nama_barang, jenis_barang, jumlah_unit, kondisi, harga_beli, keterangan) VALUES 
		('" . $kode . "','" . $nama_barang . "','" . $jenis_barang . "','" . $jumlah_unit . "','" . $kondisi . "','" . $harga_beli . "','" . $keterangan . "')");

	return "Succeed";
}

function updateTb($kode, $nama_barang, $jenis_barang, $jumlah_unit, $kondisi, $harga_beli, $keterangan)
{
	mysqli_query(connectDB(), "UPDATE daftar_barang SET nama_barang='" . $nama_barang . "',jenis_barang='" . $jenis_barang . "',jumlah_unit='" . $jumlah_unit . "',kondisi,='" . $kondisi . "',harga_beli='" . $harga_beli . "',keterangan='" . $keterangan . "' WHERE kode='" . $kode . "'");

	return "Succeed";
}

function deleteTb($kode)
{
	mysqli_query(connectDB(), "DELETE FROM daftar_barang WHERE kode = '" . $kode . "'");

	return "Succeed";
}


require("lib_soap/nusoap.php");

$server = new soap_server();

$server->configureWSDL("Web Service Mohamad Albie", "urn:WebServ");


$server->wsdl->addcomplextype(
	"outputarray",
	"complextype",
	"struct",
	"all",
	"",
	array(

		"kode" => array("name" => "kode", "type" => "xsd:string"),
		"nama_barang" => array("name" => "nama_barang", "type" => "xsd:string"),
		"jenis_barang" => array("name" => "jenis_barang", "type" => "xsd:string"),
		"jumlah_unit" => array("name" => "jumlah_unit", "type" => "xsd:string"),
		"kondisi" => array("name" => "kondisi", "type" => "xsd:string"),
		"harga_beli" => array("name" => "harga_beli", "type" => "xsd:string"),
		"keterangan" => array("name" => "keterangan", "type" => "xsd:string")
	)
);

$server->wsdl->addcomplextype(

	"outarray",
	"complextype",
	"array",
	"",
	"SOAP-ENC:Array",
	array(),
	array(
		array(
			"ref" => "SOAP-ENC:arrayType",

			"wsdl:arrayType" => "tns:outputarray[]"
		)
	),
	"tns:outputarray"
);

$server->register(
	"getTest",
	array(),
	array(
		"return" => "tns:outarray",
		"urn:WebServ",
		"urn:WebServ#getTest",
		"rpc",
		"encoded",
		""
	)
);

$server->register(
	"getTb",
	array(),
	array("return" => "tns:outarray"),
	"urn:WebServ",
	"urn:WebServ#getTb",
	"rpc",
	"encoded",
	""
);

$server->register(
	"insertTb",
	array(
		"kode" => "xsd:string",
		"nama_barang" => "xsd:string",
		"jenis_barang" => "xsd:string",
		"jumlah_unit" => "xsd:string",
		"kondisi" => "xsd:string",
		"harga_barang" => "xsd:string",
		"keterangan" => "xsd:string"
	),
	array("return" => "tns:outarray"),
	"urn:WebServ",
	"urn:WebServ#insertTb",
	"rpc",
	"encoded",
	""
);

$server->register(
	"updateTb",
	array(
		"kode" => "xsd:string",
		"nama_barang" => "xsd:string",
		"jenis_barang" => "xsd:string",
		"jumlah_unit" => "xsd:string",
		"kondisi" => "xsd:string",
		"harga_barang" => "xsd:string",
		"keterangan" => "xsd:string"
	),
	array("return" => "tns:outarray"),
	"urn:WebServ",
	"urn:WebServ#updateTb",
	"rpc",
	"encoded",
	""
);


$server->register(
	"deleteTb",
	array("kode" => "xsd:string"),
	array("return" => "tns:outarray"),
	"urn:WebServ",
	"urn:WebServ#deleteTb",
	"rpc",
	"encoded",
	""
);


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : "";

// $server->service($HTTP_RAW_POST_DATA);

@$server->service(file_get_contents("php://input"));

// test environment
// print_r(getTest());
