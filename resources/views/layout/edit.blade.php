@extends('template.appadmin')
@section('title', 'Edit Background')
@section('main')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Data Background</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('layout.update', $layout->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="">Upload Image <span class="required-label">*</span></label>
                                <div class="">
                                    <div class="input-file input-file-image">
                                        <img class="img-upload-preview" width="150" height="100"
                                            src="{{ asset('/' . $layout->background) }}" alt="preview">
                                        <input type="file" class="form-control form-control-file" id="uploadImg"
                                            name="background" accept="image/*" required>
                                        <label for="uploadImg" class="btn btn-primary btn-round btn-lg"><i
                                                class="fa fa-file-image"></i> Upload a Image</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kelas</label>
                                <input type="text" class="form-control @error('kelas') is-invalid @enderror"
                                    name="kelas" value="{{ old('kelas', $layout->kelas) }}"
                                    placeholder="Masukkan Judul no induk">

                                <!-- error message untuk kelas -->
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('layout.index') }}">
                                <button type="reset" class="btn btn-md btn-warning">Kembali</button>
                            </a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
