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
                    @elseif(session('stock'))
                        <div class="alert alert-warning">{{ session('stock') }}</div>
                    @endif
                    {{-- <h4 class="card-title">Bordered Table</h4> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="text-center">
                                <tr>
                                    <th>Customer</th>
                                    <th>Kode Request</th>
                                    <th>Nama Material</th>
                                    <th>Qty Request</th>
                                    <th>Stock</th>
                                    <th>Tanggal Request</th>
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
                                        <td>{{ $dt->customers->nama_customer }}</td>
                                        <td>{{ $dt->kode_model_item }}</td>
                                        <td>{{ $dt->materials->nama_material }}</td>
                                        <td>{{ $dt->qty_model }}</td>
                                        <td>{{ $dt->materials->qty_material }}</td>
                                        <td>{{ $permintaan->tanggal_permintaan }}</td>
                                        <td>
                                            @if (auth()->user()->akses_user == 'Admin' || auth()->user()->akses_user == 'Produksi')
                                                @if ($dt->status_model_item == 'Request')
                                                    <a href="{{ url('edit-single/' . $dt->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="{{ url('delete-single/' . $dt->id) }}"
                                                        class="btn btn-secondary btn-sm">Hapus</a>
                                                @elseif($dt->status_model_item == 'Terkirim')
                                                    <a href="{{ url('produksi-item/' . $dt->id) }}"
                                                        class="btn btn-dark btn-sm">Terima & Produksi</a>
                                                @elseif($dt->status_model_item == 'Terima & Produksi')
                                                    <a href="#" class="btn btn-info btn-sm ">Done</a>
                                                @endif
                                            @elseif(auth()->user()->akses_user == 'Admin')
                                                <a href="{{ url('edit-single/' . $dt->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <a href="{{ url('delete-single/' . $dt->id) }}"
                                                    class="btn btn-danger btn-sm">Hapus</a>
                                                @php
                                                    $cek = \App\Models\Permintaan::where('model_id', $dt->kode_model_item)->first();
                                                @endphp
                                                @if ($dt->status_model_item == 'Request')
                                                    <a href="{{ url('kirim-item/' . $dt->id) }}"
                                                        class="btn btn-dark btn-sm">Kirim</a>
                                                @else
                                                    <a href="#" class="btn btn-light btn-sm">Terkirim</a>
                                                @endif

                                                <a href="{{ url('beli-item/' . $dt->id) }}"
                                                    class="btn btn-secondary btn-sm">Beli Item</a>
                                            @elseif(auth()->user()->akses_user == 'PPC')
                                                @if ($dt->status_model_item == 'Request')
                                                    <a href="{{ url('kirim-item/' . $dt->id) }}"
                                                        class="btn btn-dark btn-sm">Kirim</a>
                                                @else
                                                    <a href="#" class="btn btn-light btn-sm">Terkirim</a>
                                                @endif

                                                <a href="{{ url('beli-item/' . $dt->id) }}"
                                                    class="btn btn-secondary btn-sm">Beli Item</a>
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
