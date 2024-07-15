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
                    <div class="card-body">
                        <form action="{{ route('nilai.update', $nilai->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                    name="nama_siswa" value="{{ $nilai->no_induk }} - {{ $nilai->siswa->nama_siswa }}"
                                    placeholder="Masukkan Nama Siswa" disabled>

                                <!-- error message untuk nama_siswa -->
                                @error('nama_siswa')
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
                                @error('tari')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Wirama</label>
                                <input type="text" class="form-control @error('wirama') is-invalid @enderror" name="wirama"
                                    value="{{ old('wirama', $nilai->wirama) }}" placeholder="Masukkan Nilai Wirama">

                                <!-- error message untuk wirama -->
                                @error('wirama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Wiraga</label>
                                <input type="text" class="form-control @error('wiraga') is-invalid @enderror" name="wiraga"
                                    value="{{ old('wiraga', $nilai->wiraga) }}" placeholder="Masukkan Nilai Wiraga">

                                <!-- error message untuk wiraga -->
                                @error('wiraga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Wirasa</label>
                                <input type="text" class="form-control @error('wirasa') is-invalid @enderror" name="wirasa"
                                    value="{{ old('wirasa', $nilai->wirasa) }}" placeholder="Masukkan Nilai Wirasa">

                                <!-- error message untuk wirasa -->
                                @error('wirasa')
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

    <script>
        $(document).ready(function() {
            $('#tari').select2({
                placeholder: '{{ $nilai->tari->nama }}',
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
    </script>

@endsection
