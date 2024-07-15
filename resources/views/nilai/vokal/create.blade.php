@extends('template.appadmin')
@section('title', 'Create Nilai')
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
        <form action="{{ route('vokal.store') }}" method="POST" enctype="multipart/form-data" style="font-size: 17px">

            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Nilai Vokal</h4>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags"
                                    value="{{ old('tags') }}" placeholder="Masukkan" id="tags">

                                <!-- error message untuk tags -->
                                @error('tags')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No Induk</label>
                                <input type="text" class="form-control @error('no_induk') is-invalid @enderror" name="no_induk"
                                    value="{{ old('no_induk') }}" placeholder="Masukkan" id="induk">

                                <!-- error message untuk induk -->
                                @error('no_induk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Semester</label>
                                <input type="number" class="form-control @error('semester') is-invalid @enderror"
                                    name="semester" value="{{ old('semester') }}" placeholder="Masukkan" id="semester">

                                <!-- error message untuk semester -->
                                @error('semester')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            @if (Auth::user()->role == 'juri')
                                <div class="form-group">
                                    <label class="font-weight-bold">Penampilan</label>
                                    <input type="text" class="form-control @error('penampilan') is-invalid @enderror"
                                        name="penampilan" value="{{ old('penampilan') }}"
                                        placeholder="Masukkan Nilai Penampilan">

                                    <!-- error message untuk penampilan -->
                                    @error('penampilan')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Teknik</label>
                                    <input type="text" class="form-control @error('teknik') is-invalid @enderror"
                                        name="teknik" value="{{ old('teknik') }}" placeholder="Masukkan Nilai Teknik">

                                    <!-- error message untuk teknik -->
                                    @error('teknik')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-md btn-warning">Reset</button>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->role == 'admin')
                @foreach ($juris as $key => $juri)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 shadow rounded">
                                <div class="card-body">
                                    <h3>{{ $juri->name }}</h3>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Penampilan</label>
                                        <input type="text"
                                            class="form-control @error('penampilan{{ $key }}') is-invalid @enderror"
                                            name="penampilan{{ $key }}" value="{{ old('penampilan' . $key) }}"
                                            placeholder="Masukkan Nilai Penampilan">

                                        <!-- error message untuk penampilan -->
                                        @error('penampilan{{ $key }}')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Teknik</label>
                                        <input type="text"
                                            class="form-control @error('teknik{{ $key }}') is-invalid @enderror"
                                            name="teknik{{ $key }}" value="{{ old('teknik' . $key) }}"
                                            placeholder="Masukkan Nilai Teknik">

                                        <!-- error message untuk teknik -->
                                        @error('teknik{{ $key }}')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    @if ($loop->last)
                                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-md btn-warning">Reset</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </form>
    </div>

    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $("#tags").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('getsiswa') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term,
                            kelas: '2'
                        },
                        success: function(data) {
                            response(data);
                            console.log(data);
                        }
                    });
                },
                select: function(event, ui) {

                    $('#tags').val(ui.item.label);
                    $('#nama').val(ui.item.label);
                    $('#induk').val(ui.item.id);
                    $('#semester').val(ui.item.semester);
                    return false;
                }
            });
        });
    </script>

@endsection
