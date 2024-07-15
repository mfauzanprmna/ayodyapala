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
            height: 100px;
            width: 1000px;


        }

        @page {
            margin: 0;
        }

    </style>

    <title>Document</title>
</head>

<body>
    <div class="A4 fw-bold container " style="background-image: url('Atlantis-Lite/assets/img/LAYOUT SISI BELAKANG SERTIFIKAT-1.png') ; background-size: 500px 530px;
    background-repeat: no-repeat;
    position: relative;">
            <br>
        <br>
        <br>
        <br>
        <div class="mb-3">
            <h2 class="text-center ">DAFTAR NILAI UJIAN</h2>
        </div>
        <br>
        <table style="margin-left: 100px">
            <tr>
                <th>Nama</th>
                <td>:</td>
                <td>{{ $siswas->nama_siswa }}</td>
            </tr>
            <tr>
                <th>No.Ujian</th>
                <td>:</td>
                <td>{{ $ujian }}</td>
            </tr>
            <tr>
                <th>Semester</th>
                <td>:</td>
                <td>{{ $semester }}</td>
            </tr>
        </table>
        <br>
   
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
                    <td>{{ $daerah1 }}</td>
                    <td>{{ $tarian1 }}</td>
                    <td>{{ $wirama1 }}</td>
                    <td>{{ $wiraga1 }}</td>
                    <td>{{ $wirasa1 }}</td>
                    <td>{{ $subtotal1 }}</td>
                    <th rowspan="2">{{ $total }}</th>
                </tr>
                <tr>
                    <td>{{ $daerah2 }}</td>
                    <td>{{ $tarian2 }}</td>
                    <td>{{ $wirama2 }}</td>
                    <td>{{ $wiraga2 }}</td>
                    <td>{{ $wirasa2 }}</td>
                    <td>{{ $subtotal2 }}</td>
                </tr>
                <tr>
                    <th colspan="2">Sinopsis</th>
                    <th colspan="5">100.00</th>
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
            
            
        </div>
        <div class="text-center">
            <img src="{{ asset('Atlantis-Lite/assets/img/LAYOUT SISI BELAKANG SERTIFIKAT-1.png') }}" alt="" width="100%">

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
