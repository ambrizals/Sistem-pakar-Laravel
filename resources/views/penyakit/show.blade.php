@extends('layouts.default')
@section('content')
<div class="card mb-5">
	<div class="card-header">
		{{ $item->nama_penyakit }}
	</div>
	<div class="card-body">
		@auth
		<form action="{{ route('penyakit.update', $item->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
		@endauth
			<div class="form-group">
				<label for="nama_penyakit">Nama Penyakit</label>
				<input type="text" name="nama_penyakit" class="form-control" value="{{ $item->nama_penyakit }}">
			</div>
			<div class="form-group">
				<label for="kulturteknis">Kultur Teknis</label>
				<textarea class="form-control" name="kulturteknis">{{ $item->kulturteknis }}</textarea>
			</div>
			<div class="form-group">
				<label for="fisikmekanis">Fisik Mekanis</label>
				<textarea class="form-control" name="fisikmekanis">{{ $item->fisikmekanis }}</textarea>
			</div>
			<div class="form-group">
				<label for="kimiawi">Kimiawi</label>
				<textarea class="form-control" name="kimiawi">{{ $item->kimiawi }}</textarea>
			</div>
			<div class="form-group">
				<label for="hayati">Hayati</label>
				<textarea class="form-control" name="hayati">{{ $item->hayati }}</textarea>
			</div>
			@auth
			<button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
		</form>
		@endauth
	</div>
	@auth
	<div class="card-footer" id="setGejala_penyakit">
		<form action="{{ route('penyakit.setgejala', $item->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('POST') }}
			<input type="hidden" name="tanaman" value="{{ $item->tanaman }}">
			<div class="row">
				<div class="col-4">	
					<select id="daerah_gejala" class="form-control" name="daerah_gejala">
						<option disabled="disabled" selected="selected">-- Pilih Daerah Gejala --</option>
						@foreach($daerahGejala as $daerahGejala)
						<option value="{{ $daerahGejala->id }}">{{ $daerahGejala->daerah_gejala }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-6">
					<input type="text" name="gejala" id="gejala" placeholder="Cari nama gejala" data-url="{{ route('penyakit.gejalaSuggest', $item->tanaman) }}" class="form-control">
				</div>
				<div class="col-2">
					<button type="submit" class="btn btn-primary btn-block">Tambah Gejala</button>
				</div>
			</div>
		</form>
	</div>
	@endauth
</div>

<div class="card">
	<div class="card-header">
		Daftar Gejala
	</div>
	<div class="card-body">
		<table class="table table-hover" id="gejalaList_penyakit" data-url="{{ route('penyakit.gejalalist', $item->id) }}" data-token="{{ csrf_token() }}" data-delete="{{ route('penyakit.index') }}">
			<thead>
				<tr>
					<th>Nama Gejala</th>
					<th>Daerah Gejala</th>
					<th>Aksi</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

@endsection
@push('scriptku')
<script type="text/javascript">
    var gejalaList_penyakit = $('#gejalaList_penyakit').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('#gejalaList_penyakit').data('url'),
        columns: [
            { data: 'gejala.nama_gejala', name:'gejala.nama_gejala'},
            { data: 'gejala.daerah_gejala.daerah_gejala', name: 'gejala.daerah_gejala.daerah_gejala' },
            { data: 'action', name:'action'}
        ]
    });	
</script>
@endpush