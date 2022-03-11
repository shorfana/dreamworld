<script>
    // LOAD TABEL HOTEL
    function loadHotel() {
        $('#tabelHotel').DataTable({
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
                    return '<img src="assets/back/img/hotel/' + data.gambar_hotel + '" style="width:120px;height:auto">'
                }
            }, {
                data: null,
                render: function(data, type, row) {
                    return '<button class="btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#modalEditHotel" onclick="setEdit(' + data.id_hotel + ',\'' + data.nama_hotel + '\',' + data.id_kota + ',' + data.harga_quad + ',' + data.harga_triple + ',' + data.harga_double + ')"><i class="fa fa-pencil-square-o"></i></button><button class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#modalHapusHotel" onclick="setHapus(' + data.id_hotel + ')"><i class="fa fa-trash"></i></button>';
                }
            }]
        });
    }
    loadHotel();

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
    $('#tambahDataHotel').on('shown.bs.modal', function() {
        $('.listKota').val('-').change();
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
                $(".listKota").append(list);

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
        listKota = $("#listKota").val();
        hargaQuad = $("#hargaQuad").val();
        hargaTriple = $("#hargaTriple").val();
        hargaDouble = $("#hargaDouble").val();
        gambarHotel = $("#gambarHotel").val();
        if (namaHotel == '') {
            $("#namaHotel").focus();
            alertFormNull();
        } else if (listKota == '-') {
            // $("#listKota").focus();
            document.getElementById('listKota').focus();
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
        } else if (gambarHotel == '') {
            $("#gambarHotel").focus();
            alertFormNull();
        } else {
            let newForm = new FormData();
            const files = $('#gambarHotel')[0].files[0];
            newForm.append('namaHotel', namaHotel);
            newForm.append('listKota', listKota);
            newForm.append('hargaQuad', hargaQuad);
            newForm.append('hargaTriple', hargaTriple);
            newForm.append('hargaDouble', hargaDouble);
            newForm.append('file', files);
            $.ajax({
                url: "<?= base_url("Api/simpanHotel") ?>",
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                data: newForm,
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTf-8");
                    }
                },
                success: function(response) {
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
                    $("#namaHotel").val("");
                    // MASIH BERMASALAH
                    $(".listKota option:first").attr('selected', 'selected');
                    // MASIH BERMASALAH
                    $("#hargaQuad").val("");
                    $("#hargaTriple").val("");
                    $("#hargaDouble").val("");
                    $("#gambarHotel").val("");
                    $('#tambahDataHotel').modal('hide');
                    $("#tabelHotel").dataTable().fnDestroy();
                    loadHotel();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    alertError()
                }
            })
        }
    }

    // EDIT HOTEL
    function setEdit(idHotel, namaHotel, idKota, hargaQuad, hargaTriple, hargaDouble) {
        console.log(idHotel + ', ' + namaHotel + ', ' + idKota + ', ' + hargaQuad + ', ' + hargaTriple + ', ' + hargaDouble)
        // listKota()
        $('#editNamaHotel').val(namaHotel);
        $('.listKota').val(idKota).change();
        $('#editHargaQuad').val(hargaQuad);
        $('#editHargaTriple').val(hargaTriple);
        $('#editHargaDouble').val(hargaDouble);

        // $('#modalEditKota').on('shown.bs.modal', function() {
        //     $("#editNamaKota").focus();
        // })
        // $("#editNamaKota").keyup(function(e) {
        //     if (e.which == 13) {
        //         ubahKota(idKota);
        //     }
        // });
        // $('#btnEditKota').click(function() {
        //     ubahKota(idKota);
        // })
    }
</script>