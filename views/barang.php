<!-- Begin Page Content -->
<div class="container-fluid" ng-app="myApp" ng-controller="barangController">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{title}}</h1>
    </div>

    <!-- devider -->
    <div class="row my-3">
        <div class="col-lg-6">
            <hr>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data
            </button>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="input-group mb-3">
                <input type="text" name="keyword" id="keyword" class="form-control" ng-model="caridata" placeholder="cari asset.." autocomplete="off">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg table-responsive"">
            <table class=" table table-striped" ng-init="TampilDataBarang()">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Jumlah Unit</th>
                    <th>Kondisi</th>
                    <th>Harga Beli</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="barang in data | filter:{jenis_barang:carijenis} | filter: caridata">
                    <td>{{$index+1}}</td>
                    <td>{{barang.nama_barang}}</td>
                    <td>{{barang.jenis_barang}}</td>
                    <td>{{barang.jumlah_unit}}</td>
                    <td>{{barang.kondisi}}</td>
                    <td>{{barang.harga_beli}}</td>
                    <td>{{barang.keterangan}}</td>
                    <td>
                        <a href="#" class="badge badge-success" ng-click="editBarang(barang.kode, barang.nama_barang, barang.id_jenis, barang.jumlah_unit, barang.kondisi, barang.harga_beli, barang.keterangan);" data-toggle="modal" data-target="#formModal">Edit</a>
                        <a href="#" class="badge badge-danger" ng-click="deleteBarang(barang.kode, barang.nama_barang)" data-toggle="modal">Hapus</a>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">{{modalTitle}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="resetBarang()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="kode" ng-model="kode">
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" ng-model="nama_barang">
                        </div>
                        <div class="form-group" ng-init="TampilJenisBarang()">
                            <label for="jenis_barang">Jenis Barang</label>
                            <!-- <input type="text" class="form-control" name="jenis_barang" ng-model="jenis_barang"> -->
                            <select class="form-control" ng-model="jenis_barang" ng-options="list.nama for list in kategori track by list.id">
                                <!-- <option ng-repeat="list in kategori" value="{{list.id}}">{{list.nama}}</option> -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_unit">Jumlah Unit</label>
                            <input type="text" class="form-control" name="jumlah_unit" ng-model="jumlah_unit">
                        </div>
                        <div class="form-group">
                            <label for="kondisi">Kondisi</label>
                            <input type="text" class="form-control" name="kondisi" ng-model="kondisi">
                        </div>
                        <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            <input type="text" class="form-control" name="harga_beli" ng-model="harga_beli">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" ng-model="keterangan">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" ng-click="resetBarang()" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" ng-click="insertBarang()" data-dismiss="modal">{{btnName}}</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->