@extends('template.appadmin')
@section('main')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h1>Tambah Data Siswa</h1>
                        <hr>
                        <form action="{{ route('undian.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">nomor</label>
                                <input type="text" class="form-control @error('nomor') is-invalid @enderror"
                                    name="nomor" value="{{ old('nomor') }}" placeholder="Masukkan nomor">

                                <!-- error message untuk nomor -->
                                @error('nomor')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">siswa_id</label>
                                <input type="text" class="form-control @error('siswa_id') is-invalid @enderror"
                                    name="siswa_id" value="{{ old('siswa_id') }}" placeholder="Masukkan siswa_id">

                                <!-- error message untuk siswa_id -->
                                @error('siswa_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    value="{{ old('nama') }}" placeholder="Masukkan nama">

                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">daerah</label>
                                <input type="text" class="form-control @error('daerah') is-invalid @enderror" name="daerah"
                                    value="{{ old('daerah') }}" placeholder="Masukkan daerah">

                                <!-- error message untuk daerah -->
                                @error('daerah')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                          

                            




                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
