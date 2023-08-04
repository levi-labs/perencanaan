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
                <form action="{{ url('post-user') }}" method="POST">
                    @csrf
                    <div class="row formtype justify-content-center">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="text" name="username">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama User</label>
                                <input class="form-control" type="text" name="nama_user">
                                @error('nama_user')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No Telp</label>
                                <input class="form-control" type="text" name="no_telp_user">
                                @error('no_telp_user')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Level/Akses User</label>
                                <select class="form-control" id="sel1" name="akses_user">
                                    <option selected disabled>Pilih </option>
                                    <option>Admin</option>
                                    <option>Produksi</option>
                                    <option>PPC</option>
                                </select>
                                @error('akses_user')
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
