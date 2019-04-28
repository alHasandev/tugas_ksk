var app = angular.module('myApp', []);
var base_url = "http://localhost/tugas_ksk/";

var getUrl = window.location.href;
var url = new URL(getUrl);
var getCari = url.searchParams.get("cari");


app.controller('assetController', function ($scope, $http) {
    $scope.title = "DATA KESELURUHAN ASSET KANTOR";

    // proses untuk menampilkan data dari file tampilObat.php
    $scope.TampilDataAsset = function () {
        $http.get(base_url + "app/tampilAsset.php").then(function (response) {
            $scope.data = response.data;
        });

        $scope.no = 1;
    }

});

app.controller('barangController', function ($scope, $http, $location) {
    // $scope.test = $location.search('search');

    if (getCari) {
        $scope.carijenis = getCari;
    } else {
        console.log("tidak ada param");
    }

    $scope.title = "DETAIL ASSET";

    $scope.modalTitle = "Tambah Detail Barang";
    $scope.btnName = "Simpan";

    $scope.resetBarang = function () {
        $scope.kode = "";
        $scope.nama_barang = "";
        $scope.jenis_barang = "";
        $scope.jumlah_unit = "";
        $scope.kondisi = "";
        $scope.harga_beli = "";
        $scope.keterangan = "";
        $scope.btnName = "Simpan";
        $scope.modalTitle = "Tambah Detail Barang";
        $scope.msg = null;
    }

    $scope.insertBarang = function () {
        $http.post(base_url + "app/inputBarang.php", {
            'KODE': $scope.kode,
            'NAMA_BARANG': $scope.nama_barang,
            'JENIS_BARANG': $scope.jenis_barang.id,
            'JUMLAH_UNIT': $scope.jumlah_unit,
            'KONDISI': $scope.kondisi,
            'HARGA_BELI': $scope.harga_beli,
            'KETERANGAN': $scope.keterangan,
            'btnName': $scope.btnName
        }).then(function (response) {
            let hasil = response.data;
            $scope.TampilDataBarang();
            $scope.resetBarang();
            swal({
                type: hasil.type,
                title: hasil.title,
                text: hasil.text
            });
        });
    }

    // proses untuk menampilkan data dari file tampilBarang.php
    $scope.TampilDataBarang = function () {
        $http.get(base_url + "app/tampilBarang.php").then(function (response) {
            $scope.data = response.data;
        });

        $scope.no = 1;
    }

    // proses untuk menampilkan data dari file tampilBarang.php
    $scope.TampilJenisBarang = function () {
        // $scope.jenis_barang = id_jenis;

        $http.get(base_url + "app/tampilJenisBarang.php").then(function (response) {
            $scope.kategori = response.data;
        });

    }

    // proses untuk delete data dari file hapus.php
    $scope.deleteBarang = function (kode, nama) {

        swal({
            title: "Apakah Kamu Yakin?",
            text: "Data Barang : " + nama + " akan dihapus secara permanen!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batal'
        }).then(function (result) {
            if (result.value) {
                $http.post(base_url + "app/hapusBarang.php", {
                    'KODE': kode
                }).then(function () {
                    $scope.msg = "Data Berhasil Dihapus";
                    $scope.TampilDataBarang();
                    swal(
                        'Terhapus!',
                        'Data telah berhasil dihapus.',
                        'success'
                    );
                })
            } else if (result.dismiss == 'cancel') {
                swal(
                    'Data batal dihapus!'
                )
            }

        });
    }

    // proses menampilkan data saat di update
    $scope.editBarang = function (KODE, NAMA_BARANG, ID_JENIS, JUMLAH_UNIT,
        KONDISI, HARGA_BELI, KETERANGAN) {
        $scope.modalTitle = "Edit Detail Barang";
        $scope.btnName = "Update";
        $scope.kode = KODE;
        $scope.nama_barang = NAMA_BARANG;
        $scope.jenis_barang = {
            id: ID_JENIS
        };
        $scope.jumlah_unit = JUMLAH_UNIT;
        $scope.kondisi = KONDISI;
        $scope.harga_beli = HARGA_BELI;
        $scope.keterangan = KETERANGAN;
    }
});

app.controller('kategoriController', function ($scope, $http) {
    $scope.title = "DATA KATEGORI";

    $scope.modalTitle = "Tambah Kategori";
    $scope.btnName = "Simpan";

    // proses untuk menampilkan data dari file tampilBarang.php
    $scope.TampilData = function () {
        $http.get(base_url + "app/tampilKategori.php").then(function (response) {
            $scope.data = response.data;
        });

        $scope.no = 1;
    }

    $scope.resetKategori = function () {
        $scope.id = "";
        $scope.nama = "";
        $scope.btnName = "Simpan";
        $scope.modalTitle = "Tambah Kategori";
    }

    $scope.insertKategori = function () {
        $http.post(base_url + "app/inputKategori.php", {
            'ID': $scope.id,
            'NAMA': $scope.nama,
            'btnName': $scope.btnName
        }).then(function (response) {
            let hasil = response.data;
            $scope.TampilData();
            $scope.resetKategori();
            swal({
                type: hasil.type,
                title: hasil.title,
                text: hasil.text
            });
        });
    }

    // proses untuk delete data dari file hapus.php
    $scope.deleteKategori = function (id, nama) {

        swal({
            title: "Apakah Kamu Yakin?",
            text: "Data Barang : " + nama + " akan dihapus secara permanen!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batal'
        }).then(function (result) {
            if (result.value) {
                $http.post(base_url + "app/hapusKategori.php", {
                    'ID': id
                }).then(function () {
                    $scope.msg = "Data Berhasil Dihapus";
                    $scope.TampilData();
                    swal(
                        'Terhapus!',
                        'Data telah berhasil dihapus.',
                        'success'
                    );
                })
            } else if (result.dismiss == 'cancel') {
                swal(
                    'Data batal dihapus!'
                )
            }

        });
    }

    // proses menampilkan data saat di update
    $scope.editKategori = function (ID, NAMA) {
        $scope.modalTitle = "Edit Kategori";
        $scope.btnName = "Update";
        $scope.id = ID;
        $scope.nama = NAMA;
    }

});

// angular controller for test enkripsi
app.controller('testEnkripsi', function ($scope, $http) {
    $scope.title = "TEST FUNGSI ENKRIPSI"

    // fungsi untuk menampilkan hasil enkripsi berdasarkna plaintext
    $scope.tampilEnkripsi = function (plaintext) {
        $http.post(base_url + 'app/prosesEnkripsi.php', {
            'data': plaintext
        }).then(function (response) {
            $scope.data = response.data;
            swal({
                title: $scope.data.title,
                type: $scope.data.type,
                text: $scope.data.text
            });
        })
    }
})