@extends('template.appadmin')
@section('title', 'Edit Nilai')
@section('main')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Nilai Sinopsis</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sinopsis.update', $sinopsi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                    name="nama_siswa" value="{{ $sinopsi->no_induk }} - {{ $sinopsi->siswa->nama_siswa }}"
                                    placeholder="Masukkan Nama Siswa" disabled="disabled">

                                <!-- error message untuk nama_siswa -->
                                @error('nama_siswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nilai</label>
                                <input type="text" class="form-control @error('nilai') is-invalid @enderror" name="nilai"
                                    value="{{ old('nilai', $sinopsi->nilai) }}" placeholder="Masukkan Nilai">

                                <!-- error message untuk nilai -->
                                @error('nilai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            {{-- <button type="reset" class="btn btn-md btn-warning">RESET</button> --}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
