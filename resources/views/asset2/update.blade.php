@extends('slice2.app')

@section('title')
    Aset
@endsection

@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            @if ($asset->status_asset->id == 1)
                                <div class="page-header-title">
                                    @if (auth()->user()->role_id == 1)
                                        <i class="fa fa-cube bg-c-tosca"></i>
                                    @else
                                        <i class="fa fa-cube bg-c-pink"></i>
                                    @endif
                                    <div class="d-inline">
                                        <h4 class="mt-3">Edit Data Aset</h4>
                                    </div>
                                </div>
                            @else
                                <div class="page-header-title">
                                    @if (auth()->user()->role_id == 1)
                                        <i class="fa fa-times-rectangle-o bg-c-purple"></i>
                                    @else
                                        <i class="fa fa-times-rectangle-o bg-c-green"></i>
                                    @endif
                                    <div class="d-inline">
                                        <h4 class="mt-3">Edit Data Aset Write Off</h4>
                                    </div>
                                </div>
                            @endif
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
                                    <h5>Form Edit Data Aset</h5>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('asset.update', $asset->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No FA</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('asset_code') is-invalid @enderror"
                                                    id="asset_code" name="asset_code" style="text-transform:uppercase"
                                                    oninput="this.value = this.value.toUpperCase()"
                                                    value="{{ old('name', $asset->asset_code) }}" required>
                                                @error('asset_code')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Aset</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('asset_name') is-invalid @enderror"
                                                    id="asset_name" name="asset_name"
                                                    value="{{ old('asset_name', $asset->asset_name) }}" required>
                                                @error('asset_name')
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
                                                            {{ $data->id == $asset->facility_id ? 'selected' : '' }}>
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
                                                    value="{{ old('purchase_date', $asset->purchase_date) }}" required>
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
                                                    id="location" name="location"
                                                    value="{{ old('location', $asset->location) }}" required>
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
                                                            {{ $data->id == $asset->employee_id ? 'selected' : '' }}>
                                                            @if (auth()->user()->role_id == 1)
                                                                {{ $data->employee_name . ' (' . $data->city->city_name . ')' }}
                                                            @else
                                                                {{ $data->employee_name }}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('price') is-invalid @enderror" id="price"
                                                    name="price" value="{{ old('price', $asset->price) }}" required>
                                                @error('price')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('status_asset_id') is-invalid @enderror"
                                                    id="status_asset_id" name="status_asset_id" required>
                                                    <option value="" disabled selected>Pilih Status</option>
                                                    @foreach ($status_asset as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $data->id == $asset->status_asset_id ? 'selected' : '' }}>
                                                            {{ $data->status_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                                <textarea rows="5" cols="5" class="form-control @error('information') is-invalid @enderror"
                                                    id="information" name="information">{{ old('information', $asset->information) }}</textarea>
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
                                                    class="form-control @error('photo') is-invalid @enderror"
                                                    id="photo" name="photo" onchange="previewImage()">
                                                @if ($asset->photo)
                                                    <img src="{{ asset('images/' . $asset->photo) }}"
                                                        class="photo-preview img-fluid mt-3" alt="photo"
                                                        style=" max-width:40%; max-height: 70%;">
                                                @else
                                                    <img class="photo-preview img-fluid mt-3">
                                                @endif
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
                                                <i class="fa fa-save"></i>Save</button>
                                            <a href="{{ $asset->status_asset->id == 1 ? route('asset.index') : route('writeoff.index') }}"
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
