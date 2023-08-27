@extends('slice.app')

@section('title')
    Peminjaman Aset
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Peminjaman Aset</h1>
                    </div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ isset($lending) ? route('lending.update', $lending->id) : route('lending.store') }}"
                    method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Data Peminjaman Aset</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="person_name">Nama</label>
                                    <input type="text" class="form-control @error('person_name') is-invalid @enderror"
                                        id="person_name" name="person_name"
                                        value="{{ old('person_name', $lending->person_name) }}" required>
                                    @error('person_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="asset_id">Barang</label>
                                    <select class="form-control @error('asset_id') is-invalid @enderror" id="asset_id"
                                        name="asset_id" required>
                                        <option value="" disabled selected>Pilih Barang</option>
                                        @foreach ($asset as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $lending->asset_id ? 'selected' : '' }}>
                                                {{ $data->asset_code . ' ' . $data->asset_name }}
                                            </option>
                                            @error('asset_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="loan_date">Tanggal Peminjaman</label>
                                    <input type="text" class="form-control @error('loan_date') is-invalid @enderror"
                                        id="loan_date" name="loan_date" autocomplete="off"
                                        value="{{ old('loan_date', $lending->loan_date) }}" required>
                                    @error('loan_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="return_date">Tanggal Pengembalian</label>
                                    <input type="text" class="form-control @error('return_date') is-invalid @enderror"
                                        id="return_date" name="return_date" autocomplete="off"
                                        value="{{ old('return_date', $lending->return_date) }}" required>
                                    @error('return_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_lending_id">Status</label>
                                    <select class="form-control @error('status_lending_id') is-invalid @enderror"
                                        id="status_lending_id" name="status_lending_id" required>
                                        <option value="" disabled selected>Pilih Status</option>
                                        @foreach ($status as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $lending->status_lending_id ? 'selected' : '' }}>
                                                {{ $data->status_name }}
                                            </option>
                                            @error('status_lending_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('lending.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
