<script>
    function listKota() {
        $.ajax({
            url: "<?= base_url("Api/listKota") ?>",
            method: "POST",
            dataType: "JSON",
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTf-8");
                }
            },
            success: function(response) {
                var i;
                var list = '';
                for (i = 0; i < response.length; i++) {
                    list += "<option value='" + response[i].id_kota + "'>" + response[i].id_kota + " | " + response[i].nama_kota + "</option>"
                }
                $("#listKota").append(list);

            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Coba Refresh Halaman Atau Tekan Tombol Dibawah Ini',
                    footer: '<a href="<?= base_url() . 'kota' ?>">Refresh</a>',
                    showConfirmButton: false,
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
            }
        })
    }


    // load tabel kota
    function loadKota() {
        $('#tabelKota').DataTable({
            pageLength: 5,
            "ajax": {
                "url": "<?php echo base_url("Api/loadTabelKota"); ?>",
                "type": "POST",
            },
            "columns": [{
                "data": "id_kota"
            }, {
                'data': 'nama_kota'
            }, {
                data: null,
                render: function(data, type, row) {
                    return '<button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalEditKota" onclick="setEdit(' + data.id_kota + ',\'' + data.nama_kota + '\')"><i class="fa fa-pencil-square-o"></i></button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalHapusKota" onclick="setHapus(' + data.id_kota + ',\'' + data.nama_kota + '\')"><i class="fa fa-trash"></i></button>';
                }
            }]
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
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Coba Refresh Halaman Atau Tekan Tombol Dibawah Ini',
                        footer: '<a href="<?= base_url() . 'kota' ?>">Refresh</a>',
                        showConfirmButton: false,
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    })
                }
            })
        }
    }


    // EDIT
    function setEdit(idKota, namaKota) {
        $('#editNamaKota').val(namaKota);
        $('#modalEditKota').on('shown.bs.modal', function() {
            $("#editNamaKota").focus();
        })
        $("#editNamaKota").keyup(function(e) {
            if (e.which == 13) {
                ubahKota(idKota);
            }
        });
        $('#btnEditKota').click(function() {
            ubahKota(idKota);
        })
    }

    function ubahKota(idKota) {
        var namaKota = $("#editNamaKota").val();
        if (namaKota === null || namaKota.length === 0) {
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
                    Swal.fire({
                        type: 'error',
                        title: 'Oops... Ada Error',
                        text: 'Coba Refresh Halaman Atau Tekan Tombol Dibawah Ini',
                        footer: '<a href="<?= base_url() . 'kota' ?>">Refresh</a>',
                        showConfirmButton: false,
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    })
                }
            })
        }
    }

    // HAPUS

    function setHapus(idKota, namaKota) {
        $('#modalHapusKota').on('shown.bs.modal', function() {
            $("#btnHapusKota").focus();
        });
        $("#headerHapusKota").text('Kota ' + namaKota)
        $('#btnHapusKota').click(function() {
            hapusKota(idKota);
        });
    }

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
                Swal.fire({
                    type: 'error',
                    title: 'Oops... Ada Error',
                    text: 'Coba Refresh Halaman Atau Tekan Tombol Dibawah Ini',
                    footer: '<a href="<?= base_url() . 'kota' ?>">Refresh</a>',
                    showConfirmButton: false,
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
            }
        })
    }
</script>