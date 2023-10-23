@extends('slice2.app')

@section('title')
    Fasilitas
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
                                <i class="fa fa-book bg-c-brown"></i>
                                <div class="d-inline">
                                    <h4 class="mt-3">Edit Data Fasilitas</h4>
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
                                    <h5>Form Edit Data Fasilitas</h5>
                                    <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-spinner-alt-5"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('facility.update', $facility->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Fasilitas</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('facility_code') is-invalid @enderror"
                                                    id="facility_code" name="facility_code"
                                                    value="{{ old('facility_code', $facility->facility_code) }}" required>
                                                @error('facility_code')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Fasilitas</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('facility_name') is-invalid @enderror"
                                                    id="facility_name" name="facility_name"
                                                    value="{{ old('facility_name', $facility->facility_name) }}" required>
                                                @error('facility_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kota</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('city_id') is-invalid @enderror"
                                                    id="city_id" name="city_id" required>
                                                    <option value="" disabled selected>Pilih Kota</option>
                                                    @foreach ($city as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $data->id == $facility->city_id ? 'selected' : '' }}>
                                                            {{ $data->city_name }}
                                                        </option>
                                                        @error('city_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <button type="submit" class="btn btn-success"
                                                style="margin-left: 15px">Save</button>
                                            <a href="{{ route('facility.index') }}" class="btn btn-danger"
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
