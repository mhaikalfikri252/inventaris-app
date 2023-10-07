@extends('slice.app')

@section('title')
    Inventaris
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Inventaris</h1>
                    </div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('inventory.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Inventaris</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inventory_name">Nama</label>
                                <input type="text" class="form-control @error('inventory_name') is-invalid @enderror"
                                    id="inventory_name" name="inventory_name" value="{{ old('inventory_name') }}" required>
                                @error('inventory_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="facility_id">Fasilitas</label>
                                <select class="form-control @error('facility_id') is-invalid @enderror" id="facility_id"
                                    name="facility_id" required>
                                    <option value="" disabled selected>Pilih Fasilitas</option>
                                    @foreach ($facility as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('facility_id') == $data->id ? 'selected' : '' }}>
                                            {{ $data->facility_name }}
                                        </option>
                                        @error('facility_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="purchase_date">Tanggal Beli</label>
                                <input type="text" class="form-control @error('purchase_date') is-invalid @enderror"
                                    id="purchase_date" name="purchase_date" autocomplete="off"
                                    value="{{ old('purchase_date') }}" required>
                                @error('purchase_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="location">Lokasi</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                    id="location" name="location" value="{{ old('location') }}" required>
                                @error('location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="employee_id">Pic</label>
                                <select class="form-control @error('employee_id') is-invalid @enderror" id="employee_id"
                                    name="employee_id" required>
                                    <option value="" disabled selected>Pilih Pic</option>
                                    @foreach ($employee as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('employee_id') == $data->id ? 'selected' : '' }}>
                                            {{ $data->employee_name }}
                                        </option>
                                        @error('employee_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" value="{{ old('price') }}" required>
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="information">Keterangan</label>
                                <input type="text" class="form-control @error('information') is-invalid @enderror"
                                    id="information" name="information" value="{{ old('information') }}">
                                @error('information')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="photo">Foto</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                    id="photo" name="photo" onchange="previewImage()" required>
                                <img class="photo-preview img-fluid mt-3 col-sm-2"
                                    style=" max-width:100%; max-height: 100%;">
                                @error('photo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Create</button>
                            <a href="{{ route('inventory.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
