<script>
    // NOTIFIKASI
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

    function alertError() {
        Swal.fire({
            type: 'error',
            title: 'Error...',
            text: 'Coba Refresh Halaman Atau Tekan Tombol Dibawah Ini',
            footer: '<a href="<?= base_url() . 'hotel' ?>">Refresh</a>',
            showConfirmButton: false,
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
        })
    }

    // LOAD TABEL HOTEL
    function loadHotel() {
        var tabelHotel = $('#tabelHotel').DataTable({
            pageLength: 10,
            "ajax": {
                "url": "<?php echo base_url("Api/loadTabelHotel"); ?>",
                "type": "POST",
            },
            "columns": [{
                'data': null,
                'render': function(data, type, row) {
                    return '<h6 class="rowIdHotel">' + data.id_hotel + '</h6>';
                }
            }, {
                'data': null,
                render: function(data, type, row) {
                    return '<h6 class="rowNamaHotel">' + data.nama_hotel + '</h6>';
                }
            }, {
                'data': null,
                render: function(data, type, row) {
                    return '<h6 class="rowNamaKota">' + data.nama_kota + '</h6>';
                }
            }, {
                'data': null,
                render: function(data, type, row) {
                    return '<h6 class="rowHQ">' + data.harga_quad + '</h6>';
                }
            }, {
                'data': null,
                render: function(data, type, row) {
                    return '<h6 class="rowHT">' + data.harga_triple + '</h6>';
                }
            }, {
                'data': null,
                render: function(data, type, row) {
                    return '<h6 class="rowHD">' + data.harga_double + '</h6>';
                }
            }, {
                'data': null,
                render: function(data, type, row) {
                    if (data.gambar_hotel != null) {
                        return '<img id="img-' + data.id_hotel + '" src="assets/back/img/hotel/' + data.gambar_hotel + '"    style="width:120px;height:auto" alt="image not loaded">'
                    } else {
                        return '<img id="img-' + data.id_hotel + '" src="assets/back/img/hotel/no_img.png" style="width:120px;height:auto">'
                    }
                }
            }, {
                data: null,
                render: function(data, type, row, meta) {
                    return '<button class=" btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light editHotel" data-toggle="modal" data-target="#modalEditHotel" data-idhotel="' + data.id_hotel + '" data-namahotel="' + data.nama_hotel + '" data-idkota="' + data.id_kota + '" data-hq="' + data.harga_quad + '" data-ht="' + data.harga_triple + '" data-hd="' + data.harga_double + '" data-gambarhotel="' + data.gambar_hotel + '"><i class="fa fa-pencil-square-o"></i></button><button class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light hapusHotel" data-id="' + data.id_hotel + '" data-nama="' + data.nama_hotel + '" data-toggle="modal" data-target="#modalHapusHotel"><i class="fa fa-trash"></i></button>';
                }
            }]
        });
    }
    loadHotel()

    // FOKUS FORM INPUT PERTAMA
    $('#modalTambahHotel').on('shown.bs.modal', function() {
        $('#namaHotel').focus();
    })

    function clearValHotel() {
        // $('#modalTambahHotel').on('hidden.bs.modal', function() {
        $('#listKotaTambah').val('-').change();
        $('#namaHotel').val(null);
        $('#hargaQuad').val(null);
        $('#hargaTriple').val(null);
        $('#hargaDouble').val(null);
        $('#gambarHotel').val(null);
        // })
    }

    // LIST KOTA PADA SELECT OPTION FORM
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
                $("#listKotaTambah").append(list);
                $("#listKotaEdit").append(list);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                alertError()
            }
        })
    }
    listKota()

    // SIMPAN HOTEL
    function simpanHotel() {
        namaHotel = $("#namaHotel").val();
        idKota = $("#listKotaTambah").val();
        hargaQuad = $("#hargaQuad").val();
        hargaTriple = $("#hargaTriple").val();
        hargaDouble = $("#hargaDouble").val();
        gambarHotel = $("#gambarHotel").val();
        if (namaHotel == '') {
            $("#namaHotel").focus();
            alertFormNull();
        } else if (idKota == '-') {
            document.getElementById('listKotaTambah').focus();
            alertFormNull();
        } else if (hargaQuad == '') {
            $("#hargaQuad").focus();
            alertFormNull();
        } else if (hargaTriple == '') {
            $("#hargaTriple").focus();
            alertFormNull();
        } else if (hargaDouble == '') {
            $("#hargaDouble").focus();
            alertFormNull();
            // } else if (gambarHotel == '') {
            //     $("#gambarHotel").focus();
            //     alertFormNull();
        } else {
            let newForm = new FormData();
            newForm.append('namaHotel', namaHotel);
            newForm.append('idKota', idKota);
            newForm.append('hargaQuad', hargaQuad);
            newForm.append('hargaTriple', hargaTriple);
            newForm.append('hargaDouble', hargaDouble);
            if (gambarHotel != '') {
                const files = $('#gambarHotel')[0].files[0];
                newForm.append('file', files);
            } else {
                newForm.append('file', null);
            }
            $.ajax({
                url: "<?= base_url("Api/simpanHotel") ?>",
                method: "POST",
                dataType: "text",
                processData: false,
                contentType: false,
                data: newForm,
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTf-8");
                        $("#btnSimpanHotel").prop('disabled', true)
                    }
                },
                success: function(response) {
                    // console.log(response)
                    Swal.fire({
                        type: 'success',
                        title: 'Sukses',
                        text: 'Hotel Baru Berhasil Ditambahkan',
                        confirmButtonClass: 'btn btn-primary',
                        showCloseButton: false,
                        showConfirmButton: false,
                        buttonsStyling: false,
                        timer: 1500
                    })
                    $("#btnSimpanHotel").prop('disabled', false)
                    $("#namaHotel").val("");
                    $("#hargaQuad").val("");
                    $("#hargaTriple").val("");
                    $("#hargaDouble").val("");
                    $("#gambarHotel").val("");
                    $('#modalTambahHotel').modal('hide');
                    $("#tabelHotel").dataTable().fnDestroy();
                    loadHotel();
                    clearValHotel()
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // err = xhr.status + "\n" + xhr.responseText + "\n" + thrownError
                    alertError()
                    clearValHotel()
                }
            })
        }
    }


    // --- EDIT HOTEL ---
    // SET EDIT MODAL VALUE
    $('#tabelHotel').on('click', 'button.editHotel', function() {
        valIdHotel = $(this).data('idhotel')
        valNamaHotel = $(this).data('namahotel')
        valIdKota = $(this).data('idkota')
        valHQ = $(this).data('hq')
        valHT = $(this).data('ht')
        valHD = $(this).data('hd')
        valGambar = $(this).data('gambarhotel')

        $("#editIdHotel").val(valIdHotel)
        $("#editNamaHotel").val(valNamaHotel)
        $("#listKotaEdit").val(valIdKota).change()
        $("#editHargaQuad").val(valHQ)
        $("#editHargaTriple").val(valHT)
        $("#editHargaDouble").val(valHD)
    });

    // SET FOCUS ON MODAL SHOW
    $('#modalEditHotel').on('shown.bs.modal', function() {
        $("#editNamaHotel").focus();
    })
    // SET NULL FALUE ON MODAL DISMISS
    $('#modalEditHotel').on('hidden.bs.modal', function() {
        $('#editIdHotel').val(null);
        $('#editNamaHotel').val(null);
        $('#listKotaEdit').val('-').change();
        $('#editHargaQuad').val(null);
        $('#editHargaTriple').val(null);
        $('#editHargaDouble').val(null);
        $("#editGambarHotel").val(null);
    })

    $('#btnEditHotel').click(function() {
        ubahHotel();
    })

    function ubahHotel() {
        var idHotel = $("#editIdHotel").val();
        var namaHotel = $("#editNamaHotel").val();
        var idKota = $("#listKotaEdit").val();
        var hargaQuad = $("#editHargaQuad").val();
        var hargaTriple = $("#editHargaTriple").val();
        var hargaDouble = $("#editHargaDouble").val();
        var gambarHotel = $("#editGambarHotel").val();

        if (namaHotel == '') {
            $("#editNamaHotel").focus();
            alertFormNull();
        } else if (idKota == '-') {
            document.getElementById('listKotaEdit').focus();
            alertFormNull();
        } else if (hargaQuad == '') {
            $("#editHargaQuad").focus();
            alertFormNull();
        } else if (hargaTriple == '') {
            $("#editHargaTriple").focus();
            alertFormNull();
        } else if (hargaDouble == '') {
            $("#editHargaDouble").focus();
            alertFormNull();
        } else {
            let newForm = new FormData();
            newForm.append('idHotel', idHotel);
            newForm.append('namaHotel', namaHotel);
            newForm.append('idKota', idKota);
            newForm.append('hargaQuad', hargaQuad);
            newForm.append('hargaTriple', hargaTriple);
            newForm.append('hargaDouble', hargaDouble);
            if (gambarHotel != '') {
                const files = $('#editGambarHotel')[0].files[0];
                newForm.append('file', files);
            } else {
                newForm.append('file', null);
            }
            $.ajax({
                url: "<?= base_url("Api/updateHotel") ?>",
                method: "POST",
                dataType: "json",
                processData: false,
                contentType: false,
                data: newForm,
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTf-8");
                        $("#btnEditHotel").prop('disabled', true)
                    }
                },
                success: function(response) {
                    // MENGATASI GAMBAR TIDAK BERUBAH KETIKA DATA UPDATE
                    img = response.gambar_hotel;
                    $.ajax({
                        url: "<?= base_url("Api/getHotel") ?>",
                        method: "POST",
                        dataType: "json",
                        data: {
                            idHotel: idHotel
                        },
                        beforeSend: function(e) {
                            e.overrideMimeType("application/json;charset=UTf-8");
                        },
                        success: function(value) {
                            if (img != null && value.gambar_hotel != null) {
                                var imgUrl = $('#img-' + idHotel).attr("src");
                                $('#img-' + idHotel).removeAttr("src").attr("src", 'assets/back/img/hotel/' + value.gambar_hotel + '?v=${Math.random()}');
                                // $('#img-' + idHotel).attr("src", 'assets/back/img/hotel/' + value.gambar_hotel + '?v=${Math.random()}');
                            } else {
                                return null
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alertError()
                        }
                    })
                    Swal.fire({
                        type: 'success',
                        title: 'Sukses',
                        text: 'Data Hotel Berhasil Diubah',
                        confirmButtonClass: 'btn btn-primary',
                        showCloseButton: false,
                        showConfirmButton: false,
                        buttonsStyling: false,
                        timer: 1500
                    })
                    $("#btnEditHotel").prop('disabled', false)
                    $('#modalEditHotel').modal('hide');
                    $("#tabelHotel").dataTable().fnDestroy();
                    // location.reload(true);
                    loadHotel();
                    clearValHotel()
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alertError()
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        }
    }



    $('#tabelHotel').on('click', 'button.hapusHotel', function() {
        valIdHotel = $(this).data('id')
        valNamaHotel = $(this).data('nama')
        $("#hapusIdHotel").val(valIdHotel)
        $("#hapusNamaHotel").val(valNamaHotel)
        $("#btnHapusHotel").focus();
        $("#bodyHapusHotel").text("Hapus Data Hotel " + valNamaHotel + " ?")
    });

    $('#btnHapusHotel').click(function() {
        idHotel = $("#hapusIdHotel").val()
        hapusHotel(idHotel)
    });


    function hapusHotel(idHotel) {
        $.ajax({
            type: "POST",
            url: "<?= base_url("Api/hapusHotel"); ?>",
            data: {
                idHotel: idHotel,
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
                    text: 'Data Hotel Berhasil Dihapus',
                    confirmButtonClass: 'btn btn-primary',
                    showCloseButton: false,
                    showConfirmButton: false,
                    buttonsStyling: false,
                    timer: 1500
                })
                $("#tabelHotel").dataTable().fnDestroy();
                $('#modalHapusHotel').modal('hide');
                loadHotel();
                clearValHotel()
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                alertError();
            }
        })
    }
</script>