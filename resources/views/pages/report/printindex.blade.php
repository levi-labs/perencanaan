@extends('pages.report.kop')
@section('surat')
    <div class="table-print">
        <center>
            <h4>Laporan Permintaan Keseluruhan </h4>
            <h4>Periode :
                {{ Carbon\Carbon::parse($dari)->isoFormat('D MMMM Y') . ' - ' . Carbon\Carbon::parse($sampai)->isoFormat('D MMMM Y') }}
            </h4>
        </center>
        <button type="button" onclick="window.print()" class="btn">&nbsp;Print</button>
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th>Kode Permintaan</th>
                    <th>Kode model Item</th>
                    <th>Nama Model Item</th>

                    <th>Status Permintaan</th>
                    <th>Tanggal Permintaan</th>

                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($data as $dt)
                    <tr>
                        <td>{{ $dt->kode_permintaan }}</td>
                        <td>{{ $dt->model_id }}</td>
                        <td>{{ $dt->models->nama_model_item }}</td>

                        <td>{{ $dt->status_permintaan }}</td>
                        <td>{{ $dt->tanggal_permintaan }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <br>
        <br>
        <br>
        <style>
            .space-ttd {
                width: 1000px;
            }

            .ttd-row {
                width: 100%;
            }
        </style>
        <table class="ttd-row">
            <tr>
                <td style="text-align: center">
                    {{-- <b>Bekasi,<br>{{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</b><br> --}}
                    <br>
                    <br><br>
                    <p></p>,
                    <br><br><br>
                    <br>
                    <p><b></b></p>
                    {{-- <hr width="100px"> --}}
                </td>
                <td class="space-ttd"></td>
                <td style="text-align: center">
                    <b>Bekasi,<br><br>{{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</b><br>
                    <br><br>
                    <p>Penerima</p>,
                    <br><br><br>
                    <br>
                    <p><b>{{ auth()->user()->nama_user }}</b></p>
                    <hr width="100px">
                </td>
            </tr>
        </table>


    </div>
@endsection
