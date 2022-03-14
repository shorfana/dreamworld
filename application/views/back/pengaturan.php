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
            <secton id="content-types">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-title">Pengaturan Harga</div>
                                    <hr>
                                    <h6 class="text-bold pl-1">Rincian Harga</h6>
                                    <style>
                                        .list-group-item {
                                            border: 0px !important;
                                            padding-top: 1px;
                                        }
                                    </style>
                                    <hr>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            Hotel A
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            Hotel B
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            Handling
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            Bus
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            Visa
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            PCR
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            Profit & Operasional
                                        </li>
                                    </ul>
                                    <hr>
                                    <h4 class="text-bold pl-1 pr-1">
                                        <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                        Total Harga
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </secton>
        </div>
    </div>
</div>