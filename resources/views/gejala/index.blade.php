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
				<button type="button" data-toggle="modal" data-target="#tambahGejala" class="btn btn-primary btn-block">Tambah Gejala</button>
			</div>
		</div>
		<hr>
		<table data-url="{{ route('gejala.list') }}" data-token="{{ csrf_token() }}" id="gejalaTable" cellspacing="0">
			<thead>
				<tr>
					<th class="col-4">Nama Gejala</th>
					<th class="col-2">Tanaman</th>
					<th class="col-2">Daerah Gejala</th>
					<th class="col-4">Aksi</th>
				</tr>
			</thead>

		</table>

	</div>
</div>
<div class="modal fade" id="tambahGejala">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Gejala</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<form action="{{ route('gejala.store') }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('POST') }}
				<div class="modal-body">
					<div class="form-group">
						<label for="tanaman">Tanaman</label>
						{{ Form::select('tanaman', $tanaman,null, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<label for="nama_gejala">Nama Gejala</label>
						<input type="text" name="nama_gejala" class="form-control" placeholder="Masukkan Nama Gejala" required="required">
					</div>
					<div class="form-group">
						<label for="daerah_gejala">Daerah Gejala</label>
						{{ Form::select('daerah_gejala', $daerahGejala, null, ['class' => 'form-control']) }}
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
<div class="modal fade" id="ubahGejala">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Gejala</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<form action="{{ route('gejala.store') }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('POST') }}
				<div class="modal-body">
					<div class="form-group">
						<label for="tanaman">Tanaman</label>
						{{ Form::select('tanaman', $tanaman,null, ['class' => 'form-control', 'id' => 'tanaman']) }}
					</div>
					<div class="form-group">
						<label for="nama_gejala">Nama Gejala</label>
						<input type="text" name="nama_gejala" class="form-control" placeholder="Masukkan Nama Gejala" required="required" id="nama_gejala">
					</div>
					<div class="form-group">
						<label for="daerah_gejala">Daerah Gejala</label>
						{{ Form::select('daerah_gejala', $daerahGejala, null, ['class' => 'form-control', 'id' => 'daerah_gejala']) }}
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
    var gejalaTable = $('#gejalaTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('#gejalaTable').data('url'),
        columns: [
            { data: 'nama_gejala', name:'nama_gejala'},
            { data: 'tanaman.nama', name: 'tanaman.nama' },
            { data: 'daerah_gejala.daerah_gejala', name: 'daerah_gejala.daerah_gejala' },
            { data: 'action', name:'action'}
        ]
    });
</script>
@endpush