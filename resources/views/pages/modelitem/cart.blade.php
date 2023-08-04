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
                @if (session('success'))
                    <div class="alert alert-success">
                        <span class="text-info">{{ session('success') }}</span>

                    </div>
                @elseif(session('failed'))
                    <div class="alert alert-danger">
                        <span class="text-info">{{ session('failed') }}</span>
                    </div>
                @endif
                <div class="alert alert-info">
                    <span class="text-info"><b>INFO!</b> Qty yang di butuhkan untuk memproduksi 1 pcs/ unit</span>
                </div>
                <form action="{{ url('post-model') }}" method="POST">
                    @csrf
                    <div class="row formtype">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Kode Model Item</label>
                                <input class="form-control" type="text" value="{{ $item->kode_model_item }} "
                                    name="kode_model" readonly>
                                @error('kode_model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Customer</label>
                                <select class="form-control" id="sel1" name="nama_customer">
                                    <option selected disabled>Pilih Customer</option>
                                    @foreach ($customer as $cm)
                                        <option {{ $item->customer_id == $cm->id ? 'selected' : '' }}
                                            value="{{ $cm->id }}">{{ $cm->nama_customer }}</option>
                                    @endforeach
                                </select>
                                @error('nama_customer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Model Item</label>
                                <input class="form-control" type="text" placeholder="ITEM A" name="nama_model"
                                    value="{{ $item->nama_model_item }}">
                                @error('nama_model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Material</label>
                                <select class="form-control" id="sel1" name="nama_material">
                                    <option selected disabled>Pilih Material</option>
                                    @foreach ($material as $mt)
                                        <option value="{{ $mt->id }}">{{ $mt->nama_material }}</option>
                                    @endforeach
                                </select>
                                @error('nama_material')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Qty</label>
                                <input class="form-control" type="number" placeholder="0" name="qty">
                                @error('qty')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Satuan</label>
                                <input class="form-control" type="text" placeholder="Unit / Pcs" name="satuan">
                                @error('satuan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    @if (isset($data))
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <form action="{{ url('update-model-cart/' . $item->kode_model_item) }}" method="POST">
                                @csrf
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nama Material</th>
                                            <th>Qty Request</th>
                                            <th>Satuan</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $dt)
                                            <tr>
                                                <input class="form-control" type="hidden" placeholder="0"
                                                    name="id_request[]" value="{{ $dt->id }}">

                                                <td>{{ $dt->materials->nama_material }}</td>
                                                <td>
                                                    <style>
                                                        .inw {
                                                            width: 100px !important;
                                                        }
                                                    </style>
                                                    <input class="form-control inw" type="number" placeholder="0"
                                                        name="qty_request[]" value="{{ $dt->qty_model }}">
                                                </td>
                                                <td>{{ $dt->satuan }}</td>

                                                <td><a href="{{ url('delete-single/' . $dt->id) }}"
                                                        class="btn btn-danger btn-sm">X</a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                                <style>
                                    .btn-save {
                                        background-color: rgb(62, 62, 146) !important;
                                        color: white;
                                    }
                                </style>
                                <div class="row justify-content-end">
                                    <div class="col-md-2 text-right">
                                        <button class="btn btn-save btn-sm">Save</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    @endif

@endsection
