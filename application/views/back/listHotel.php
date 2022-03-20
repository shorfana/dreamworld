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
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- <h4 class="card-title">List kota</h4> -->
                                <button class="btn btn-primary round waves-effect waves-light float-right" type="button" data-toggle="modal" data-target="#modalTambahHotel"><i class="fa fa-plus"></i> Tambah Data Baru</button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade text-left" id="modalTambahHotel" tabindex="-1" role="dialog" aria-labelledby="headerTambahHotel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="headerTambahHotel">Tambah Data Hotel</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- <form method="POST" action="#"> -->

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                        <input type="text" class="form-control" id="namaHotel" placeholder="Nama Hotel" autofocus>
                                                        <div class="form-control-position">
                                                            <i class="fa fa-bed"></i>
                                                        </div>
                                                        <label for="namaHotel">Nama Hotel</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-4">
                                                    <fieldset class="form-label-group form-group position-relative">
                                                        <select id="listKotaTambah" name="listKotaTambah" class="form-control select2 listKota" required>
                                                            <option value="-">Pilih Kota</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                        <input type="number" step="any" class="form-control" id="hargaQuad" placeholder="Quad">
                                                        <div class="form-control-position">
                                                            <i class="fa fa-money"></i>
                                                        </div>
                                                        <label for="hargaQuad">Harga Quad</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-4">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                        <input type="number" step="any" class="form-control" id="hargaTriple" placeholder="triple">
                                                        <div class="form-control-position">
                                                            <i class="fa fa-money"></i>
                                                        </div>
                                                        <label for="hargatriple">Harga triple</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-4">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                        <input type="number" step="any" class="form-control" id="hargaDouble" placeholder="Double">
                                                        <div class="form-control-position">
                                                            <i class="fa fa-money"></i>
                                                        </div>
                                                        <label for="hargaDouble">Harga Double</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row pt-1">
                                                <div class="col-md-12">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                        <input class="form-control" type="file" name="gambarHotel" id="gambarHotel" placeholder="Upload Gambar">
                                                        <div class="form-control-position">
                                                            <i class="fa fa-picture-o"></i>
                                                        </div>
                                                        <label for="gambarHotel">Upload Gambar Hotel</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnSimpanHotel" class="btn btn-primary" onclick="simpanHotel()">Simpan</button>
                                            <!-- data-dismiss="modal" -->
                                        </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>

                            <div class="card-content">
                                <!-- Modal Edit-->
                                <div class="modal fade text-left" id="modalEditHotel" role="dialog" aria-labelledby="headerEditHotel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="headerEditHotel">Ubah Data Hotel</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- <form method="POST" action="#"> -->
                                            <div class="modal-body">
                                                <div class="row" style="display: none;">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                            <input type="text" class="form-control" id="editIdHotel" placeholder="Id Hotel">
                                                            <div class="form-control-position">
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <label for="editIdHotel">Id Hotel</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                            <input type="text" class="form-control" id="editNamaHotel" placeholder="Nama Hotel" autofocus>
                                                            <div class="form-control-position">
                                                                <i class="fa fa-bed"></i>
                                                            </div>
                                                            <label for="editNamaHotel">Nama Hotel</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <fieldset class="form-label-group form-group position-relative">
                                                            <select id="listKotaEdit" name="listKotaEdit" class="form-control select2 listKota" required>
                                                                <option value="-">Pilih Kota</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                            <input type="number" step="any" class="form-control" id="editHargaQuad" placeholder="Quad">
                                                            <div class="form-control-position">
                                                                <i class="fa fa-money"></i>
                                                            </div>
                                                            <label for="editHargaQuad">Harga Quad</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                            <input type="number" step="any" class="form-control" id="editHargaTriple" placeholder="triple">
                                                            <div class="form-control-position">
                                                                <i class="fa fa-money"></i>
                                                            </div>
                                                            <label for="editHargatriple">Harga triple</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                            <input type="number" step="any" class="form-control" id="editHargaDouble" placeholder="Double">
                                                            <div class="form-control-position">
                                                                <i class="fa fa-money"></i>
                                                            </div>
                                                            <label for="editHargaDouble">Harga Double</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row pt-1">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-label-group form-group position-relative has-icon-right">
                                                            <input class="form-control" type="file" name="editGambarHotel" id="editGambarHotel" placeholder="Upload Gambar">
                                                            <div class="form-control-position">
                                                                <i class="fa fa-picture-o"></i>
                                                            </div>
                                                            <label for="editGambarHotel">Upload Gambar Hotel</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="btnEditHotel" class="btn btn-primary">Ubah</button>
                                                <!-- data-dismiss="modal" -->
                                            </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- ! Modal Edit-->
                                <!-- Modal Hapus-->
                                <div class="modal fade text-left" id="modalHapusHotel" role="dialog" aria-labelledby="headerHapusHotel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 id="modal-title" id="headerHapusHotel">Hapus Hotel</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" class="form-control hidden" id="hapusIdHotel">
                                                <input type="text" class="form-control hidden" id="hapusNamaHotel">
                                                <h4 id="bodyHapusHotel"></h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="btnHapusHotel" class="btn btn-primary">Hapus</button>
                                                <!-- data-dismiss="modal" -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ! Modal Hapus-->

                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <table class="table zero-configuration dataTable" role="grid" id="tabelHotel">
                                                <thead>
                                                    <tr>
                                                        <th id="idHotel">Id Hotel</th>
                                                        <th>Nama Hotel</th>
                                                        <th>Kota</th>
                                                        <th>Harga Quad</th>
                                                        <th>Harga Triple</th>
                                                        <th>Harga Double</th>
                                                        <th>Gambar Hotel</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Id Hotel</th>
                                                        <th>Nama Hotel</th>
                                                        <th>Kota</th>
                                                        <th>Harga Quad</th>
                                                        <th>Harga Triple</th>
                                                        <th>Harga Double</th>
                                                        <th>Gambar Hotel</th>
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
                </div>
            </section>
        </div>
    </div>
</div>