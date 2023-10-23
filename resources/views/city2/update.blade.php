@extends('slice2.app')

@section('title')
    Kota
@endsection

@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="fa fa-map-marker bg-c-yellow"></i>
                                <div class="d-inline">
                                    <h4 class="mt-3">Edit Data Kota</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Form Edit Data Kota</h5>
                                    <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-spinner-alt-5"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('city.update', $city->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Kota</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('city_name') is-invalid @enderror"
                                                    id="city_name" name="city_name"
                                                    value="{{ old('city_name', $city->city_name) }}" required>
                                                @error('city_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <button type="submit" class="btn btn-success"
                                                style="margin-left: 15px">Save</button>
                                            <a href="{{ route('city.index') }}" class="btn btn-danger"
                                                style="margin-left: 10px">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
