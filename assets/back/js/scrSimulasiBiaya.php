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

    function alertFormNull() {
        Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Form Belum Lengkap / Ada Kesalahan Input',
            showConfirmButton: false,
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
            timer: 2000
        })
    }

    function listHotel() {
        $.ajax({
            url: "<?= base_url("Api/listHotel") ?>",
            method: "POST",
            dataType: "JSON",
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTf-8");
                }
            },
            success: function(response) {
                let hotelList = ''
                $.each(response, function(objKota, valueKota) {
                    hotelList += '<optgroup label="' + objKota + '">'
                    $.each(valueKota, function(objHotel, valueHotel) {
                        hotelList += '<option value="' + valueHotel.id_hotel + '">' + valueHotel.nama_hotel + '</option>'
                    })
                    hotelList += '</optgroup>'
                });
                $("#selectHotel").append(hotelList);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                alertError()
            }
        })
    }
    listHotel()

    function listPelayanan() {
        $.ajax({
            url: "<?= base_url("Api/listPelayanan") ?>",
            method: "POST",
            dataType: "JSON",
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTf-8");
                }
            },
            success: function(response) {
                let serviceList = ''
                // serviceList += "<option id='optAll' value='all'>-- Pilih Semua --</option>"
                for (let i = 0; i < response.length; i++) {
                    serviceList += "<option value='" + response[i].id_pelayanan + "'>" + response[i].jenis_pelayanan + "</option>"
                }
                $("#selectPelayanan").append(serviceList)
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                alertError()
            }
        })
    }
    listPelayanan()

    $('#selectHotel').select2({
        // placeholder: 'Pilih Hotel',
        closeOnSelect: false
    });

    $('#selectPelayanan').select2({
        // placeholder: 'Pilih Pelayanan',
        closeOnSelect: false
    });

    $("#checkAll").click(function() {
        if ($("#checkAll").prop('checked') == true) {
            $("#selectPelayanan > option").prop("selected", "selected");
            $("#selectPelayanan").trigger("change");
        } else {
            $("#selectPelayanan").val(null).trigger('change');
        }
    })

    textServ = []
    valServ = []
    tempVServ = []
    tempTServ = []
    $('#selectPelayanan').on('change', function() {
        var serviceVal = $("#selectPelayanan").val();
        // alert(serviceVal)
        textServ.splice(0, textServ.length)
        valServ.splice(0, valServ.length)
        tempTServ.splice(0, tempTServ.length)
        tempVServ.splice(0, tempVServ.length)
        // while (textServ.length > 0) { textServ.pop(); }
        // while (valServ.length > 0) { valServ.pop();}
        for (let i = 0; i < serviceVal.length; i++) {
            idServ = serviceVal[i]
            $.ajax({
                url: "<?= base_url("Api/serviceById") ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    idServ: idServ
                },
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTf-8");
                    }
                },
                success: function(servResp) {
                    textServ.push(servResp.jenis_pelayanan)
                    valServ.push(servResp.harga_pelayanan)
                    tempTServ.push(servResp.jenis_pelayanan)
                    tempVServ.push(servResp.harga_pelayanan)
                    // alert(servResp.id_pelayanan)
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alertError()
                }
            })
        }
    })

    arrHotel = []
    $('#selectHotel').on('change', function() {
        var hotelVal = $("#selectHotel").val();
        // console.log(hotelVal)
        while (arrHotel.length > 0) {
            arrHotel.pop();
        }
        for (let i = 0; i < hotelVal.length; i++) {
            idHtl = hotelVal[i]
            $.ajax({
                url: "<?= base_url("Api/hotelById") ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    idHotel: idHtl
                },
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTf-8");
                    }
                },
                success: function(htlResp) {
                    const objHtl = new Object();
                    objHtl.idHotel = htlResp.id_hotel;
                    objHtl.namaHotel = htlResp.nama_hotel;
                    objHtl.hrgQuad = htlResp.harga_quad;
                    objHtl.hargTriple = htlResp.harga_triple;
                    objHtl.hargDouble = htlResp.harga_double;
                    objHtl.namaKota = htlResp.nama_kota
                    arrHotel.push(htlResp)
                    // console.log(htlResp)
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alertError()
                }
            })
        }
    })


    $("#btnTest").click(function() {
        let busLoc = textServ.indexOf("BUS")
        if (busLoc > -1) {
            valServ.splice(busLoc, 1);
            textServ.splice(busLoc, 1);
        }
        console.log(textServ)
        console.log(valServ)
        console.log(arrHotel)
    })

    $("#btnHitung").click(function() {
        // while (textServ.length > 0) { textServ.pop(); }
        // while (valServ.length > 0) { valServ.pop();}
        hotelVal = $("#selectHotel").val()
        serviceVal = $("#selectPelayanan").val()
        qtyVal = $("#qty").val()
        nightVal = $("#night").val()
        if (hotelVal == '') {
            document.getElementById("selectHotel").focus()
            alertFormNull()
        } else if (serviceVal == '') {
            document.getElementById("selectPelayanan").focus()
            alertFormNull()
        } else if (qtyVal == '') {
            $("#qty").focus()
            alertFormNull()
        } else if (nightVal == '') {
            $("#night").focus()
            alertFormNull()
        } else {
            // hapus array bus
            let busLoc = textServ.indexOf("BUS")
            if (busLoc > -1) {
                tempVServ.splice(busLoc, 1);
                tempTServ.splice(busLoc, 1);
            }

            console.log(tempTServ)
            console.log(tempVServ)
            console.log(textServ)
            console.log(valServ)

            for (let i = 0; i < textServ.length; i++) {
                $("#listPelayanan").append("<li class='list-group-item noBorder'><span class='float-right'><b>" + valServ[i] + "</b></span>" + textServ[i] + "</li>")
            }
        }
    })
</script>