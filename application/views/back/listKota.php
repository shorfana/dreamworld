<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadscrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0"><?= $title ?></h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Olah Data</li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Zero configuration table -->
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <h4 class="card-title">List kota</h4> -->
                            <button class="btn btn-primary round waves-effect waves-light float-right" type="button" data-toggle="modal" data-target="#tambahDataKota"><i class="fa fa-plus"></i> Tambah Data Baru</button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade text-left" id="tambahDataKota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel1">Tambah Data Hotel</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- <form method="POST" action="#"> -->
                                    <div class="modal-body">
                                        <fieldset class="form-label-group form-group position-relative has-icon-right">
                                            <input type="text" class="form-control" id="namaKota" name="namaKota" placeholder="Nama Kota" autofocus>
                                            <div class="form-control-position">
                                                <i class="fa fa-building"></i>
                                            </div>
                                            <label for="namaKota">Nama Kota</label>
                                        </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnSimpanKota" class="btn btn-primary" onclick="simpanKota()">Simpan</button>
                                        <!-- data-dismiss="modal" -->
                                    </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <?php
                            foreach ($listKota as $lk) {
                            ?>
                                <!-- Modal Edit-->
                                <div class="modal fade text-left" id="editData-<?= $lk->id_kota; ?>" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel1">Ubah Data Hotel</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- <form method="POST" action="#"> -->
                                            <div class="modal-body">
                                                <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                    <input type="text" class="form-control editNamaKota" id="editNamaKota-<?= $lk->id_kota ?>" placeholder="Nama Kota" value="<?= $lk->nama_kota ?>" autofocus>
                                                    <div class="form-control-position">
                                                        <i class="fa fa-building"></i>
                                                    </div>
                                                    <label for="namaKota">Nama Kota</label>
                                                </fieldset>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="btnEditKota" class="btn btn-primary" onclick="ubahKota(<?= $lk->id_kota ?>)">Ubah</button>
                                                <!-- data-dismiss="modal" -->
                                            </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus-->
                                <div class="modal fade text-left" id="hapusData-<?= $lk->id_kota; ?>" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="myModalLabel1">Kota <?= $lk->nama_kota?></h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Yakin Akan Menghapus Data Ini?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="btnHapusKota" class="btn btn-primary" onclick="hapusKota(<?= $lk->id_kota ?>)">Hapus</button>
                                                <!-- data-dismiss="modal" -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration text-center" id="tabelKota">
                                        <thead>
                                            <tr>
                                                <th class="text-left">No</th>
                                                <th class="text-left">Nama Kota</th>
                                                <th class="text-left">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kota</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>