var pageuri = window.location.href;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
$('#ubahTanaman').on('shown.bs.modal', function(e){
	var url = pageuri + '/' + $(e.relatedTarget).data('id');
	$.get(url, function(data){
		$('#ubahTanaman').find('form').attr('action', url);
		$('#ubahTanaman').find('#tanaman').val(data.nama);
	});
});
function hapusTanaman(id){
    swal({
        title: 'Konfirmasi',
        text: 'Ingin menghapus data?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value) {
            url = pageuri + '/' + id;
            token = $('#tanamanTable').data('token');
            $.ajax({
                header: {
                    'X-CSRF-TOKEN': token
                },
                method: "DELETE",
                url: url,
                data: {
                    _token : token
                },
                datatype: 'json',
            }).done(function () {
                toast({
                    type: 'success',
                    title: 'Tanaman telah dihapus!'
                });
            	location.reload(true);
            })
        } else {
            toast({
                type: 'error',
                title: 'Action cancelled!'
            });
        }
    })
}
$(document).on('submit', '#tambahDaerahGejala form', function(e) {
    $('#tambahDaerahGejala').modal('hide');
    $('.overlay').css('display','block');
    var form_action = $('#tambahDaerahGejala form').attr('action');
    var token = $('#tambahDaerahGejala form').find("input[name=_token]").val();
    var formdata = $('#tambahDaerahGejala form').serialize();
    e.preventDefault();
    $.ajax({
        header: {
            'X-CSRF-TOKEN': token
        },   
        method: "POST",
        url : form_action,
        data : formdata,
        datatype : 'json',
        success : function(){
            toast({
                type: 'success',
                title: 'Data berhasil disimpan!'
            });
            tb_daerahGejala.ajax.reload();
            $('#tambahDaerahGejala form')[0].reset();
        },
        error : function(){
            toast({
                type: 'error',
                title: 'Perubahan Tidak Disimpan!'
            });
            tb_daerahGejala.ajax.reload();
        }
    });
});
function hapusDaerahGejala(id){
    token = $('#tb_daerahGejala').data('token');
    swal({
        title: 'Apa anda yakin ?',
        text: "Ingin menghapus daerah gejala yang dipilih?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data'
    }).then((result) => {
        if (result.value) {
            url = pageuri+'/'+id;
            $.ajax({
                header: {
                    'X-CSRF-TOKEN': token
                },  
                method: "DELETE",
                url: url,
                data: {
                    _token : token
                },
                datatype: 'json',
            }).done(function(){
                toast({
                    type: 'success',
                    title: 'Data berhasil dihapus!'
                });
                tb_daerahGejala.ajax.reload();
            }).fail(function(){
                toast({
                    type: 'error',
                    title: 'Perubahan Tidak Disimpan!'
                });
            });
        } else {
            toast({
                type: 'error',
                title: 'Aksi dibatalkan!'
            });
        }
    })
}
$('#ubahDaerahGejala').on('shown.bs.modal', function(e){
    var url = pageuri + '/' + $(e.relatedTarget).data('id');
    $.get(url, function(data){
        $('#ubahDaerahGejala').find('form').attr('action', url);
        $('#ubahDaerahGejala').find('#daerah_gejala').val(data.daerah_gejala);
    });
});
$(document).on('submit', '#ubahDaerahGejala form', function(e) {
    $('#ubahDaerahGejala').modal('hide');
    $('.overlay').css('display','block');
    var form_action = $('#ubahDaerahGejala form').attr('action');
    var token = $('#ubahDaerahGejala form').find("input[name=_token]").val();
    var formdata = $('#ubahDaerahGejala form').serialize();
    e.preventDefault();
    $.ajax({
        header: {
            'X-CSRF-TOKEN': token
        },   
        method: "PUT",
        url : form_action,
        data : formdata,
        datatype : 'json',
        success : function(){
            toast({
                type: 'success',
                title: 'Data berhasil disimpan!'
            });
            tb_daerahGejala.ajax.reload();
            $('#tambahDaerahGejala form')[0].reset();
        },
        error : function(){
            toast({
                type: 'error',
                title: 'Perubahan Tidak Disimpan!'
            });
            tb_daerahGejala.ajax.reload();
        }
    });
});
$(document).on('submit', '#tambahPenyakit form', function(e) {
    $('#tambahPenyakit').modal('hide');
    $('.overlay').css('display','block');
    var form_action = $('#tambahPenyakit form').attr('action');
    var token = $('#tambahPenyakit form').find("input[name=_token]").val();
    var formdata = $('#tambahPenyakit form').serialize();
    e.preventDefault();
    $.ajax({
        header: {
            'X-CSRF-TOKEN': token
        },   
        method: "POST",
        url : form_action,
        data : formdata,
        datatype : 'json',
        success : function(){
            toast({
                type: 'success',
                title: 'Data berhasil disimpan!'
            });
            penyakitTable.ajax.reload();
            $('#tambahPenyakit form')[0].reset();
        },
        error : function(){
            toast({
                type: 'error',
                title: 'Perubahan Tidak Disimpan!'
            });
            penyakitTable.ajax.reload();
        }
    });
});
function hapusPenyakit(id){
    token = $('#penyakitTable').data('token');
    swal({
        title: 'Apa anda yakin ?',
        text: "Ingin menghapus penyakit yang dipilih?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data'
    }).then((result) => {
        if (result.value) {
            url = pageuri+'/'+id;
            $.ajax({
                header: {
                    'X-CSRF-TOKEN': token
                },  
                method: "DELETE",
                url: url,
                data: {
                    _token : token
                },
                datatype: 'json',
            }).done(function(){
                toast({
                    type: 'success',
                    title: 'Data berhasil dihapus!'
                });
                penyakitTable.ajax.reload();
            }).fail(function(){
                toast({
                    type: 'error',
                    title: 'Perubahan Tidak Disimpan!'
                });
            });
        } else {
            toast({
                type: 'error',
                title: 'Aksi dibatalkan!'
            });
        }
    })
}
$('#setGejala_penyakit #daerah_gejala').on('change', function(){
    $("#setGejala_penyakit #gejala").autocomplete({
        source: $("#setGejala_penyakit #gejala").data('url') +'?daerah='+ $('#setGejala_penyakit #daerah_gejala option:selected').val(),
        minLength: 1,
    });
    $('#setGejala_penyakit #gejala').autocomplete("option", "appendTo", "#setGejala_penyakit form");
})
function hapusGejala_penyakit(id){
    token = $('#gejalaList_penyakit').data('token');
    delurl = $('#gejalaList_penyakit').data('delete');
    swal({
        title: 'Apa anda yakin ?',
        text: "Ingin menghapus gejala yang dipilih pada penyakit ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data'
    }).then((result) => {
        if (result.value) {
            url = delurl+'/'+id + '/gejala';
            $.ajax({
                header: {
                    'X-CSRF-TOKEN': token
                },  
                method: "DELETE",
                url: url,
                data: {
                    _token : token
                },
                datatype: 'json',
            }).done(function(){
                toast({
                    type: 'success',
                    title: 'Data berhasil dihapus!'
                });
                gejalaList_penyakit.ajax.reload();
            }).fail(function(){
                toast({
                    type: 'error',
                    title: 'Perubahan Tidak Disimpan!'
                });
            });
        } else {
            toast({
                type: 'error',
                title: 'Aksi dibatalkan!'
            });
        }
    })
}
$(document).on('submit', '#setGejala_penyakit form', function(e) {
    e.preventDefault();
    var form_action = $('#setGejala_penyakit form').attr('action');
    var token = $('#setGejala_penyakit form').find("input[name=_token]").val();
    var formdata = $('#setGejala_penyakit form').serialize();
    $.ajax({
        header: {
            'X-CSRF-TOKEN': token
        },   
        method: "POST",
        url : form_action,
        data : formdata,
        datatype : 'json',
        success : function(){
            toast({
                type: 'success',
                title: 'Data berhasil disimpan!'
            });
            gejalaList_penyakit.ajax.reload();
            $('#setGejala_penyakit form')[0].reset();
        },
        error : function(){
            toast({
                type: 'error',
                title: 'Perubahan Tidak Disimpan!'
            });
            gejalaList_penyakit.ajax.reload();
        }
    });
});
$(document).on('submit', '#tambahGejala form', function(e) {
    $('#tambahGejala').modal('hide');
    $('.overlay').css('display','block');
    var form_action = $('#tambahGejala form').attr('action');
    var token = $('#tambahGejala form').find("input[name=_token]").val();
    var formdata = $('#tambahGejala form').serialize();
    e.preventDefault();
    $.ajax({
        header: {
            'X-CSRF-TOKEN': token
        },   
        method: "POST",
        url : form_action,
        data : formdata,
        datatype : 'json',
        success : function(){
            toast({
                type: 'success',
                title: 'Data berhasil disimpan!'
            });
            gejalaTable.ajax.reload();
            $('#tambahGejala form')[0].reset();
        },
        error : function(){
            toast({
                type: 'error',
                title: 'Perubahan Tidak Disimpan!'
            });
            gejalaTable.ajax.reload();
        }
    });
});
function hapusGejala(id){
    token = $('#gejalaTable').data('token');
    swal({
        title: 'Apa anda yakin ?',
        text: "Ingin menghapus gejala yang dipilih?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data'
    }).then((result) => {
        if (result.value) {
            url = pageuri+'/'+id;
            $.ajax({
                header: {
                    'X-CSRF-TOKEN': token
                },  
                method: "DELETE",
                url: url,
                data: {
                    _token : token
                },
                datatype: 'json',
            }).done(function(){
                toast({
                    type: 'success',
                    title: 'Data berhasil dihapus!'
                });
                gejalaTable.ajax.reload();
            }).fail(function(){
                toast({
                    type: 'error',
                    title: 'Perubahan Tidak Disimpan!'
                });
            });
        } else {
            toast({
                type: 'error',
                title: 'Aksi dibatalkan!'
            });
        }
    })
}
$('#ubahGejala').on('shown.bs.modal', function(e){
    var url = pageuri + '/' + $(e.relatedTarget).data('id');
    $.get(url, function(data){
        $('#ubahGejala').find('form').attr('action', url);
        $('#ubahGejala').find('#nama_gejala').val(data.nama_gejala);
        $('#ubahGejala').find('#tanaman option[value='+data.tanaman.id+']').prop('selected',true);
        $('#ubahGejala').find('#daerah_gejala option[value='+data.daerah_gejala.id+']').prop('selected',true);
    });
});
$(document).on('submit', '#ubahGejala form', function(e) {
    $('#ubahGejala').modal('hide');
    $('.overlay').css('display','block');
    var form_action = $('#ubahGejala form').attr('action');
    var token = $('#ubahGejala form').find("input[name=_token]").val();
    var formdata = $('#ubahGejala form').serialize();
    e.preventDefault();
    $.ajax({
        header: {
            'X-CSRF-TOKEN': token
        },   
        method: "PUT",
        url : form_action,
        data : formdata,
        datatype : 'json',
        success : function(){
            toast({
                type: 'success',
                title: 'Data berhasil disimpan!'
            });
            gejalaTable.ajax.reload();
            $('#ubahGejala form')[0].reset();
        },
        error : function(){
            toast({
                type: 'error',
                title: 'Perubahan Tidak Disimpan!'
            });
            gejalaTable.ajax.reload();
        }
    });
});