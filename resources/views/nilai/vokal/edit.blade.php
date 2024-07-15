@extends('template.appadmin')
@section('title', 'Edit Nilai')
@section('main')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
    <style>
        .form-edit {
            font-size: 14px;
            border-color: #ebedf2 !important;
        }

    </style>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                                <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Edit Nilai Vokal</h4>
                </div>
            </div>
                    <div class="card-body">
                        <form action="{{ route('vokal.update', $vokal->id) }}" method="POST" enctype="multipart/form-data"
                            style="font-size: 17px">

                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('siswa') is-invalid @enderror" name="siswa"
                                    value="{{ $vokal->no_induk }} - {{ $vokal->siswa->nama_siswa }}" placeholder="Masukkan" id="siswa" disabled="disabled">

                                <!-- error message untuk siswa -->
                                @error('siswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Penampilan</label>
                                <input type="text" class="form-control @error('penampilan') is-invalid @enderror" name="penampilan"
                                    value="{{ old('penampilan', $vokal->penampilan) }}" placeholder="Masukkan vokal Penampilan">

                                <!-- error message untuk penampilan -->
                                @error('penampilan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Teknik</label>
                                <input type="text" class="form-control @error('teknik') is-invalid @enderror" name="teknik"
                                    value="{{ old('teknik', $vokal->teknik) }}" placeholder="Masukkan Nilai Teknik">

                                <!-- error message untuk teknik -->
                                @error('teknik')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
