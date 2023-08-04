@extends('layout.master')
@section('content')
    <div class="page-header mt-5 d-print-none">
        <div class="row">
            <div class="col">
                <h4 class="page-title">{{ $title }}</h4>
            </div>
        </div>
    </div>
    <div class="row d-print-none">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{ url('post-finish') }}" method="POST" target="_blank">
                                @csrf
                                <div class="form-group">
                                    <label>Dari Tanggal</label>

                                    <input class="form-control" type="date" name="dari" required>
                                    @error('dari')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Sampai Tanggal</label>
                                    <input class="form-control" type="date" name="sampai" required>
                                    @error('sampai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @if (isset($data))
        <style>
            @media print {
                @page {
                    size: A4 portrait;
                    margin: 0 !important;
                }

                html,
                body {
                    margin: auto !important;
                    width: 100% !important;
                }

                .sidebar {
                    display: none !important;
                }

                .print-sample {
                    position: absolute;
                    width: 1000px;
                    height: 300px;
                    z-index: 15;

                    left: 50%;
                    margin: -100px 0 0 -650px;

                }



                /* .table-responsive {
                                                                                                                            width: 100% !important;
                                                                                                                            display: block !important;
                                                                                                                            margin: auto !important;
                                                                                                                        } */
            }
        </style>
        <div class="row print-sample">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif(session('failed'))
                            <div class="alert alert-danger">{{ session('failed') }}</div>
                        @endif


                        <button type="button" onclick="window.print()"
                            class="btn btn-dark btn-sm d-print-none">Print</button>
                        {{-- <h4 class="card-title">Bordered Table</h4> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
