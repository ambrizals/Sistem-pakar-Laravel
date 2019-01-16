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