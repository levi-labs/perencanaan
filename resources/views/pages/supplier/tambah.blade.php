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
                <form action="{{ url('post-supplier') }}" method="POST">
                    @csrf
                    <div class="row formtype">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kode Supplier</label>
                                <input class="form-control" type="text" value="{{ $kode }} " name="kode_supplier"
                                    readonly>
                                @error('kode_supplier')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input class="form-control" type="text" placeholder="PT ABC.COM" name="nama_supplier">
                                @error('nama_supplier')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Telp Supplier</label>
                                <input class="form-control" type="text" placeholder="02129292929"
                                    name="no_telp_supplier">
                                @error('no_telp_supplier')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Supplier</label>
                                <textarea class="form-control" rows="5" id="comment" name="alamat_supplier"></textarea>
                                @error('alamat_supplier')
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
