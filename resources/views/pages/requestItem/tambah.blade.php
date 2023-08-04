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
                <form action="{{ url('post-request') }}" method="POST">
                    @csrf
                    <div class="row formtype">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Kode Request Item</label>
                                <input class="form-control" type="text" value="{{ $kode }} "
                                    name="kode_permintaan" readonly>
                                @error('kode_permintaan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Material Item</label>
                                <select class="form-control" id="sel1" name="model">
                                    <option selected disabled>Pilih Model Item</option>
                                    @foreach ($model as $ml)
                                        <option value="{{ $ml->kode_model_item }}">{{ $ml->nama_model_item }}</option>
                                    @endforeach
                                </select>
                                @error('model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status Request</label>
                                <input class="form-control" type="text" value="Request" name="status_request" readonly>
                                @error('status_request')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Request</label>
                                <input class="form-control" type="date" placeholder="0" name="tanggal_request">
                                @error('tanggal_request')
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
