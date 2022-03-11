<script>

    // LOAD TABEL HOTEL
    // function loadHotel() {
        var tabelHotel = $('#tabelHotel').DataTable( {
            pageLength: 10,
            "ajax": {
                "url": "<?php echo base_url("Api/loadTabelHotel"); ?>",
                "type": "POST",
            },
            "columns": [{
                "data": "id_hotel"
            }, {
                'data': 'nama_hotel'
            }, {
                'data': 'nama_kota'
            }, {
                'data': 'harga_quad'
            }, {
                'data': 'harga_triple'
            }, {
                'data': 'harga_double'
            }, {
                'data': null,
                render: function(data, type, row) {
                    if (data.gambar_hotel != null) {
                        return '<img src="assets/back/img/hotel/' + data.gambar_hotel + '" style="width:120px;height:auto">'
                    } else {
                        return '<img src="assets/back/img/hotel/hotel-default.png" style="width:120px;height:auto">'
                    }
                }
            }, {
                data: null,
                render: function(data, type, row) {
                    return '<button class="btn '+row+' btn-icon btn-warning mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#modalEditHotel" onclick="setEdit(' + data.id_hotel + ',\'' + data.nama_hotel + '\',' + data.id_kota + ',' + data.harga_quad + ',' + data.harga_triple + ',' + data.harga_double + ')"><i class="fa fa-pencil-square-o"></i></button><button class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#modalHapusHotel" onclick="setHapus(' + data.id_hotel + ',\'' + data.nama_hotel + '\')"><i class="fa fa-trash"></i></button>';
                }
            }]
        });
    // }
    // loadHotel();

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

    // FOKUS FORM INPUT PERTAMA
    $('#modalTambahHotel').on('shown.bs.modal', function() {
        $('#listKotaTambah').val('-').change();
        $('#namaHotel').focus();
    })


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
                        // $("#btnSimpanHotel").prop('disabled', true)
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
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // err = xhr.status + "\n" + xhr.responseText + "\n" + thrownError
                    // console.log(err)
                    alertError()
                }
            })
        }
    }


    // EDIT HOTEL
    function setEdit(idHotel, namaHotel, idKota, hargaQuad, hargaTriple, hargaDouble) {
        $('#editNamaHotel').focus();
        $('#editIdHotel').val(idHotel);
        $('#editNamaHotel').val(namaHotel);
        $('#listKotaEdit').val(idKota).change();
        $('#editHargaQuad').val(hargaQuad);
        $('#editHargaTriple').val(hargaTriple);
        $('#editHargaDouble').val(hargaDouble);

        $('#modalEditHotel').on('shown.bs.modal', function() {
            $("#editNamaHotel").focus();
        })
        $('#modalEditHotel').on('hidden.bs.modal', function() {
            $('#editIdHotel').val();
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
    }

    function ubahHotel() {
        var idHotel = $("#editIdHotel").val();
        var namaHotel = $("#editNamaHotel").val();
        var idKota = $("#listKotaEdit").val();
        var hargaQuad = $("#editHargaQuad").val();
        var hargaTriple = $("#editHargaTriple").val();
        var hargaDouble = $("#editHargaDouble").val();
        var gambarHotel = $("#editGambarHotel").val();
        // alert(idKota)
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
                dataType: "text",
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
                    // alert(response)
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
                    location.reload(true);
                    loadHotel();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    alertError()
                }
            })
        }
    }

    function setHapus(idHotel, namaHotel) {
        $('#modalHapusHotel').on('shown.bs.modal', function() {
            $("#btnHapusHotel").focus();
        });

        valIdHotel = $("#valIdHotel").val(idHotel)
        valNamaHotel = $("#valNamaHotel").val(namaHotel)

        $("#headerHapusHotel").text('Nama: ' + namaHotel)
        klikHapus(valIdHotel,valNamaHotel)
        tabelHotel.off()
    }
    
    function klikHapus(idHotel, NamaHotel){
        $('#btnHapusHotel').click(function() {
            // hapusHotel(idHotel);
            alert(idHotel.val())
        });
    }

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
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                alertError();
            }
        })
    }
</script>