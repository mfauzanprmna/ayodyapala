@extends('template.app')
@section('main')
    <style>
        .pilih {
            transition: .5s;
        }

        .pilih:hover {
            transform: scale(1.03);
            transition: .5s;
            box-shadow: 9px 9px 5px 0 rgba(0, 0, 0, 0.03);
        }

    </style>

    <div class="page-inner mt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header rounded" style="background-image: linear-gradient(#7a74fc, #6C63FF) ">
                        <div class="page-inner py-5">
                            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                                <div>
                                    <h2 class="text-white pb-2 fw-bold" style="font-size: 30px">{{ $greetings }},
                                        {{ Auth::guard('siswa')->user()->nama_siswa }}</h2>
                                    <h5 class="text-white op-7 mb-2">Siswa</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt--2">
                    <div class="col-md-6">
                        <a href="/nilaipilihan" style="text-decoration:none; color:inherit;">
                            <div class="pilih card full-height" style="height: 100%">
                                <div class="card-body">
                                    <center>
                                        <div class="card-title">Nilai</div>
                                        <img src="{{ asset('Atlantis-Lite/assets/img/undraw_scrum_board_re_wk7v.svg') }}"
                                            class="card-img-top" alt="..." style="width: 200px ; height: 200px">
                                    </center>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/nilaipilihan" style="text-decoration:none; color:inherit;">
                            <div class="pilih card full-height" style="height: 100%">
                                <div class="card-body">
                                    <center>
                                        <div class="card-title">Absensi</div>
                                        <img src="{{ asset('Atlantis-Lite/assets/img/undraw_Image__folder_re_hgp7.svg') }}"
                                            class="card-img-top" alt="..." style="width: 200px ; height: 200px;">
                                    </center>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                {{-- <div class="card " style="height: 100%"> --}}
                <div class="card rounded " style="background-image: linear-gradient(#7a74fc, #6C63FF); height: 100%">

                    <center>

                        <br>
                        <br>

                        <img src="{{ asset(Auth::guard('siswa')->user()->foto) }}" alt="image profile"
                            class="avatar-img rounded" style="width: 200px; height: 200px; ">
                        <br>
                        <br>
                        <h1 class="card-title text-light" style="font-size: 30px">
                            <b>{{ Auth::guard('siswa')->user()->nama_siswa }}</b> </h1>

                        <br>
                        <table class="text-light" style="font-size: 17px">
                            <tr>
                                <td>No Induk</td>
                                <td>:</td>
                                <td>{{ Auth::guard('siswa')->user()->no_induk }}</td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td>:</td>
                                <td>{{ Auth::guard('siswa')->user()->semester }}</td>
                            </tr>
                        </table>
                        <br>
                        <br>
                        <button class="btn btn-light btn-sm " style="width: 200px">Edit Profile</button>
                    </center>
                </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
@endsection
