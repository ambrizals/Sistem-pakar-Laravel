@extends('layouts.default')
@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-8">
				<p class="lead">
					Penyakit
				</p>
			</div>	
			<div class="col-4">
				<button type="button" data-toggle="modal" data-target="#tambahPenyakit" class="btn btn-primary btn-block">Tambah Penyakit</button>
			</div>
		</div>

		<table data-url="{{ route('penyakit.list') }}" data-token="{{ csrf_token() }}" id="penyakitTable" cellspacing="0">
			<thead>
				<tr>
					<th class="col-8">Nama Penyakit</th>
					<th class="col-4">Aksi</th>
				</tr>
			</thead>

		</table>

	</div>
</div>
<div class="modal fade" id="tambahPenyakit">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Penyakit</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<form action="{{ route('penyakit.store') }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('POST') }}
				<div class="modal-body">
					<div class="form-group">
						<label for="tanaman">Tanaman</label>
						<input type="text" class="form-control" id="tanaman" name="tanaman" placeholder="Pilih Nama Tanaman" required="required">
					</div>
					<div class="form-group">
						<label for="nama_penyakit">Nama Penyakit</label>
						<input type="text" name="nama_penyakit" class="form-control" placeholder="Masukkan Nama Penyakit" required="required">
					</div>
					<div class="form-group">
						<label for="kulturteknis">Kultur Teknis</label>
						<textarea class="form-control" name="kulturteknis"></textarea>
					</div>
					<div class="form-group">
						<label for="fisikmekanis">Fisik Mekanis</label>
						<textarea class="form-control" name="fisikmekanis"></textarea>
					</div>
					<div class="form-group">
						<label for="kimiawi">Kimiawi</label>
						<textarea class="form-control" name="kimiawi"></textarea>
					</div>
					<div class="form-group">
						<label for="hayati">Hayati</label>
						<textarea class="form-control" name="hayati"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>	
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@push('scriptku')
<script type="text/javascript">
    var penyakitTable = $('#penyakitTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('#penyakitTable').data('url'),
        columns: [
            { data: 'nama_penyakit', name:'nama_penyakit'},
            { data: 'action', name:'action'}
        ]
    });
</script>
@endpush