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
            title: 'Gagal Hapus Pelayanan!',
            text: 'Ada Data Pelayanan Yang Terhubung Dengan Pelayanan Ini',
            // footer: '<a href="<?= base_url() . 'hotel' ?>">Refresh</a>',
            showConfirmButton: false,
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
            timer: 2000
        })
    }

    function alertFormNull() {
        Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Form Belum Lengkap / Ada Kesalahan Input',
            showConfirmButton: false,
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
            timer: 3500
        })
    }

    // load tabel pelayanan
    function loadPelayanan() {
        $('#tabelPelayanan').DataTable({
            pageLength: 10,
            "ajax": {
                "url": "<?php echo base_url("Api/loadTabelPelayanan"); ?>",
                "type": "POST",
            },
            "columns": [{
                "data": "id_pelayanan"
            }, {
                'data': 'jenis_pelayanan'
            }, {
                'data': 'harga_pelayanan'
            }, {
                data: null,
                render: function(data, type, row, meta) {
                    return '<button class=" btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light editPelayanan" data-toggle="modal" data-target="#modalEditPelayanan" data-idpelayanan="' + data.id_pelayanan + '" data-jenispelayanan="' + data.jenis_pelayanan + '"><i class="fa fa-pencil-square-o"></i></button><button class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light hapusPelayanan" data-id="' + data.id_kota + '" data-jenis="' + data.jenis_pelayanan + '" data-toggle="modal" data-target="#modalHapusPelayanan"><i class="fa fa-trash"></i></button>';
                }
            }]
        });
    }
    loadPelayanan();

    // fokus ke input ketika klik tombol tambah data
    $('#tambahDataPelayanan').on('shown.bs.modal', function() {
        $('#jenisPelayanan').focus();
    })

    // SIMPAN
    function simpanPelayanan() {
        var jenisPelayanan = $("#jenisPelayanan").val();
        var hargaPelayanan = $("#hargaPelayanan").val();
        if (hargaPelayanan == '') {
            $("#jenisPelayanan").focus();
            alertFormNull()
        } else if (hargaPelayanan == '') {
            $("#hargaPelayanan").focus();
            alertFormNull()
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url("Api/simpanPelayanan"); ?>",
                data: {
                    jenisPelayanan: jenisPelayanan,
                    hargaPelayanan: hargaPelayanan
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
                        text: 'Pelayanan Baru Berhasil Ditambahkan',
                        confirmButtonClass: 'btn btn-primary',
                        showCloseButton: false,
                        showConfirmButton: false,
                        buttonsStyling: false,
                        timer: 1500
                    })
                    $("#jenisPelayanan").val("");
                    $("#hargaPelayanan").val("");
                    $('#tambahDataPelayanan').modal('hide');
                    $("#tabelPelayanan").dataTable().fnDestroy();
                    loadPelayanan();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    alertError()
                }
            })
        }
    }


    // EDIT
    $('#tabelPelayanan').on('click', 'button.editPelayanan', function() {
        valIdPelayanan = $(this).data('idPelayanan')
        valJenisPelayanan = $(this).data('jenisPelayanan')

        $("#editJenisPelayanan").val(valJenisPelayanan)
    });
    $('#modalEditPelayanan').on('shown.bs.modal', function() {
        $("#editJenisPelayanan").focus();
    })
    $("#editJenisPelayanan").keyup(function(e) {
        if (e.which == 13) {
            ubahPelayanan(valIdPelayanan)
        }
    });
    $('#btnEditPelayanan').click(function() {
        ubahPelayanan(valIdPelayanan);
    })


    function ubahPelayanan(idPelayanan) {
        var namaPelayanan = $("#jenisPelayanan").val();
        var hargaPelayanan = $("#hargaPelayanan").val();
        if (namaPelayanan == '') {
            $("#jenisPelayanan").focus();
            alertFormNull()
        } else if (hargaPelayanan == '') {
            $("#hargaPelayanan").focus();
            alertFormNull()
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url("Api/ubahPelayanan"); ?>",
                data: {
                    idPelayanan: idPelayanan,
                    jenisPelayanan: jenisPelayanan
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
                        text: 'Data Pelayanan Berhasil Diperbarui',
                        confirmButtonClass: 'btn btn-primary',
                        showCloseButton: false,
                        showConfirmButton: false,
                        buttonsStyling: false,
                        timer: 1500
                    })
                    $('#modalEditPelayanan').modal('hide');
                    $("#tabelPelayanan").dataTable().fnDestroy();
                    loadPelayanan();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    alertError()
                }
            })
        }
    }

    // HAPUS
    $('#tabelPelayanan').on('click', 'button.hapusPelayanan', function() {
        valIdPelayanan = $(this).data('id')
        valJenisPelayanan = $(this).data('jenis')
        $("#hapusIdPelayanan").val(valIdPelayanan)
        $("#bodyHapusPelayanan").text("Hapus Data Pelayanan " + valJenisPelayanan + " ?")
        $("#btnHapusPelayanan").focus();

        $("#btnHapusPelayanan").keyup(function(e) {
            if (e.which == 13) {
                $("#btnHapusPelayanan").click();
            }
        });
    });

    $('#btnHapusPelayanan').click(function() {
        idPelayanan = $("#hapusIdPelayanan").val()
        // alert(idKota)
        hapusPelayanan(idPelayanan)
    });


    function hapusPelayanan(idPelayanan) {
        $.ajax({
            type: "POST",
            url: "<?= base_url("Api/hapusPelayanan"); ?>",
            data: {
                idPelayanan: idPelayanan,
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
                    text: 'Data Pelayanan Berhasil Dihapus',
                    confirmButtonClass: 'btn btn-primary',
                    showCloseButton: false,
                    showConfirmButton: false,
                    buttonsStyling: false,
                    timer: 1500
                })
                $('#modalHapusPelayanan').modal('hide');
                $("#tabelPelayanan").dataTable().fnDestroy();
                loadPelayanan();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                $('#modalHapusPelayanan').modal('hide');
                if (thrownError == "Internal Server Error") {
                    alertRestrictFK()
                } else {
                    alertError();
                }
            }
        })
    }
</script>