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

                    <button type="button" onclick="window.location.href='/tambah-supplier'"
                        class="btn btn-primary btn-sm">Tambah</button>
                    {{-- <h4 class="card-title">Bordered Table</h4> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="text-center">
                                <tr>
                                    <th>Kode Supplier</th>
                                    <th>Nama Supplier</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($data as $dt)
                                    <tr>
                                        <td>{{ $dt->kode_supplier }}</td>
                                        <td>{{ $dt->nama_supplier }}</td>
                                        <td>{{ $dt->no_telp_supplier }}</td>
                                        <td>{{ $dt->alamat_supplier }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ url('edit-supplier/' . $dt->id) }}">Edit</a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ url('delete-supplier/' . $dt->id) }}">Hapus</a>
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
