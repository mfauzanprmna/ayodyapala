@extends('template.appadmin')
@section('title', 'Tabel Niali Vokal')
@section('main')
    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Nilai Vokal</h4>
                </div>
            </div>
            <div class="card-body kekanan">
                <a href="{{ route('vokal.create') }}" class="btn btn-md btn-success mb-3">Tambah Nilai
                    Musik</a>
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead style="background: #7a74fc" class="text-white text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Nilai Penampilan</th>
                                <th scope="col">Nilai Teknik</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilaivokals as $nilaivokal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $nilaivokal->siswa->nama_siswa }}</td>
                                    <td>{{ $nilaivokal->semester }}</td>
                                    <td>{{ $nilaivokal->penampilan }}</td>
                                    <td>{{ $nilaivokal->teknik }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('vokal.destroy', $nilaivokal->id) }}" method="POST">
                                            <a href="{{ route('vokal.edit', $nilaivokal->id) }}"
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
@endsection
