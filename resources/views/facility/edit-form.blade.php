@extends('slice.app')

@section('title')
    Fasilitas
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Fasilitas</h1>
                    </div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ isset($facility) ? route('facility.update', $facility->id) : route('facility.store') }}"
                    method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Data Fasilitas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="facility_code">Kode Fasilitas</label>
                                <input type="text" style="text-transform:uppercase"
                                    oninput="this.value = this.value.toUpperCase()"
                                    class="form-control @error('facility_code') is-invalid @enderror" id="facility_code"
                                    name="facility_code" value="{{ old('facility_code', $facility->facility_code) }}"
                                    required autofocus>
                                @error('facility_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="facility_name">Nama Fasilitas</label>
                                <input type="text" style="text-transform:uppercase"
                                    oninput="this.value = this.value.toUpperCase()"
                                    class="form-control @error('facility_name') is-invalid @enderror" id="facility_name"
                                    name="facility_name" value="{{ old('facility_name', $facility->facility_name) }}"
                                    required>
                                @error('facility_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="city_id">Kota</label>
                                <select class="form-control" name="city_id" id="city_id" required>
                                    <option value="" disabled selected>Pilih Kota</option>
                                    @foreach ($city as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $facility->city_id ? 'selected' : '' }}>
                                            {{ $data->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('facility.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
