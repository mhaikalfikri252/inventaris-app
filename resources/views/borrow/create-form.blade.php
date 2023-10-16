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
                <form action="{{ route('borrow.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Peminjaman Aset</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="employee_id">Nama Peminjam</label>
                                <select class="form-control @error('employee_id') is-invalid @enderror" id="employee_id"
                                    name="employee_id" required>
                                    <option value="" disabled selected>Pilih Nama</option>
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
                                <label for="asset_id">Barang</label>
                                <select class="form-control @error('asset_id') is-invalid @enderror" id="asset_id"
                                    name="asset_id" required>
                                    <option value="" disabled selected>Pilih Barang</option>
                                    @foreach ($asset as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('asset_id') == $data->id ? 'selected' : '' }}>
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
                                <label for="borrow_date">Tanggal Pinjam</label>
                                <input type="text" class="form-control @error('borrow_date') is-invalid @enderror"
                                    id="borrow_date" name="borrow_date" autocomplete="off" value="{{ old('borrow_date') }}"
                                    required>
                                @error('borrow_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="return_date">Tanggal Kembali</label>
                                <input type="text" class="form-control @error('return_date') is-invalid @enderror"
                                    id="return_date" name="return_date" autocomplete="off" value="{{ old('return_date') }}"
                                    required>
                                @error('return_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status_borrow_id">Status</label>
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
                            <div class="form-group" id="uploadletter" style="display: none;">
                                <label for="letter">Upload Surat</label>
                                <input type="file" class="form-control @error('letter') is-invalid @enderror"
                                    id="letter" name="letter" value="{{ old('letter') }}">
                                @error('letter')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Create</button>
                            <a href="{{ route('borrow.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
