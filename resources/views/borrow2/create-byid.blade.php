@extends('slice2.app')

@section('title')
    Peminjaman Aset
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
                                    <i class="fa fa-handshake-o bg-c-light-blue"></i>
                                @else
                                    <i class="fa fa-handshake-o bg-c-brown"></i>
                                @endif
                                <div class="d-inline">
                                    <h4 class="mt-3">Tambah Data Peminjaman Aset</h4>
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
                                    <h5>Form Tambah Data Peminjaman Aset</h5>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('borrow.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Peminjam</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('employee_id') is-invalid @enderror"
                                                    id="employee_id" name="employee_id" required>
                                                    <option value="" disabled selected>Pilih Nama</option>
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
                                            <label class="col-sm-2 col-form-label">Barang</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('asset_id') is-invalid @enderror"
                                                    id="asset_id" name="asset_id" required>
                                                    <option value="" disabled selected>Pilih Barang</option>
                                                    @foreach ($asset as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $assetById->id == $data->id ? 'selected' : '' }}>
                                                            @if (auth()->user()->role_id == 1)
                                                                {{ $data->asset_code . ' ' . $data->asset_name . ' (' . $data->facility->city->city_name . ')' }}
                                                            @else
                                                                {{ $data->asset_code . ' ' . $data->asset_name }}
                                                            @endif
                                                        </option>
                                                        @error('asset_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                                            <div class="col-sm-10">
                                                <input type="date"
                                                    class="form-control @error('borrow_date') is-invalid @enderror"
                                                    id="borrow_date" name="borrow_date" value="{{ old('borrow_date') }}"
                                                    required>
                                                @error('borrow_date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Kembali</label>
                                            <div class="col-sm-10">
                                                <input type="date"
                                                    class="form-control @error('return_date') is-invalid @enderror"
                                                    id="return_date" name="return_date" value="{{ old('return_date') }}"
                                                    required>
                                                @error('return_date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('status_borrow_id') is-invalid @enderror"
                                                    id="status_borrow_id" name="status_borrow_id" required>
                                                    <option value="" disabled selected>Pilih Status</option>
                                                    @foreach ($status_borrow as $data)
                                                        <option value="{{ $data->id }}">
                                                            {{ $data->status_name }}
                                                        </option>
                                                        @error('status_borrow_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="uploadletter" style="display: none;">
                                            <label class="col-sm-2 col-form-label">Upload Surat</label>
                                            <div class="col-sm-10">
                                                <input type="file"
                                                    class="form-control @error('letter') is-invalid @enderror"
                                                    id="letter" name="letter" value="{{ old('letter') }}">
                                                @error('letter')
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
                                            <a href="{{ route('asset.index') }}" class="btn btn-danger btn-printcancel">
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
