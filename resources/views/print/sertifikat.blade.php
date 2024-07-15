<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Atlantis-Lite/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Atlantis-Lite/assets/css/atlantis.min.css">
    <link href="https://www.dafontfree.net/embed/ZXJhcy1kZW1pLWl0Yy1yZWd1bGFyJmRhdGEvMTMvZS82NDc3MS9FUkFTREVNSS5UVEY"
        rel="stylesheet" type="text/css" />
    <style type="text/css" media="print">
        .A3 {
            height: 895px;
            width: 1000px;
        }

        @page {
            margin: 0;
        }

    </style>

    <title>Document</title>
</head>

<body>
    <div class="A3 fw-bold " style="height: 942px ">
        {{-- <div  style="background-image: url('{{ asset('image/layout1.png') }}') ; background-size: 500px 250px;   background-position: left;
        background-repeat: no-repeat;
        position: relative;"></div> --}}
        <div class="row">
            <div class="col-sm-4" style="float: left">
                <img src="{{ asset('/' . $siswas->kelass->image) }}" alt="" style=" width: 600px ;  
                position: absolute; top: 300px">
            </div>
            <div class="col-sm-8" style="">
                <center>
                    <div style=" margin-top:100px; margin-right: -160px; ">
                        <h3 style="font-family: 'eras-demi-itc-bold', sans-serif; font-size: 20px"> No:
                            {{ $ujian + 1 }} / YAP / {{ $rombulan }}
                            /
                            {{ Carbon\Carbon::now()->isoFormat('YYYY') }} </h3>
                        <p style="font-family: 'eras-demi-itc-bold', sans-serif ; font-size: 20px">Diberikan Kepada:</p>
                        <h1 style="font-family: Edwardian Script ITC; font-size: 80px; " class="nama">
                            {{ $siswas->nama_siswas }}
                        </h1>

                        <p style="font-family: 'eras-demi-itc-bold', sans-serif ; font-size: 20px"> Dilahirkan di
                            {{ $tempat }},
                            pada tanggal {{ $tanggal }},
                            bulan {{ $bulan }}, tahun {{ $tahun }}
                            <br> Anak dari {{ $siswas->orang_tua }}
                        </p>
                        <h1 style="font-family: Pristina; font-size: 80px;  ">Lulus</h1>

                        <p style="font-family: 'eras-demi-itc-bold', sans-serif ; font-size: 20px"
                            class="desc">Pada ujian {{ $siswas->kelass->kelas }} di semester terpadu ke - {{ $siswas->semester }} ( <span
                                id="huruf">{{ $semester }}</span> )
                            <br>yang diselenggarakan pada tanggal {{ $layout->tanggal }}
                            <br>di {{ $layout->tempat }}
                            <br>dan tercatat sebagai siswa Ayodya Pala - {{ $siswas->tempat->name }}
                            <br>dengan nomor induk : {{ $siswas->no_induk }}
                        </p>
                    </div>
                </center>
                <div class="container d-flex justify-content-between">
                    <div class="foto">
                        <img src="{{ asset('/' . $siswas->foto) }}" alt="" id="foto" width="110px" height="150px"
                            style="border-radius: 100%">
                    </div>
                    <div style="text-align: center; ">
                        <p class="ttd" style="font-size: 20px;">Depok,
                            {{ Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}
                            <br>Pimpinan
                        </p>
                        <br>
                        <br>
                        <p style="font-size: 20px;">Dra. Budi Agustinah</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        var css = '@page { size: A4 landscape; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);

        window.print();
    </script>
</body>

</html>
