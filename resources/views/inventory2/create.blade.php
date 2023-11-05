@extends('slice2.app')

@section('title')
    Inventaris
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
                                @if (auth()->user()->role_id == 1)
                                    <i class="fa fa-paste bg-c-red"></i>
                                @else
                                    <i class="fa fa-paste bg-c-yellow"></i>
                                @endif
                                <div class="d-inline">
                                    <h4 class="mt-3">Tambah Data Inventaris</h4>
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
                                    <h5>Form Tambah Data Inventaris</h5>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('inventory.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Inventaris</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('inventory_name') is-invalid @enderror"
                                                    id="inventory_name" name="inventory_name"
                                                    value="{{ old('inventory_name') }}" required>
                                                @error('inventory_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Fasilitas</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('facility_id') is-invalid @enderror"
                                                    id="facility_id" name="facility_id" required>
                                                    <option value="" disabled selected>Pilih Fasilitas</option>
                                                    @foreach ($facility as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ old('facility_id') == $data->id ? 'selected' : '' }}>
                                                            @if (auth()->user()->role_id == 1)
                                                                {{ $data->facility_name . ' ' . $data->city->city_name }}
                                                            @else
                                                                {{ $data->facility_name }}
                                                            @endif
                                                        </option>
                                                        @error('facility_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Beli</label>
                                            <div class="col-sm-10">
                                                <input type="date"
                                                    class="form-control @error('purchase_date') is-invalid @enderror"
                                                    id="purchase_date" name="purchase_date"
                                                    value="{{ old('purchase_date') }}" required>
                                                @error('purchase_date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Lokasi</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('location') is-invalid @enderror"
                                                    id="location" name="location" value="{{ old('location') }}" required>
                                                @error('location')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pic</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('employee_id') is-invalid @enderror"
                                                    id="employee_id" name="employee_id" required>
                                                    <option value="" disabled selected>Pilih Pic</option>
                                                    @foreach ($employee as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ old('employee_id') == $data->id ? 'selected' : '' }}>
                                                            @if (auth()->user()->role_id == 1)
                                                                {{ $data->employee_name . ' (' . $data->city->city_name . ')' }}
                                                            @else
                                                                {{ $data->employee_name }}
                                                            @endif
                                                        </option>
                                                        @error('employee_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('price') is-invalid @enderror" id="price"
                                                    name="price" value="{{ old('price') }}" required>
                                                @error('price')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                                <textarea rows="5" cols="5" class="form-control @error('information') is-invalid @enderror" id="information"
                                                    name="information">{{ old('information') }}</textarea>
                                                @error('information')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file"
                                                    class="form-control @error('photo') is-invalid @enderror" id="photo"
                                                    name="photo" onchange="previewImage()" required>
                                                <img class="photo-preview img-fluid mt-3 col-sm-2"
                                                    style=" max-width:50%; max-height: 50%;">
                                                @error('photo')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <button type="submit" class="btn btn-success btn-addsave">
                                                <i class="fa fa-save"></i> Save</button>
                                            <a href="{{ route('inventory.index') }}"
                                                class="btn btn-danger btn-printcancel">
                                                <i class="fa fa-times"></i> Cancel</a>
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
