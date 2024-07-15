<table id="multi-filter-select" class="display table table-striped table-hover">
    <thead style="background: #7a74fc" class="text-white text-center">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Semester</th>
            <th scope="col">Nilai Penampilan</th>
            <th scope="col">Nilai Teknik</th>
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
            </tr>
        @endforeach
    </tbody>
</table>
