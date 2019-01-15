@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="row">
			<div class="col-md-8">
				<p class="lead">Tanaman</p>
			</div>
			<div class="col-md-4">
				<button type="button" data-toggle="modal" data-target="#tambahTanaman" class="btn btn-primary btn-block">Tambah Tanaman</button>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover" id="tanamanTable" data-token="{{ csrf_token() }}">
				<thead>
					<tr>
						<th class="col-1">ID</th>
						<th class="col-6">Nama Tanaman</th>
						<th class="col-5">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@if($tanaman->count() > 0)

					@foreach($tanaman as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->nama }}</td>
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubahTanaman" data-id="{{ $item->id }}">Ubah Tanaman</button>
							<button type="button" class="btn btn-danger" onclick="hapusTanaman({{ $item->id }})">Hapus Tanaman</button>
						</td>
					</tr>
					@endforeach

					@else
					<tr>
						<td colspan="3">Tidak ada data yang tersimpan</td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="tambahTanaman">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Tanaman</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<form action="{{ route('tanaman.store') }}" method="POST">
				{!! csrf_field() !!}
				{!! method_field('POST') !!}
				<div class="modal-body">
					<div class="form-group">
						<label for="nama">Nama Tanaman :</label>
						<input name="nama" type="text" class="form-control" placeholder="Masukkan Nama Tanaman" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="ubahTanaman">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Tanaman</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<form action="{{ route('tanaman.store') }}" method="POST">
				{!! csrf_field() !!}
				{!! method_field('PUT') !!}
				<div class="modal-body">
					<div class="form-group">
						<label for="nama">Nama Tanaman :</label>
						<input name="nama" type="text" id="tanaman" class="form-control" placeholder="Masukkan Nama Tanaman" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
@endsection