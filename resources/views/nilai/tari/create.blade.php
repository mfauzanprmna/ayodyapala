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
        <a href="/admin/nilai" class="col-12" style="font-size: 17px;"><i class="fas fa-angle-double-left"></i>
            Kembali</a>
        <form action="{{ route('nilai.store') }}" method="POST" enctype="multipart/form-data" style="font-size: 17px">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Nilai Tari</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <label class="font-weight-bold"><h2>Tambah Nilai Tari</h2></label> --}}


                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags"
                                    value="{{ old('tags') }}" placeholder="Masukkan Nama" id="tags">

                                <!-- error message untuk tags -->
                                @error('tags')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No Induk</label>
                                <input type="text" class="form-control @error('induk') is-invalid @enderror" name="induk"
                                    value="{{ old('induk') }}" placeholder="Masukkan Nomor Induk" id="induk">

                                <!-- error message untuk induk -->
                                @error('induk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Semester</label>
                                <input type="text" class="form-control @error('semester') is-invalid @enderror"
                                    name="semester" value="{{ old('semester') }}" placeholder="Masukkan Semester"
                                    id="semester">

                                <!-- error message untuk semester -->
                                @error('semester')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tari</label>
                                <select name="tari" id="tari" style="width: 100%;"
                                    class="form-control form-control @error('wirama') is-invalid @enderror"></select>

                                <!-- error message untuk wirama -->
                                @error('wirama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @if (Auth::user()->role == 'juri')
                                <div class="form-group">
                                    <label class="font-weight-bold">Wirama </label>
                                    <input type="text" class="form-control @error('wirama') is-invalid @enderror"
                                        name="wirama" value="{{ old('wirama') }}" placeholder="Masukkan Nilai Wirama">

                                    <!-- error message untuk wirama -->
                                    @error('wirama')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Wiraga</label>
                                    <input type="text" class="form-control @error('wiraga') is-invalid @enderror"
                                        name="wiraga" value="{{ old('wiraga') }}" placeholder="Masukkan Nilai Wiraga">

                                    <!-- error message untuk wiraga -->
                                    @error('wiraga')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Wirasa</label>
                                    <input type="text" class="form-control @error('wirasa') is-invalid @enderror"
                                        name="wirasa" value="{{ old('wirasa') }}" placeholder="Masukkan Nilai Wirasa">

                                    <!-- error message untuk wirasa -->
                                    @error('wirasa')
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
                                        <label class="font-weight-bold">Wirama</label>
                                        <input type="text"
                                            class="form-control @error('wirama{{ $key }}') is-invalid @enderror"
                                            name="wirama{{ $key }}" value="{{ old('wirama' . $key) }}"
                                            placeholder="Masukkan Nilai Wirama">

                                        <!-- error message untuk wirama -->
                                        @error('wirama' . $key)
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Wiraga</label>
                                        <input type="text"
                                            class="form-control @error('wiraga{{ $key }}') is-invalid @enderror"
                                            name="wiraga{{ $key }}" value="{{ old('wiraga' . $key) }}"
                                            placeholder="Masukkan Nilai Wiraga">

                                        <!-- error message untuk wiraga -->
                                        @error('wiraga' . $key)
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Wirasa</label>
                                        <input type="text"
                                            class="form-control @error('wirasa{{ $key }}') is-invalid @enderror"
                                            name="wirasa{{ $key }}" value="{{ old('wirasa' . $key) }}"
                                            placeholder="Masukkan Nilai Wirasa">

                                        <!-- error message untuk wirasa -->
                                        @error('wirasa' . $key)
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
        $(document).ready(function() {
            $('#tari').select2({
                placeholder: 'Tarian',
                width: 'resolve',
                theme: 'bootstrap-5',
                selectionCssClass: 'form-edit',
                ajax: {
                    url: "{{ route('browse-tari') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        var query = {
                            q: params.term,
                            type: 'query'
                            //tambahkan parameter lainnya di sini jika ada
                        }
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama + ' - ' + item.daerah,
                                    id: item.id,
                                }
                            })
                        };
                    }
                }
            });
        });

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
                            search: request.term
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
