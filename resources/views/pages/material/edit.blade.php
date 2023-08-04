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
                <form action="{{ url('update-material/' . $material->id) }}" method="POST">
                    @csrf
                    <div class="row formtype justify-content-center">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Kode Material</label>
                                <input class="form-control" type="text" value="{{ $material->kode_material }} "
                                    name="kode_material"readonly>
                                @error('kode_material')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label>Nama Material</label>
                                <input class="form-control" type="text" placeholder="PT ABC.COM" name="nama_material"
                                    value="{{ $material->nama_material }}">
                                @error('nama_material')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Qty Material</label>
                                <input class="form-control" type="number" placeholder="100" min="0"
                                    value="{{ $material->qty_material }}" name="qty_material">
                                @error('qty_material')
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
