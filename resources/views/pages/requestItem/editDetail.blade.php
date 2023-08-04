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
                <form action="{{ url('update-single-item/' . $item->id) }}" method="POST">
                    @csrf
                    <div class="row formtype">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Kode Model Item</label>
                                <input class="form-control" type="text" name="kode_request"
                                    value="{{ $item->kode_model_item }}" readonly>
                                @error('kode_request')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Customer </label>
                                <select class="form-control" id="sel1" name="customer">
                                    <option selected disabled>Pilih Customer</option>
                                    @foreach ($customer as $cm)
                                        <option {{ $item->customer_id == $cm->id ? 'selected' : '' }}
                                            value="{{ $cm->id }}">{{ $cm->nama_customer }}</option>
                                    @endforeach
                                </select>
                                @error('customer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Material Item</label>
                                <select class="form-control" id="sel1" name="material">
                                    <option selected disabled>Pilih Material Item</option>
                                    @foreach ($material as $mt)
                                        <option {{ $item->material_id == $mt->id ? 'selected' : '' }}
                                            value="{{ $mt->id }}">{{ $mt->nama_material }}</option>
                                    @endforeach
                                </select>
                                @error('material')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group">
                                <label>Qty Material</label>
                                <input class="form-control" type="number" name="qty_model" value="{{ $item->qty_model }}">
                                @error('qty_model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group">
                                <label>Satuan</label>
                                <input class="form-control" type="text" name="satuan" value="{{ $item->satuan }}">
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
@endsection
