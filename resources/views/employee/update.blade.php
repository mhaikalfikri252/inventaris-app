@extends('slice2.app')

@section('title')
    Karyawan
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
                                <i class="fa fa-group bg-c-green"></i>
                                <div class="d-inline">
                                    <h4 class="mt-3">Edit Data Karyawan</h4>
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
                                    <h5>Form Edit Data Karyawan</h5>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('employee.update', $employee->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Karyawan</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('employee_name') is-invalid @enderror"
                                                    id="employee_name" name="employee_name"
                                                    value="{{ old('employee_name', $employee->employee_name) }}" required>
                                                @error('employee_name')
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
                                                            {{ $data->id == $employee->city_id ? 'selected' : '' }}>
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
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    id="address" name="address"
                                                    value="{{ old('address', $employee->address) }}" required>
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No Hp</label>
                                            <div class="col-sm-10">
                                                <input type="number"
                                                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                    name="phone" value="{{ old('phone', $employee->phone) }}" required>
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jabatan</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('position') is-invalid @enderror"
                                                    id="position" name="position"
                                                    value="{{ old('position', $employee->position) }}" required>
                                                @error('position')
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
                                            <a href="{{ route('employee.index') }}" class="btn btn-danger btn-printcancel">
                                                <i class="fa fa-times"></i>Cancel</a>
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
