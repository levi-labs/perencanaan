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
                <form action="{{ url('update-customer/' . $customer->id) }}" method="POST">
                    @csrf
                    <div class="row formtype ">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Kode Customer</label>
                                <input class="form-control" type="text" value="{{ $customer->kode_customer }} "
                                    name="kode_customer" readonly>
                                @error('kode_customer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Customer</label>
                                <input class="form-control" type="text" placeholder="John Dhoe" name="nama_customer"
                                    value="{{ $customer->nama_customer }}">
                                @error('nama_customer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Telp Customer</label>
                                <input class="form-control" type="text" placeholder="0218399929" name="no_telp_customer"
                                    value="{{ $customer->no_telp_customer }}">
                                @error('no_telp_customer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Customer</label>
                                <textarea class="form-control" rows="5" id="comment" name="alamat_customer">{{ $customer->alamat_customer }}</textarea>
                                @error('alamat_customer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
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
