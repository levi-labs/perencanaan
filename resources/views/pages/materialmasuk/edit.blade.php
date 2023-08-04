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
                <form action="{{ url('update-material-masuk/' . $materialMasuk->id) }}" method="POST">
                    @csrf
                    <div class="row formtype justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kode Material Masuk</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $materialMasuk->kode_material_masuk }}" name="kode_masuk">
                                @error('kode_masuk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <select class="form-control" id="sel1" name="supplier">
                                    <option selected disabled>Pilih Supplier</option>
                                    @foreach ($supplier as $sp)
                                        <option {{ $materialMasuk->supplier_id == $sp->id ? 'selected' : '' }}
                                            value="{{ $sp->id }}">{{ $sp->nama_supplier }}</option>
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
                                        <option {{ $materialMasuk->material_id == $mt->id ? 'selected' : '' }}
                                            value="{{ $mt->id }}">{{ $mt->nama_material }}</option>
                                    @endforeach
                                </select>
                                @error('material')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Qty Masuk</label>
                                <input class="form-control" type="number" min="0" name="qty_masuk"
                                    value="{{ $materialMasuk->qty_masuk }}">
                                @error('qty_masuk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Material Masuk</label>
                                <input class="form-control" type="date" name="tanggal"
                                    value="{{ $materialMasuk->tanggal_material_masuk }}">
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
