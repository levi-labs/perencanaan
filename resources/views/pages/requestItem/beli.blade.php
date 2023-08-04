@extends('layout.master')
@section('content')
    <div class="page-header mt-5">
        <div class="row">
            <div class="col">
                <h3 class="page-title">{{ $title }}</h3>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card mt-2">
                <form action="{{ url('post-material-masuk') }}" method="POST">
                    @csrf
                    <div class="row formtype justify-content-center mt-2">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kode Material Masuk</label>
                                <input class="form-control" type="text" readonly value="{{ $kode }}"
                                    name="kode_masuk">
                                @error('kode_masuk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <select class="form-control" id="sel1" name="supplier">
                                    <option selected disabled>Pilih Supplier</option>
                                    @foreach ($supplier as $sp)
                                        <option value="{{ $sp->id }}">{{ $sp->nama_supplier }}</option>
                                    @endforeach
                                </select>
                                @error('supplier')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Material</label>
                                <select class="form-control" id="sel1" name="material">
                                    <option selected disabled>Pilih Material</option>
                                    @foreach ($material as $mt)
                                        <option {{ $m->id == $mt->id ? 'selected' : '' }} value="{{ $mt->id }}">
                                            {{ $mt->nama_material }}</option>
                                    @endforeach
                                </select>
                                @error('material')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Qty</label>
                                <input class="form-control" type="number" min="0" name="qty_masuk">
                                @error('qty_masuk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Material Masuk</label>
                                <input class="form-control" type="date" value="{{ $kode }}" name="tanggal">
                                @error('tanggal')
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
