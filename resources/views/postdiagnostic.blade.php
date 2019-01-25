@extends('layouts.default')
@section('content')
<div class="card">
	<div class="card-header">
		Hasil Diagnosa
	</div>
	<div class="card-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th class="col-6">Nama Penyakit</th>
					<th class="col-4">Presentasi Terindikasi</th>
					<th class="col-2">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($diagnosa as $diagnosa)
				<tr>
					<td>{{ $diagnosa['nama_penyakit'] }}</td>
					<td>{{ $diagnosa['skor'] }}%</td>
					<td>
						<a href="{{ route('detail.penyakit',$diagnosa['id_penyakit']) }}" class="btn btn-primary">Lihat Penyakit</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection