@extends('template.appadmin')
@section('title', 'Sertifikat')
@section('jquery')
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $("#tags").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('sertifikat.getSertifikat') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // console.log(ui.item.data);
                    var tempat = ui.item.ttl;
                    var convert = tempat.split(",");

                    var ttl = convert[1];
                    var bulan = ttl.split(" ")[2];
                    var date = new Date(ttl);
                    var tanggal = date.getDate();
                    var tahun = date.getFullYear();

                    var semester = ui.item.semester;
                    var ang = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan',
                        'sembilan', 'sepuluh', 'sebelas'
                    ];
                    var tbr;

                    if (semester < 12) {
                        tbr = ang[semester];
                    } else if (semester < 20) {
                        tbr = ang[semester - 10] + " belas";
                    } else if (semester < 100) {
                        tbr = ang[Math.floor(semester / 10)] + " puluh " + ang[semester % 10];
                    }
                    // console.log(ui.item.tari);

                    $('#tags').val(ui.item.label);
                    $('.nama').html(ui.item.nama);
                    $('#induk').html(ui.item.no_induk);
                    $('#tempat').html(convert[0]);
                    $('#cabang').html(ui.item.cabang);
                    $('#ortu').html(ui.item.ortu);
                    $('#tanggal').html(tanggal);
                    $('#bulan').html(bulan);
                    $('#tahun').html(tahun);
                    $('.semester').html(semester);
                    $('#huruf').html(tbr);
                    $('#tari').html(ui.item.tarian);
                    $('#cabang').html(ui.item.cabang);
                    $('.ujian').html(ui.item.index + 1);
                    $('#foto').attr("src", '{{ asset('/') }}' + ui.item.foto);
                    $('#background').attr("src", '{{ asset('/') }}' + ui.item.kelas.image);
                    $('#kelas').html(ui.item.kelas.kelas);
                    $('#printserti').attr("href", '/sertifikat/' + ui.item.id );
                    $('#printnilai').attr("href", '/nilai/' + ui.item.id);
                    return false;
                }
            });

        });

        var tanggal = document.querySelector('#lenggara').value;
        var pengambilan = document.querySelector('#pengambilan');

        pengambilan.innerHTML = tanggal;


        var date2 = new Date();
        var tgl = date2.getMonth();
        var romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        var tr = romawi[tgl];

        $('#ini').html(tr);

    </script>
@endsection
@section('main')
    <link href="https://www.dafontfree.net/embed/ZXJhcy1kZW1pLWl0Yy1yZWd1bGFyJmRhdGEvMTMvZS82NDc3MS9FUkFTREVNSS5UVEY"
        rel="stylesheet" type="text/css" />
    <style>
        .A3 {
            box-shadow: 2px 2px 10px 1px rgba(0, 0, 0, 0.10);
            background-color: white;
        }

        p.ttd {
            line-height: 1;
        }

        .ui-autocomplete {
            max-height: 100px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
        }

        /* IE 6 doesn't support max-height
       * we use height instead, but this forces the menu to always be this tall
       */
        * html .ui-autocomplete {
            height: 100px;
        }

    </style>
    <div class="container mt-4 mb-5">
        <div class="ui-widget ">
            <div class="row">
                <div class="col">
                    <label for="tags">Siswa</label>
                    <input id="tags" class="form-control" name="tags">
                </div>
            </div>

        </div>
        {{-- <div class="form-group">
            <label for="">Nama Siswa</label>
            <select class="form-control" name="" id="">
                <option>tes</option>
                <option>tes</option>
                <option>tes</option>
            </select>
        </div> --}}
        <div class="mt-4">
            <div>
                <a href="" id="printserti" target="_blank"><button type="submit" class="btn btn-info">Print</button></a>
            </div>


            <div class="A3 fw-bold mt-3">
                {{-- <div  style="background-image: url('{{ asset('image/layout1.png') }}') ; background-size: 500px 250px;   background-position: left;
                background-repeat: no-repeat;
                position: relative;"></div> --}}

                <div class="row">


                    <div class="col-md-4" style="float: left; width:800px">
                        <div class="fotobaground">
                            <img id="background" src="" alt="" style=" width: 500px ;  
                                            position: absolute; top: 30%">
                        </div>
                    </div>
                    <div class="col-8 mt-5" style="text-align: ">
                        <center>
                            <h3 style="font-family: 'eras-demi-itc-bold', sans-serif"> No: <span
                                    class="ujian">__</span> / YAP / <span id="ini"></span>
                                /
                                {{ Carbon\Carbon::now()->isoFormat('YYYY') }} </h3>
                            <p style="font-family: 'eras-demi-itc-bold', sans-serif">Diberikan Kepada:</p>
                            <h1 style="font-family: Edwardian Script ITC; font-size: 50px; margin: -10px 0"
                                class="nama">Nama Siswa
                            </h1>

                            <p style="font-family: 'eras-demi-itc-bold', sans-serif"> Dilahirkan di <span
                                    id="tempat">__</span>, pada tanggal <span id="tanggal">__</span>,
                                bulan <span id="bulan">__</span>, tahun <span id="tahun">__</span>
                                <br> Anak dari <span id="ortu">__</span>
                            </p>
                            <h1 style="font-family: Pristina; font-size: 50px; margin: -10px 0">Lulus</h1>

                            <p style="font-family: 'eras-demi-itc-bold', sans-serif" class="desc">Pada ujian
                                <span id="kelas">__</span> di semester terpadu ke - <span class="semester">__</span> ( <span
                                    id="huruf">___</span> )
                                <br>yang diselenggarakan pada tanggal {{ $layout->tanggal }}
                                <br>di {{ $layout->tempat }}
                                <br>dan tercatat sebagai siswa Ayodya Pala - <span id="cabang"></span>
                                <br>dengan nomor induk : <span id="induk">__</span>
                            </p>


                        </center>
                        <div class="container d-flex justify-content-between mb-3">
                            <div class="foto">
                                <img src="{{ asset('/image/default.png') }}" alt="" id="foto" width="110px" height="150px"
                                    style="border-radius: 100%">
                            </div>
                            <div style="margin-left: 0; text-align: center;" class="mt-2">
                                <p class="ttd">Depok, {{ Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}
                                    <br>Pimpinan
                                </p>
                                <br>
                                <br>
                                <p>Dra. Budi Agustinah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div>
                <a href="" id="printnilai" target="_blank"><button type="submit" class="btn btn-info">Print</button></a>
            </div>
            <div class="container A3 mt-3">
                <br>
                <img src="" alt="">
                <div>
                    <h2 class="text-center ">DAFTAR NILAI UJIAN</h2>
                </div>
                <table style="margin-left: 100px">
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td class="nama">__</td>
                    </tr>
                    <tr>
                        <th>No.Ujian</th>
                        <td>:</td>
                        <td class="ujian">__</td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td>:</td>
                        <td class="semester">__</td>
                    </tr>
                </table>
                <br>
                <center>
                    <table border='1' style="text-align: center; width: 100%; height:150px" class="mt-3 mb-3">
                        <tr>
                            <th colspan="2">MATERI UJIAN</th>
                            <th colspan="5">NILAI</th>
                        </tr>

                        <tr>
                            <th>DARI DAERAH</th>
                            <th>NAMA TARIAN </th>
                            <th>Wirawa</th>
                            <th>Wiraga</th>
                            <th>Wirasa</th>
                            <th>Subtotal</th>
                            <th>TOTAL</th>
                        </tr>
                        <tr>
                            <td id="daerah"></td>
                            <td id="tari"></td>
                            <td id="wirawa">0</td>
                            <td id="wiraga">0</td>
                            <td id="wirasa">0</td>
                            <td id="subtotal">0</td>
                            <th id="total" rowspan="2">0</th>
                        </tr>
                        <tr>
                            <td id="daerah1"></td>
                            <td id="tari1"></td>
                            <td id="wirawa1">0</td>
                            <td id="wiraga1">0</td>
                            <td id="wirasa1">0</td>
                            <td id="subtotal1">0</td>
                        </tr>
                        {{-- <tr>
                            <th colspan="2">Undian</th>
                            <td>233</td>
                            <td>23</td>
                            <td>232</td>
                            <th colspan="2">232</th>
                        </tr> --}}
                        <tr>
                            <th colspan="2">Sinopsis</th>
                            <th colspan="5">00</th>
                        </tr>
                    </table>
                </center>
                <br>
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">KETERANGAN</h5>
                        <tr>
                            <td>A</td>
                            <td>(Amanat Baik)</td>
                            <td>=</td>
                            <td>80</td>
                            <td>-</td>
                            <td>90</td>
                        </tr>
                        <br>
                        <tr>
                            <td>B</td>
                            <td>(Baik)</td>
                            <td>=</td>
                            <td>80</td>
                            <td>-</td>
                            <td>90</td>
                        </tr>
                        <br>
                        <tr>
                            <td>C</td>
                            <td>(Cukup)</td>
                            <td>=</td>
                            <td>80</td>
                            <td>-</td>
                            <td>90</td>
                        </tr>
                        <br>
                        <tr>
                            <td>D</td>
                            <td>(Kurang)</td>
                            <td>=</td>
                            <td>80</td>
                            <td>-</td>
                            <td>90</td>
                        </tr>

                    </div>
                    <center>
                        <div class="col">
                            <tr>
                                <td>Depok, {{ Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}</td>
                            </tr>
                            <br>
                            <tr>
                                <td>Ketua Litbang</td>
                            </tr>
                            <br>
                            <br>
                            <tr>
                                <td></td>
                            </tr>
                            <br>
                            <tr>
                                <td>Wulandari S. Sn.</td>
                            </tr>
                        </div>
                    </center>
                    <div class="text-center" style="">
                        <img src="{{ asset('Atlantis-Lite/assets/img/LAYOUT SISI BELAKANG SERTIFIKAT-1.png') }}" alt="" width="100%">
            
                    </div>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection
