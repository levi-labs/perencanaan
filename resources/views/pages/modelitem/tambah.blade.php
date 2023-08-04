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
                <div class="alert alert-info">
                    <span class="text-info"><b>INFO!</b> Qty yang di butuhkan untuk memproduksi 1 pcs/ unit</span>
                </div>
                <form action="{{ url('post-model') }}" method="POST">
                    @csrf
                    <div class="row formtype">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Kode Model Item</label>
                                <input class="form-control" type="text" value="{{ $kode_model }} " name="kode_model"
                                    readonly>
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
                                        <option value="{{ $cm->id }}">{{ $cm->nama_customer }}</option>
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
                                <input class="form-control" type="text" placeholder="ITEM A" name="nama_model">
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
@endsection
