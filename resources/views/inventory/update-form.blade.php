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
                <form action="{{ isset($inventory) ? route('inventory.update', $inventory->id) : route('inventory.store') }}"
                    method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Inventaris</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inventory_name">Nama</label>
                                    <input type="text" class="form-control @error('inventory_name') is-invalid @enderror"
                                        id="inventory_name" name="inventory_name"
                                        value="{{ old('inventory_name', $inventory->inventory_name) }}" required>
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
                                                {{ $data->id == $inventory->facility_id ? 'selected' : '' }}>
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
                                        value="{{ old('purchase_date', $inventory->purchase_date) }}" required>
                                    @error('purchase_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="location">Lokasi</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                        id="location" name="location" value="{{ old('location', $inventory->location) }}"
                                        required>
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
                                                {{ $data->id == $inventory->employee_id ? 'selected' : '' }}>
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
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price', $inventory->price) }}"
                                        required>
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="information">Keterangan</label>
                                    <input type="text" class="form-control @error('information') is-invalid @enderror"
                                        id="information" name="information"
                                        value="{{ old('information', $inventory->information) }}">
                                    @error('information')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="photo">Foto</label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                        id="photo" name="photo" onchange="previewImage()">
                                    @error('photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if ($inventory->photo)
                                        <img src="{{ asset('images/' . $inventory->photo) }}"
                                            class="photo-preview img-fluid mt-3 col-sm-2" alt="photo"
                                            style=" max-width:100%; max-height: 100%;">
                                    @else
                                        <img class="photo-preview img-fluid mt-3 col-sm-2">
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('inventory.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
