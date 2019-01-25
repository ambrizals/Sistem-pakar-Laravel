@extends('layouts.default')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pengenalan Sistem Pakar Diagnosa Penyakit Tanaman</div>
                <div class="card-body">
                    <p>Di Indonesia tanaman bawang dan cabai adalah salah satu jenis tanaman hortikultura yang secara luas dibudidayakan. Akan tetapi, jika dilihat dari hasil panen yang dihasilkan masih belum memuaskan. Hal ini disebabkan oleh berbagai faktor, diantaranya yaitu teknik budidaya, kondisi lingkungan dan hama penyakit. Dari ketiga faktor, faktor yang paling bermasalah sampai saat ini adalah hama dan penyakit.Masalahnya sering ditemui bahwa petani yang minim akan pengetahuaan mengenai penyakit yang menyerang tanaman mereka, ditambah lagi keterbatasan seorang ahli kadang-kadang menjadi kendala bagi petani yang akan melakukan konsultasi untuk menyelesaikan masalah dan mendapatkan solusi terbaik. Diharapka sistem pakar simulasi diagnosa hama dan penyakit tanaman bawang dan cabai dibuat bertujuan untuk sebagai sarana konsultasi, sarana belajar di suatu instansi dan dapat digunakan sebagai alat yang digunakan untuk mendiagnosa dan mensosialisasikan jenis hama dan penyakit.</p>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-8">Nama Tanaman</th>
                        <th class="col-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tanaman as $tanaman)
                    <tr>
                        <td>{{ $tanaman->nama }}</td>
                        <td>
                            <a href="{{ route('diagnosa.preform', $tanaman->id) }}" class="btn btn-success">Diagnosa Penyakit</a>
                            <a href="{{ route('daftar.penyakit', $tanaman->id) }}" class="btn btn-primary">Daftar Penyakit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
