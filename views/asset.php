<!-- Begin Page Content -->
<div class="container-fluid" ng-app="myApp" ng-controller="assetController">


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
            <a href="<?= base_url('barang') ?>" class="btn btn-dark tambahData">
                Tambah Barang
            </a>
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
            <table class=" table table-striped" ng-init="TampilDataAsset()">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jenis Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi Baik</th>
                    <th>Kondisi Sedang</th>
                    <th>Kondisi Rusak</th>
                    <th>Kekurangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="asset in data |filter:caridata">
                    <td>{{$index+1}}</td>
                    <td>{{asset.jenis_barang}}</td>
                    <td>{{asset.jumlah}}</td>
                    <td>{{asset.kondisi_baik}}</td>
                    <td>{{asset.kondisi_sedang}}</td>
                    <td>{{asset.kondisi_rusak}}</td>
                    <td>{{asset.kekurangan}}</td>
                    <td>
                        <a href="<?= base_url('barang') ?>?cari={{asset.jenis_barang}}" class="badge badge-primary">Detail</a>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->