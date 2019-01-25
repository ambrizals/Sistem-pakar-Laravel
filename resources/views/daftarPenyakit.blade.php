@extends('layouts.default')
@section('content')
<div class="card">
	<div class="card-header">
		Daftar Penyakit {{ $tanaman->nama }}
	</div>
	<div class="card-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th class="col-8">Nama Penyakit</th>
					<th class="col-4">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($penyakit as $penyakit)
				<tr>
					<td>{{ $penyakit->nama_penyakit }}</td>
					<td>
						<a href="{{ route('detail.penyakit',$penyakit->id) }}" class="btn btn-primary btn-block">Lihat Penyakit</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection