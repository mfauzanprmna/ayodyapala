@extends('template.appadmin')
@section('title', 'Show' . $siswa->nama_siswa)
@section('main')

<div class="panel-header " style="background-image: linear-gradient(#7a74fc, #6C63FF);">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                
                <h2 class="text-white pb-2 fw-bold" style="font-size: 30px"><b>Data Detail Siswa </b></h2>
                <h5 class="text-white op-7 mb-2">halaman tampilan detail seiswa</h5>
                <br>
            </div>

        </div>
    </div>
</div>
<center>
    <div class="container-fluid mt--5">
        <div class="card border-0 shadow " style="border-radius: 15px;  width: 800px ;">
            <div class="card-body">
                    <center>
                        <div class="row">
                            <div class="col-lg-4 mt-3 mb-3">
                                <img src="{{ asset('/' . $siswa->foto) }}" alt="" style="width: 170px ; height: 170px; border-radius: 100%; ">
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                                    <h5 class="card-title"> <b>Data Siswa {{ $siswa->nama_siswa }}</b> </h5>
                                    <br>
                    
                                   <table>
                                        <tr>
                                            <td>No Induk</td>
                                            <td>:</td>
                                            <td>{{ $siswa->no_induk  }}</td>
                                        </tr>
                                        <tr>
                                            <td>Semester</td>
                                            <td>:</td>
                                            <td>{{ $siswa->semester  }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Tanggal Lahir</td>
                                            <td>:</td>
                                            <td> {{ $siswa->tanggal_lahir }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>{{ $siswa->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Cabang</td>
                                            <td>:</td>
                                            <td>{{ $siswa->cabang }}</td>
                                        </tr>
                                        </table>  
                                   
                                </div>
                            </div>
                          </div>
                    </div>
                    
                    </center>
                  
               
        </div>
    </div>
</center>
   
 
@endsection
