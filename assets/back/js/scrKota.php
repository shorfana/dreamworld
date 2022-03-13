<script>
    function alertError() {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Coba Refresh Halaman Atau Tekan Tombol Dibawah Ini',
            footer: '<a href="<?= base_url() . 'hotel' ?>">Refresh</a>',
            showConfirmButton: false,
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
        })
    }
    function alertRestrictFK() {
        Swal.fire({
            type: 'error',
            title: 'Gagal Hapus Kota!',
            text: 'Ada Data Hotel Yang Terhubung Dengan Kota Ini',
            // footer: '<a href="<?= base_url() . 'hotel' ?>">Refresh</a>',
            showConfirmButton: false,
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
            timer: 2000
        })
    }
    // load tabel kota
    function loadKota() {
        $('#tabelKota').DataTable({
            pageLength: 10,
            "ajax": {
                "url": "<?php echo base_url("Api/loadTabelKota"); ?>",
                "type": "POST",
            },
            "columns": [{
                    "data": "id_kota"
                }, {
                    'data': 'nama_kota'
                },
                // {
                //     data: null,
                //     render: function(data, type, row) {
                //         return '<button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalEditKota" onclick="setEdit(' + data.id_kota + ',\'' + data.nama_kota + '\')"><i class="fa fa-pencil-square-o"></i></button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalHapusKota" onclick="setHapus(' + data.id_kota + ',\'' + data.nama_kota + '\')"><i class="fa fa-trash"></i></button>';
                //     }
                // },
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return '<button class=" btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light editKota" data-toggle="modal" data-target="#modalEditKota" data-idkota="' + data.id_kota + '" data-namakota="' + data.nama_kota + '"><i class="fa fa-pencil-square-o"></i></button><button class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light hapusKota" data-id="' + data.id_kota + '" data-nama="' + data.nama_kota + '" data-toggle="modal" data-target="#modalHapusKota"><i class="fa fa-trash"></i></button>';
                    }
                }
            ]
        });
    }
    loadKota();

    // fokus ke input ketika klik tombol tambah data
    $('#tambahDataKota').on('shown.bs.modal', function() {
        $('#namaKota').focus();
    })

    // trigger tombol simpan ketika mencet enter di bagian input
    $("#namaKota").keyup(function(e) {
        if (e.which == 13) {
            $("#btnSimpanKota").click();
        }
    });

    // SIMPAN
    function simpanKota() {
        var namaKota = $("#namaKota").val();
        if (namaKota === null || namaKota.length === 0) {
            $("#namaKota").focus()
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Isi Nama Kota Terlebih Dahulu!',
                confirmButtonClass: 'btn btn-primary',
                showConfirmButton: false,
                timer: 1000,
                buttonsStyling: false,
            })
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url("Api/simpanKota"); ?>",
                data: {
                    namaKota: namaKota
                },
                dataType: "text",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTf-8");
                    }
                },
                success: function(response) {
                    Swal.fire({
                        type: 'success',
                        title: 'Sukses',
                        text: 'Kota Baru Berhasil Ditambahkan',
                        confirmButtonClass: 'btn btn-primary',
                        showCloseButton: false,
                        showConfirmButton: false,
                        buttonsStyling: false,
                        timer: 1500
                    })
                    $("#namaKota").val("");
                    $('#tambahDataKota').modal('hide');
                    $("#tabelKota").dataTable().fnDestroy();
                    loadKota();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    alertError()
                }
            })
        }
    }


    // EDIT
    $('#tabelKota').on('click', 'button.editKota', function() {
        valIdKota = $(this).data('idkota')
        valNamaKota = $(this).data('namakota')

        $("#editNamaKota").val(valNamaKota)
    });
    $('#modalEditKota').on('shown.bs.modal', function() {
        $("#editNamaKota").focus();
    })
    $("#editNamaKota").keyup(function(e) {
        if (e.which == 13) {
            ubahKota(valIdKota)
        }
    });
    $('#btnEditKota').click(function() {
        ubahKota(valIdKota);
    })


    function ubahKota(idKota) {
        var namaKota = $("#editNamaKota").val();
        if (namaKota === null || namaKota.length === 0) {
            $("#editNamaKota").focus();
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Isi Nama Kota Terlebih Dahulu!',
                confirmButtonClass: 'btn btn-primary',
                showConfirmButton: false,
                timer: 1000,
                buttonsStyling: false,
            })
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url("Api/ubahKota"); ?>",
                data: {
                    idKota: idKota,
                    namaKota: namaKota
                },
                dataType: "text",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTf-8");
                    }
                },
                success: function(response) {
                    Swal.fire({
                        type: 'success',
                        title: 'Sukses',
                        text: 'Data Kota Berhasil Diperbarui',
                        confirmButtonClass: 'btn btn-primary',
                        showCloseButton: false,
                        showConfirmButton: false,
                        buttonsStyling: false,
                        timer: 1500
                    })
                    $('#modalEditKota').modal('hide');
                    $("#tabelKota").dataTable().fnDestroy();
                    loadKota();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    alertError()
                }
            })
        }
    }

    // HAPUS
    $('#tabelKota').on('click', 'button.hapusKota', function() {
        valIdKota = $(this).data('id')
        valNamaKota = $(this).data('nama')
        $("#hapusIdKota").val(valIdKota)
        $("#bodyHapusKota").text("Hapus Data Kota " + valNamaKota + " ?")
        $("#btnHapusKota").focus();

        $("#btnHapusKota").keyup(function(e) {
            if (e.which == 13) {
                $("#btnHapusKota").click();
            }
        });
    });

    $('#btnHapusKota').click(function() {
        idKota = $("#hapusIdKota").val()
        // alert(idKota)
        hapusKota(idKota)
    });


    function hapusKota(idKota) {
        $.ajax({
            type: "POST",
            url: "<?= base_url("Api/hapusKota"); ?>",
            data: {
                idKota: idKota,
            },
            dataType: "text",
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTf-8");
                }
            },
            success: function(response) {
                Swal.fire({
                    type: 'success',
                    title: 'Sukses',
                    text: 'Data Kota Berhasil Dihapus',
                    confirmButtonClass: 'btn btn-primary',
                    showCloseButton: false,
                    showConfirmButton: false,
                    buttonsStyling: false,
                    timer: 1500
                })
                $('#modalHapusKota').modal('hide');
                $("#tabelKota").dataTable().fnDestroy();
                loadKota();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                $('#modalHapusKota').modal('hide');
                if(thrownError == "Internal Server Error"){
                    alertRestrictFK()
                }else{
                    alertError();
                }
            }
        })
    }
</script>