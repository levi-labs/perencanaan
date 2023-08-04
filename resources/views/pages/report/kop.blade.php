<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> --}}
    <title>Document</title>
    <style>
        @media print {
            button.btn {
                display: none;
                margin: 5px 5px;
            }

            .my-logo {
                display: block;

                /* margin-left: -30%; */
            }

            @page {
                size: F4 landscape;
                margin: 10%;
            }
        }

        button.btn {
            margin-bottom: 5px;
        }

        body {
            font-family: Arial, sans-serif;
            width: 100%;
        }

        .my-logo {
            position: absolute;

            /* margin-left: -20%; */
        }

        .the-kop {
            margin: auto;
            width: 100%;
        }

        table tr td {
            font-size: 11px;
        }

        table tr .text {
            text-align: right;
        }

        table.table,
        .table th,
        .table td {
            border: solid black 1px;
            border-collapse: collapse;
        }

        table.table {
            width: 100%;

        }

        .table-print {
            margin: auto;
            width: 90%;

            padding: 1px;
        }

        .isi {
            margin: auto;
            width: 100%;
        }

        .isi td {
            padding: 5px;
        }
    </style>
</head>

<body>

    <img width="120" height="120" src="{{ asset('assets/logo.png') }}" alt="" class="my-logo">
    <center class="the-kop">

        <table class="my-kop" width="680">

            <tr>


                <td></td>
                <td></td>
                <td></td>
                <td>
                    <center>
                        <font size="3"> <b>PT INDOFOOD SUKSES MAKMUR Tbk</b></font><br>

                        {{-- <font size="1"><i><b></b></i>
                        </font> --}}
                        <br>
                        <font size="2"><b>Kawasan Industri MM2100, Jl. Selayar Kav. D9, Jatiwangi, Kec.Cibitung,
                                Kab.Bekasi. Jawab Barat<br>17530</b></font>
                        <br>
                        <font size="2">
                            <b>Tel:021-89983488
                                <br>Email:www.bogasari.com</b>
                        </font><br>
                    </center>

                </td>
            </tr>


        </table>
        <hr style="border-top: 2px solid black;">
        <hr style="border-top: 2px solid black; margin-top:-7px;">
        <br>



    </center>

    <div class="isi">
        @yield('surat')
    </div>




    <!-- JavaScript Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script> --}}
</body>

</html>
