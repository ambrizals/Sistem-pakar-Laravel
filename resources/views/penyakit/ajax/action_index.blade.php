<a href="{{ route('penyakit.show', $data->id) }}" class="btn btn-primary">Lihat Data</a>
<button type="button" class="btn btn-danger" onclick="hapusPenyakit({{ $data->id }})">Hapus Data</button>