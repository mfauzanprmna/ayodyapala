@extends('template.appadmin')
@section('main')

    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-body kekanan">
                <a href="{{ route('undian.create') }}" class="btn btn-md btn-success mb-3">Tambah undian</a>
                <table class="display table table-striped table-hover">
                    <thead style="background: #7a74fc" class="text-white text-center">
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Siswa</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Daerah</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($undians as $undian)
                            <tr>
                                
                                <td>{{ $undian->nomor }}</td>
                                <td>{{ $undian->siswa_id }}</td>
                                <td>{{ $undian->nama }}</td>
                                <td>{{ $undian->daerah }}</td>
                           

                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('undian.destroy', $undian->id) }}" method="POST">
                                        <a href="{{ route('undian.edit', $undian->id) }}"
                                            class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data undian belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </thead>
                {{ $undians->links() }}
            </div>
        </div>
    </div>

@endsection
