<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadscrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0"><?= $title ?></h2>
                        <!-- <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Olah Data</li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <secton id="content-types">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-content">
                                <button type="button" id="btnTest">test</button>
                                <div class="card-body">
                                    <div class="card-title">Masukkan Data</div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <fieldset class="form-group">
                                                <label for="selectHotel">Pilih Hotel</label>
                                                <select id="selectHotel" class="select2 form-control" multiple="multiple">
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9 col-sm-12">
                                            <fieldset class="form-group">
                                                <label for="selectPelayanan">Pilih Pelayanan</label>
                                                <select id="selectPelayanan" class="select2 form-control" multiple="multiple">
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <fieldset class="form-group">
                                                <div class="vs-checkbox-con vs-checkbox-primary pt-2">
                                                    <input type="checkbox" id="checkAll" autocomplete="off">
                                                    <span class="vs-checkbox vs-checkbox-lg">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon fa fa-check"></i>
                                                        </span>
                                                    </span>
                                                    <span>Pilih Semua</span>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <fieldset class="form-counter">
                                                <label for="qty">Kuantitas</label>
                                                <input type="number" id="qty" class="form-control">
                                            </fieldset>
                                        </div>
                                        <div class="col">
                                            <fieldset class="form-counter">
                                                <label for="night">Malam</label>
                                                <input type="number" id="night" class="form-control">
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <span class="float-right">
                                    <button id="btnHitung" class="btn btn-primary">Hitung</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-title">Rincian Harga</div>
                                    <style>
                                        .noBorder {
                                            border: 0px !important;
                                            padding-top: 1px;
                                        }
                                    </style>
                                    <hr>
                                    <div id="divHotel">
                                        <!-- <ul class="list-group">
                                            <li class="list-group-item list-group-item-info d-flex justify-content-between align-items-center">
                                                <div class="col-9">
                                                    <span class="font-weight-bold">ANWAR MADINAH MOVENPICK</span>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <small>MADINAH</small>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center text-center">
                                                <div class="col-4">
                                                    <span> Quad : <b>580</b> </span>
                                                </div>
                                                <div class="col-4">
                                                    <span> Triple : <b>580</b> </span>
                                                </div>
                                                <div class="col-4">
                                                    <span> Double : <b>580</b> </span>
                                                </div>
                                            </li>
                                        </ul>
                                        <br>
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
                                                <div class="col-9">
                                                    <span class="font-weight-bold">CONRAD MAKKAH</span>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <small>MEKAH</small>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center text-center">
                                                <div class="col-4">
                                                    <span> Quad : <b>630</b></span>
                                                </div>
                                                <div class="col-4">
                                                    <span> Triple : <b>800</b></span>
                                                </div>
                                                <div class="col-4">
                                                    <span> Double : <b>990</b></span>
                                                </div>
                                            </li>
                                        </ul>
                                        <br> -->
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center text-center">
                                                <div class="col">
                                                    <span class="font-weight-bold">BUS</span>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center text-center">
                                                <div class="col-4">
                                                    <span> Quad : <b id="busQuad"></b> </span>
                                                </div>
                                                <div class="col-4">
                                                    <span> Triple : <b id="busTriple"></b> </span>
                                                </div>
                                                <div class="col-4">
                                                    <span> Double : <b id="busDouble"></b> </span>
                                                </div>
                                            </li>
                                        </ul>
                                        <br>
                                    </div>
                                    <ul class="list-group list-group-flush" id="listPelayanan">
                                        <!-- <li class="list-group-item noBorder">
                                            <span class="float-right"><b>{harga}</b></span>
                                            Handling
                                        </li>
                                        <li class="list-group-item noBorder">
                                            <span class="float-right"><b>{harga}</b></span>
                                            Bus
                                        </li>
                                        <li class="list-group-item noBorder">
                                            <span class="float-right"><b>{harga}</b></span>
                                            Visa
                                        </li>
                                        <li class="list-group-item noBorder">
                                            <span class="float-right"><b>{harga}</b></span>
                                            PCR
                                        </li>
                                        <li class="list-group-item noBorder">
                                            <span class="float-right"><b>{harga}</b></span>
                                            Profit & Operasional
                                        </li> -->
                                    </ul>
                                    <hr>
                                    <ul class="list-group">
                                        <li class="list-group-item active d-flex justify-content-between align-items-center text-center">
                                            <div class="col-12">
                                                <span class="float-center font-weight-bold">TOTAL HARGA PAKET
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center text-center">
                                            <div class="col-4">
                                                <span> Quad</span><br>
                                                <span class="badge badge-primary badge-pill badge-lg">580</span>
                                            </div>
                                            <div class="col-4">
                                                <span> Triple</span><br>
                                                <span class="badge badge-primary badge-pill badge-lg">760</span>
                                            </div>
                                            <div class="col-4">
                                                <span> Double</span><br>
                                                <span class="badge badge-primary badge-pill badge-lg">940</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </secton>
        </div>
    </div>
</div>