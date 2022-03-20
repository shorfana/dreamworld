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
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- <h4 class="card-title">List kota</h4> -->
                                <button id="tes" class="btn btn-primary round waves-effect waves-light float-right" type="button" data-toggle="modal" data-target="#tambahDataPelayanan"><i class="fa fa-plus"></i> Tambah Data Baru</button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade text-left" id="tambahDataPelayanan" tabindex="-1" role="dialog" aria-labelledby="headerTambahPelayanan" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="headerTambahPelayanan">Tambah Data Pelayanan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- <form method="POST" action="#"> -->
                                        <div class="modal-body">
                                            <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                <input type="text" class="form-control" id="jenisPelayanan" placeholder="Jenis Pelayanan" autofocus>
                                                <div class="form-control-position">
                                                    <i class="fa fa-handshake-o"></i>
                                                </div>
                                                <label for="jenisPelayanan">Jenis Pelayanan</label>
                                            </fieldset>

                                            <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                <input type="number" step="any" class="form-control" id="hargaPelayanan" placeholder="Harga Pelayanan">
                                                <div class="form-control-position">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                                <label for="hargaPelayanan">Harga Pelayanan</label>
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnSimpanPelayanan" class="btn btn-primary" onclick="simpanPelayanan()">Simpan</button>
                                            <!-- data-dismiss="modal" -->
                                        </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">

                                <!-- Modal Edit-->
                                <div class="modal fade text-left" id="modalEditPelayanan" role="dialog" aria-labelledby="headerEditPelayanan" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="headerEditPelayanan">Ubah Data Pelayanan</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                    <input type="text" class="form-control" placeholder="Jenis Pelayanan" id="editJenisPelayanan" autofocus>
                                                    <div class="form-control-position">
                                                        <i class="fa fa-handshake-o"></i>
                                                    </div>
                                                    <label for="editJenisPelayanan">Jenis Pelayanan</label>
                                                </fieldset>
                                                <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                    <input type="number" step="any" class="form-control" placeholder="Harga Pelayanan" id="editHargaPelayanan">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                    <label for="editHargaPelayanan">Harga Pelayanan</label>
                                                </fieldset>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="btnEditPelayanan" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ! Modal Edit-->
                                <!-- Modal Hapus-->
                                <div class="modal fade text-left" id="modalHapusPelayanan" role="dialog" aria-labelledby="headerHapusPelayanan" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="headerHapusPelayanan">Hapus Data Pelayanan</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input class="form-control hidden" type="text" name="hapusIdPelayanan" id="hapusIdPelayanan">
                                                <h4 id="bodyHapusPelayanan"></h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="btnHapusPelayanan" class="btn btn-primary">Hapus</button>
                                                <!-- data-dismiss="modal" -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ! Modal Hapus-->

                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration " id="tabelPelayanan">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis Pelayanan</th>
                                                    <th>Harga Pelayanan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis Pelayanan</th>
                                                    <th>Harga Pelayanan</th>
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
</div>