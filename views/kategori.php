<!-- Begin Page Content -->
<div class="container-fluid" ng-app="myApp" ng-controller="kategoriController">


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
                <input type="text" name="keyword" id="keyword" class="form-control" ng-model="caridata" placeholder="cari kategori.." autocomplete="off">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 table-responsive"">
            <table class="table table-striped" ng-init="TampilData()">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kategori</th>
						<th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="kategori in data |filter:caridata">
                        <td>{{$index+1}}</td>
                        <td>{{kategori.nama}}</td>
                        <td>
                            <a href="#" class="badge badge-success" ng-click="editKategori(kategori.id, kategori.nama);" data-toggle="modal" data-target="#formModal">Edit</a>
                            <a href="#" class="badge badge-danger" ng-click="deleteKategori(kategori.id, kategori.nama)" data-toggle="modal">Hapus</a>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="resetKategori()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id" ng-model="id">
                        </div>
                        <div class="form-group">
                            <label for="jenis_barang">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama" ng-model="nama">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" ng-click="resetKategori()" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" ng-click="insertKategori()" data-dismiss="modal">{{btnName}}</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->