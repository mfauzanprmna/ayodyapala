@extends('template.appadmin')
@section('title', 'Edit Tari')
@section('main')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Data Tari</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tarian.update', $tarian->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    value="{{ old('nama', $tarian->nama) }}" placeholder="Masukkan Judul nama siswa">

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
                                    value="{{ old('daerah', $tarian->daerah) }}" placeholder="Masukkan Judul no induk">

                                <!-- error message untuk daerah -->
                                @error('daerah')
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
