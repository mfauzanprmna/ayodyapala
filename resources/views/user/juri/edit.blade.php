@extends('template.appadmin')
@section('title', 'Edit Juri')
@section('main')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Data Juri</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('juri.update', $juri->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="" class="font-wight-bold">Foto</label>
                                <div class="">
                                    <div class="input-file-image">
                                        <img class="img-upload-preview" width="100" height="100"
                                            src="{{ asset('/' . $juri->foto) }}" alt="preview"
                                            style="border-radius: 50%">
                                        <input type="file" class="form-control mt-2" name="foto">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama_juri') is-invalid @enderror" name="name"
                                    value="{{ old('name', $juri->name) }}" placeholder="Masukkan Nama">

                                <!-- error message untuk nama_juri -->
                                @error('nama_juri')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', $juri->email) }}" placeholder="Masukkan email">

                                <!-- error message untuk email -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="font-weight-bold">Password <small style="color: red">* Kosongkan jika
                                        tidak ingin mengubah password</small></label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            {{-- <button type="reset" class="btn btn-md btn-warning">RESET</button> --}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
