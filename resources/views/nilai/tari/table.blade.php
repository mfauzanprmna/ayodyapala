<table id="multi-filter-select" class="display table table-striped table-hover">
    <thead style="background: #7a74fc" class="text-white text-center">
        @if (request()->is('nilai_export'))
            <tr>
                <th colspan="6" style="text-align: center">Data Nilai Tari Siswa Ayodya Pala</th>
            </tr>
        @endif
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Jenis Tari</th>
            <th scope="col">Wirama</th>
            <th scope="col">Wiraga</th>
            <th scope="col">Wirasa</th>
            @if (request()->is('admin/nilai'))
                <th scope="col">Aksi</th>
            @endif

        </tr>
    </thead>
    <tbody>
        @foreach ($nilais as $nilai)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $nilai->siswa->nama_siswa }}</td>
                <td>{{ $nilai->tari->nama }}</td>
                <td>{{ $nilai->wirama }}</td>
                <td>{{ $nilai->wiraga }}</td>
                <td>{{ $nilai->wirasa }}</td>
                @if (request()->is('admin/nilai'))
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('nilai.destroy', $nilai->id) }}" method="POST">
                            <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-primary"><i
                                    class="fas fa-edit"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
