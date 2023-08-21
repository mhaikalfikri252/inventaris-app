@extends('slice.app')

@section('title')
    Aset {{ $asset->asset_code }}
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Aset</h1>
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
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                    <div class="col mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Aset {{ $asset->asset_code }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col col-label-form">No FA : </label>
                                    <div class="col-sm-10">
                                        {{ $asset->asset_code }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Nama : </label>
                                    <div class="col-sm-10">
                                        {{ $asset->asset_name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Fasilitas : </label>
                                    <div class="col-sm-10">
                                        {{ $asset->facility->facility_name . ' ' . $asset->facility->city->city_name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Tanggal : </label>
                                    <div class="col-sm-10">
                                        {{ \Carbon\Carbon::parse($asset->purchase_date)->format('d/m/Y') }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Lokasi : </label>
                                    <div class="col-sm-10">
                                        {{ $asset->location }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Pic : </label>
                                    <div class="col-sm-10">
                                        {{ $asset->pic }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Harga : </label>
                                    <div class="col-sm-10">
                                        {{ rupiah($asset->price) }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Foto : </label>
                                    <div class="col-sm-10">
                                        <img src="{{ asset('images/' . $asset->photo) }}"
                                            style="width: 100px; height: 70px;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Status : </label>
                                    <div class="col-sm-10">
                                        {{ $asset->status->status_name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Keterangan : </label>
                                    <div class="col-sm-10">
                                        {{ $asset->information }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">QR Code : </label>
                                    <div class="col-sm-10">
                                        <td>{!! QrCode::generate($asset->asset_code) !!}</td>
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
