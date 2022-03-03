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
                            <h4 class="card-title">Zero configuration</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <!-- <p class="card-text">
                                    lorem ipsum
                                </p> -->
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kota</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($listKota as $lk) {
                                            ?>
                                                <tr>
                                                    <td><?= $lk->id_kota ?></td>
                                                    <td><?= $lk->nama_kota ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editData-<?= $lk->id_kota; ?>"><i class="fa fa-pencil-square-o"></i></button>&nbsp;&nbsp;
                                                            <button class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#deleteData-<?= $lk->id_kota; ?>"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
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