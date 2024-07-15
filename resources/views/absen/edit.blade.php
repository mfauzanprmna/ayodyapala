@extends('template.appadmin')
@section('main')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h1>Tambah Data absen</h1>
                    <hr>
                    <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Siswa</label>
                            <input type="text" class="form-control @error('siswa_id') is-invalid @enderror" name="siswa_id" value="{{ old('siswa_id', $absen->siswa_id) }}" placeholder="Masukkan No Induk">
                        
                            <!-- error message untuk siswa_id -->
                            @error('siswa_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">absen</label>
                            {{-- <input type="" class="form-control @error('absen') is-invalid @enderror" name="absen" value="{{ old('absen') }}" placeholder="Masukkan Nama absen"> --}}
                        <select name="absen" class="form-control">
                            {{-- @if (old('absen', $absen->absen) == $absen->absen)
                                <option value="{{ $absen->absen }}" selected>{{  $absen->absen }}</option>
                            @else --}}
                                <option value="hadir">hadir</option>
                                <option value="izin">izin</option>
                            {{-- @endif --}}
                        </select>
                            <!-- error message untuk absen -->
                            @error('absen')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan', $absen->keterangan) }}" placeholder="Masukkan keterangan Tanggal lahir">
                        
                            <!-- error message untuk keterangan -->
                            @error('keterangan')
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