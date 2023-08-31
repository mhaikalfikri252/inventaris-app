@extends('slice.app')

@section('title')
    Pinjam Aset {{ $lending->asset->asset_code }}
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pinjam Aset</h1>
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
                    <a href="{{ route('lending.index') }}" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i>
                        Back</a>
                    <div class="col mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Pinjam Aset
                                    {{ $lending->asset->asset_code }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Nama : </label>
                                    <div class="col-sm-10">
                                        {{ $lending->person_name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Barang : </label>
                                    <div class="col-sm-10">
                                        {{ $lending->asset->asset_code . ' ' . $lending->asset->asset_name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Tanggal Peminjaman : </label>
                                    <div class="col-sm-10">
                                        {{ \Carbon\Carbon::parse($lending->loan_date)->format('d/m/Y') }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Tanggal Pengembalian : </label>
                                    <div class="col-sm-10">
                                        {{ \Carbon\Carbon::parse($lending->return_date)->format('d/m/Y') }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Status : </label>
                                    <div class="col-sm-10">
                                        {{ $lending->status_lending->status_name }}
                                    </div>
                                </div>
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
