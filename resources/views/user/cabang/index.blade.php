@extends('template.appadmin')
@section('title', 'Table Cabang')
@section('main')
    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Cabang Ayodya</h4>
                </div>
            </div>
            <div class="card-body kekanan">
                <a href="{{ route('cabang.create') }}" class="btn btn-md btn-success mb-3">Tambah Cabang</a>
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead style="background: #7a74fc" class="text-white text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Id Cabang</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($cabang as $cab)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cab->singkatan }}</td>
                                    <td>{{ $cab->name }}</td>
                                    <td>
                                        <img src="{{ asset('/' . $cab->foto) }}" alt="" width="80px">
                                    </td>
                                    <td>{{ $cab->email }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('cabang.destroy', $cab->id) }}" method="POST">
                                            <a href="{{ route('cabang.edit', $cab->id) }}" class="btn btn-primary"><i
                                                    class="fas fa-edit"></i></a>
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
