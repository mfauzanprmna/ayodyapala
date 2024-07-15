<table id="multi-filter-select" class="display table table-striped table-hover">
    <thead style="background: #7a74fc" class="text-white text-center">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Semester</th>
            <th scope="col">Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sinopsis as $nilai)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $nilai->siswa->nama_siswa }}</td>
                <td>{{ $nilai->semester }}</td>
                <td>{{ $nilai->nilai }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
