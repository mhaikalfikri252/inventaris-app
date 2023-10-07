@extends('slice.app')

@section('title')
    Peminjaman Aset {{ $borrow->asset->asset_code }}
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Peminjaman Aset</h1>
                    </div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="col">
                    <a href="{{ route('borrow.index') }}" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i>
                        Back</a>
                    <div class="col mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Detail Aset</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Nama Peminjam : </label>
                                    <div class="col-sm-10">
                                        {{ $borrow->person_name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Barang : </label>
                                    <div class="col-sm-10">
                                        {{ $borrow->asset->asset_code . ' ' . $borrow->asset->asset_name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Fasilitas : </label>
                                    <div class="col-sm-10">
                                        {{ $borrow->asset->facility->facility_name . ' ' . $borrow->asset->facility->city->city_name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Tanggal Beli : </label>
                                    <div class="col-sm-10">
                                        {{ \Carbon\Carbon::parse($borrow->asset->purchase_date)->format('d/m/Y') }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Lokasi : </label>
                                    <div class="col-sm-10">
                                        {{ $borrow->asset->location }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Pic : </label>
                                    <div class="col-sm-10">
                                        {{ $borrow->asset->pic }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Harga : </label>
                                    <div class="col-sm-10">
                                        {{ $borrow->asset->price }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Foto : </label>
                                    <div class="col-sm-10">
                                        <img src="{{ asset('images/' . $borrow->asset->photo) }}"
                                            class="photo-preview img-fluid mt-3 col-sm-2" alt="photo"
                                            style=" max-width:100%; max-height: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Keterangan : </label>
                                    <div class="col-sm-10">
                                        {{ $borrow->asset->information }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Tanggal Pinjam : </label>
                                    <div class="col-sm-10">
                                        {{ \Carbon\Carbon::parse($borrow->borrow_date)->format('d/m/Y') }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Tanggal Kembali : </label>
                                    <div class="col-sm-10">
                                        {{ \Carbon\Carbon::parse($borrow->return_date)->format('d/m/Y') }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Status : </label>
                                    <div class="col-sm-10">
                                        {{ $borrow->status_borrow->status_name }}
                                    </div>
                                </div>
                                @if ($borrow->status_borrow->status_name == 'Sudah Dikembalikan')
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-label-form">Surat Pinjam : </label>
                                        <div class="col-sm-10">
                                            {{ $borrow->status_borrow->status_name }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
