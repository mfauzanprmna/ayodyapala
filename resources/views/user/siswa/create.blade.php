@extends('template.appadmin')
@section('title', 'Create Siswa')
@section('main')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Data Siswa Ayodya</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">No Induk</label>
                                <input type="text" class="form-control @error('no_induk') is-invalid @enderror"
                                    name="no_induk" value="{{ old('no_induk') }}" placeholder="Masukkan No Induk">

                                <!-- error message untuk no_induk -->
                                @error('no_induk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                    name="nama_siswa" value="{{ old('nama_siswa') }}" placeholder="Masukkan Nama Siswa">

                                <!-- error message untuk nama_siswa -->
                                @error('nama_siswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tempat, Tanggal Lahir</label>
                                <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    id="datepicker" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                    placeholder="Masukkan Tanggal lahir">

                                <!-- error message untuk tanggal_lahir -->
                                @error('tanggal_lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Orang Tua</label>
                                <input type="text" class="form-control @error('orang_tua') is-invalid @enderror"
                                    name="orang_tua" value="{{ old('orang_tua') }}"
                                    placeholder="Masukkan Nama Orang Tua Siswa">

                                <!-- error message untuk orang_tua -->
                                @error('orang_tua')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                    value="{{ old('alamat') }}" placeholder="Masukkan Alamat">

                                <!-- error message untuk alamat -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Cabang</label>
                                <select class="form-control @error('cabang') is-invalid @enderror" name="cabang">
                                    @foreach ($cabang as $item)
                                        <option value="{{ $item->singkatan }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                <!-- error message untuk cabang -->
                                @error('cabang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kelas</label>
                                <select class="form-control @error('kelas') is-invalid @enderror" name="kelas">
                                    <option value=""><--- Pilih Kelas ---></option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                    @endforeach
                                </select>

                                <!-- error message untuk kelas -->
                                @error('kelas')
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
