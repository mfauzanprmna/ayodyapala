@extends('template.appadmin')
@section('title', 'Table Siswa')
@section('main')

    <div class="container-fluid mt-5">
        <ul class="nav nav-pills nav-secondary nav-pills-no-bd d-flex justify-content-center align-items-center mb-3"
            id="pills-tab-without-border" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-all-tab-nobd" data-toggle="pill" href="#pills-all-nobd" role="tab"
                    aria-controls="pills-all-nobd" aria-selected="true">All</a>
            </li>
            @foreach ($kelas as $item)
                <li class="nav-item">
                    <a class="nav-link" id="pills-{{ $item->id }}-tab-nobd" data-toggle="pill"
                        href="#pills-{{ $item->id }}-nobd" role="tab" aria-controls="pills-{{ $item->id }}-nobd"
                        aria-selected="true">{{ $item->kelas }}</a>
                </li>
            @endforeach
        </ul>
        <div class="card border-0 shadow rounded">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Siswa Ayodya</h4>
                </div>
            </div>
            <div class="card-body kekanan">
                <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                    <div class="tab-pane fade show active" id="pills-all-nobd" role="tabpanel"
                        aria-labelledby="pills-all-tab-nobd">
                        <div class="mb-3 d-flex justify-content-between">
                            <a href="{{ route('siswa.create') }}" class="btn btn-md btn-success">Tambah Siswa</a>
                            <div>
                                <button type="button" class="btn btn-primary">
                                    Export Excel
                                </button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Import Excel
                                </button>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Import File</h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                    <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="form-group" style="max-width: 500px; margin: 0 auto;">
                                                <label for="">Kelas</label>
                                                <select class="form-control @error('kelas') is-invalid @enderror"
                                                    name="kelas">
                                                    <option value="">
                                                        <--- Pilih Kelas --->
                                                    </option>
                                                    @foreach ($kelas as $item)
                                                        <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                                <label for="">File Data Siswa ( Excel )</label>
                                                <input type="file" name="file" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-primary">Import data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead style="background: #7a74fc" class="text-white text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">No Induk</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Cabang</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswas as $siswa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('/' . $siswa->foto) }}" alt="" width="80px">
                                            </td>
                                            <td>{{ $siswa->no_induk }}</td>
                                            <td>{{ $siswa->nama_siswa }}</td>
                                            <td>{{ $siswa->semester }}</td>
                                            <td>{{ $siswa->tempat->name }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                                    <a href="{{ route('siswa.show', $siswa->id) }}"
                                                        class="btn btn-success"><i class="fas fa-info-circle"></i></a>
                                                    <a href="{{ route('siswa.edit', $siswa->id) }}"
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
                    @foreach ($kelas as $item)
                        <div class="tab-pane fade" id="pills-{{ $item->id }}-nobd" role="tabpanel"
                            aria-labelledby="pills-{{ $item->id }}-tab-nobd">
                            <div class="table-responsive">
                                <table class="siswa display table table-striped table-hover">
                                    <thead style="background: #7a74fc" class="text-white text-center">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">No Induk</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Semester</th>
                                            <th scope="col">Cabang</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswas as $sis)
                                            @if ($sis->kelas == $item->id)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-center">
                                                        <img src="{{ asset('/' . $sis->foto) }}" alt="" width="80px">
                                                    </td>
                                                    <td>{{ $sis->no_induk }}</td>
                                                    <td>{{ $sis->nama_siswa }}</td>
                                                    <td>{{ $sis->semester }}</td>
                                                    <td>{{ $sis->tempat->name }}</td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('siswa.destroy', $sis->id) }}"
                                                            method="POST">
                                                            <a href="{{ route('siswa.show', $sis->id) }}"
                                                                class="btn btn-success"><i
                                                                    class="fas fa-info-circle"></i></a>
                                                            <a href="{{ route('siswa.edit', $sis->id) }}"
                                                                class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jquery')
    <script>
        $(document).ready(function() {
            $('.siswa').DataTable({
                "pageLength": 5,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-control"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });
                    });
                }
            });
        });
    </script>
@endsection
