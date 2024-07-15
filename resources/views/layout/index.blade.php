@extends('template.appadmin')
@section('title', 'Layout')
@section('main')
    <div class="card-body">
        <ul class="nav nav-pills nav-secondary nav-pills-no-bd d-flex justify-content-center align-items-center"
            id="pills-tab-without-border" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill" href="#background" role="tab"
                    aria-controls="pills-home-nobd" aria-selected="true">Background</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-home-tab-nobd" data-toggle="pill" href="#layout" role="tab"
                    aria-controls="pills-layout-nobd" aria-selected="true">Layout</a>
            </li>
        </ul>
        <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
            <div class="tab-pane fade show active" id="background" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                <div class="container-fluid">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body kekanan">
                            <a href="{{ route('layout.create') }}" class="btn btn-md btn-success mb-3">Tambah
                                Background</a>
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover">
                                    <thead style="background: #7a74fc" class="text-white text-center">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Background</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($layouts as $layout)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td style="width: 50%">
                                                    <img src="{{ asset('/') . $layout->image }}" alt="" width="50%">
                                                </td>
                                                <td>{{ $layout->kelas }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('layout.destroy', $layout->id) }}" method="POST">
                                                        <a href="{{ route('layout.edit', $layout->id) }}"
                                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="layout" role="tabpanel" aria-labelledby="pills-layout-tab-nobd">
                <div class="container-fluid">
                    <div class="card border-0 shadow rounded">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Sertifikat</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('layout.serti') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Pengambilan Nilai</label>
                                    <input type="text" class="form-control @error('tanggal') is-invalid @enderror"
                                        name="tanggal" id="" value="{{ old('tanggal', $text->tanggal) }}">

                                    <!-- error message untuk kelas -->
                                    @error('tanggal')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Tempat Pengambilan Nilai</label>
                                    <input type="text" class="form-control @error('tempat') is-invalid @enderror"
                                        name="tanggal" id="" value="{{ $text->tempat }}">

                                    <!-- error message untuk kelas -->
                                    @error('tempat')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-primary">Simpan</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
