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
                <form action="{{ isset($borrow) ? route('borrow.update', $borrow->id) : route('borrow.store') }}"
                    method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Peminjaman Aset</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="employee_id">Nama Peminjam</label>
                                    <select class="form-control @error('employee_id') is-invalid @enderror" id="employee_id"
                                        name="employee_id" required>
                                        <option value="" disabled selected>Pilih Nama</option>
                                        @foreach ($employee as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $borrow->employee_id ? 'selected' : '' }}>
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
                                        name="asset_id">
                                        <option value="" disabled selected>
                                            {{ $borrow->asset->asset_code . ' ' . $borrow->asset->asset_name }}</option>
                                        {{-- @foreach ($asset as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $borrow->asset_id ? 'selected' : '' }}>
                                                {{ $data->asset_code . ' ' . $data->asset_name }}
                                             </option> --}}
                                        @error('asset_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        {{-- @endforeach --}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="borrow_date">Tanggal Pinjam</label>
                                    <input type="text" class="form-control @error('borrow_date') is-invalid @enderror"
                                        id="borrow_date" name="borrow_date" autocomplete="off"
                                        value="{{ old('borrow_date', $borrow->borrow_date) }}" required>
                                    @error('borrow_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="return_date">Tanggal Kembali</label>
                                    <input type="text" class="form-control @error('return_date') is-invalid @enderror"
                                        id="return_date" name="return_date" autocomplete="off"
                                        value="{{ old('return_date', $borrow->return_date) }}" required>
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
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $borrow->status_borrow_id ? 'selected' : '' }}>
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
                                @if ($borrow->status_borrow_id == 1)
                                    <div class="form-group" id="fileupload" style="display: block;">
                                    @else
                                        <div class="form-group" id="fileupload" style="display: none;">
                                @endif
                                <label for="letter">Upload Surat</label>
                                <input type="file" class="form-control @error('letter') is-invalid @enderror"
                                    id="letter" name="letter">
                                @error('letter')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @if ($borrow->letter == !null)
                                    <a href="{{ asset('files/' . $borrow->letter) }}">Lihat Upload Surat</a>
                                @endif
                            </div>



                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('borrow.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            </form>
    </div><!-- /.container-fluid -->
    </section>
    </div>
@endsection
