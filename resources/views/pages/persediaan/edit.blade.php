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
                <form action="{{ url('update-persediaan/' . $persediaan->id) }}" method="POST">
                    @csrf
                    <div class="row formtype justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Material</label>
                                <select class="form-control" id="sel1" name="material">
                                    <option selected disabled>Pilih Material</option>
                                    @foreach ($material as $mt)
                                        <option {{ $persediaan->material_id == $mt->id ? 'selected' : '' }}
                                            value="{{ $mt->id }}">
                                            {{ $mt->nama_material }}</option>
                                    @endforeach
                                </select>
                                @error('material')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Qty Material Persediaan</label>
                                <input class="form-control" type="number" min="0" name="qty_persediaan"
                                    value="{{ $persediaan->qty_persediaan }}">
                                @error('qty_persediaan')
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
