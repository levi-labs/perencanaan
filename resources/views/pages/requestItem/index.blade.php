@extends('layout.master')
@section('content')
    <div class="page-header mt-5">
        <div class="row">
            <div class="col">
                <h3 class="page-title">{{ $title }}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif(session('failed'))
                        <div class="alert alert-danger">{{ session('failed') }}</div>
                    @endif
                    @if (auth()->user()->akses_user == 'Produksi' || auth()->user()->akses_user == 'Admin')
                        <button type="button" onclick="window.location.href='/tambah-request'"
                            class="btn btn-primary btn-sm">Request Baru</button>
                    @endif

                    {{-- <h4 class="card-title">Bordered Table</h4> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="text-center">
                                <tr>
                                    <th>Kode Request</th>
                                    <th>Kode Model</th>
                                    <th>Tanggal Request</th>
                                    <th>Status Request</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <style>
                                .btn-tambah-item {
                                    background-color: cornflowerblue !important;
                                    color: white !important;
                                }

                                .btn-detail-item {
                                    background-color: rgb(141, 115, 178) !important;
                                    color: white !important;
                                }
                            </style>
                            <tbody class="text-center">
                                @foreach ($data as $dt)
                                    <tr>
                                        <td>{{ $dt->kode_permintaan }}</td>
                                        {{-- <td>{{ $dt->materials->kode_material . '|' . $dt->materials->nama_material }}</td> --}}

                                        <td>{{ $dt->model_id }}</td>
                                        <td>{{ $dt->tanggal_permintaan }}</td>
                                        <td>{{ $dt->status_permintaan }}</td>
                                        <td>
                                            @if (auth()->user()->akses_user == 'Produksi' || auth()->user()->akses_user == 'Admin')
                                                <a class="btn btn-detail-item btn-sm"
                                                    href="{{ url('detail-request/' . $dt->kode_permintaan) }}">Detail</a>
                                                @if ($dt->status_permintaan == 'Request')
                                                    <a class="btn btn-tambah-item btn-sm"
                                                        href="{{ url('edit-request/' . $dt->id) }}">Edit</a>
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ url('delete-request/' . $dt->id) }}">Hapus</a>
                                                @elseif($dt->status_permintaan == 'Terkirim')
                                                    <a class="btn btn-tambah-item btn-sm"
                                                        href="{{ url('finish-request/' . $dt->id) }}">Finish</a>
                                                @endif
                                            @elseif(auth()->user()->akses_user == 'PPC')
                                                <a class="btn btn-detail-item btn-sm"
                                                    href="{{ url('detail-request/' . $dt->kode_permintaan) }}">Detail</a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
