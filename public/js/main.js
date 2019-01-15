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