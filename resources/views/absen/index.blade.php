@extends('template.appadmin')
@section('main')

    <div class="container mt-5">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('absen.create') }}" class="btn btn-md btn-success mb-3">TAMBAH ABSEN</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">nama siswa</th>
                                <th scope="col">absen</th>
                                <th scope="col">keterangan</th>
                                <th scope="col">hari</th>
                                <th scope="col">tanggal</th>
                                <th scope="col">bulan</th>
                                <th scope="col">tahun</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($absens as $absen)
                                <tr>
                                    
                                        <td>{{ $absen->siswa_id }}</td>
                                        <td>{{ $absen->absen }}</td>
                                        <td>{{ $absen->keterangan }}</td>
                                        <td>{{ $absen->hari }}</td>
                                        <td>{{ $absen->tanggal }}</td>
                                        <td>{{ $absen->bulan }}</td>
                                        <td>{{ $absen->tahun }}</td>

                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('absen.destroy', $absen->id) }}" method="POST">
                                            <a href="{{ route('absen.edit', $absen->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data absen belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $absens->links() }}
                    </div>
                </div>
    </div>
    
    @endsection