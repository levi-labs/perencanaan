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

                    <button type="button" onclick="window.location.href='/tambah-material-masuk'"
                        class="btn btn-primary btn-sm">Tambah</button>
                    {{-- <h4 class="card-title">Bordered Table</h4> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="text-center">
                                <tr>
                                    <th>Kode Material Masuk</th>
                                    <th>Nama Supplier</th>
                                    <th>Nama Material</th>
                                    <th>Qty Material</th>
                                    <th>Tanggal</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($data as $dt)
                                    <tr>
                                        <td>{{ $dt->kode_material_masuk }}</td>
                                        <td>{{ $dt->suppliers->nama_supplier }}</td>
                                        <td>{{ $dt->materials->nama_material }}</td>
                                        <td>{{ $dt->qty_masuk }}</td>
                                        <td>{{ $dt->tanggal_material_masuk }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ url('edit-material-masuk/' . $dt->id) }}">Edit</a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ url('delete-material-masuk/' . $dt->id) }}">Hapus</a>
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
