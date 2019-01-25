@extends('layouts.default')
@section('content')
	<div class="card">
		<div class="card-header">
			Diagnosa Penyakit Pada Tanaman : {{ $tanaman->nama }}
		</div>
		<div class="card-body">
			<form action="{{ route('diagnosa.start', $tanaman->id) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('POST') }}
				@foreach($daerahGejala as $daerahGejala)
				@if($daerahGejala->gejala->count() > 0)
					<p class="lead">{{ $daerahGejala->daerah_gejala }}</p>
					@foreach($daerahGejala->gejala as $gejala)
					<div class="form-group form-check">
					{!! Form::checkbox('gejala[]', $gejala->id, false, ['class' => 'form-check-input']) !!}
					<label for="daerah_gejala" class="form-check-label">{{ $gejala->nama_gejala }}</label>
					</div>
					@endforeach
				@endif
				@endforeach
				<button type="submit" class="btn btn-block btn-primary">Diagnosa</button>
			</form>
		</div>
	</div>
@endsection