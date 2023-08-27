@extends('slice.app')

@section('title')
    Inventaris {{ $inventory->inventory_name }}
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Inventaris</h1>
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
                    <a href="{{ route('inventory.index') }}" class="btn btn-primary">Kembali</a>
                    <div class="col mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Inventaris {{ $inventory->inventory_name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Nama : </label>
                                    <div class="col-sm-10">
                                        {{ $inventory->inventory_name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Fasilitas : </label>
                                    <div class="col-sm-10">
                                        {{ $inventory->facility->facility_name . ' ' . $inventory->facility->city->city_name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Tanggal : </label>
                                    <div class="col-sm-10">
                                        {{ \Carbon\Carbon::parse($inventory->purchase_date)->format('d/m/Y') }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Lokasi : </label>
                                    <div class="col-sm-10">
                                        {{ $inventory->location }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Pic : </label>
                                    <div class="col-sm-10">
                                        {{ $inventory->pic }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Harga : </label>
                                    <div class="col-sm-10">
                                        {{ rupiah($inventory->price) }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Foto : </label>
                                    <div class="col-sm-10">
                                        <img src="{{ asset('images/' . $inventory->photo) }}"
                                            style="width: 100px; height: 70px;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">Keterangan : </label>
                                    <div class="col-sm-10">
                                        {{ $inventory->information }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-label-form">QR Code : </label>
                                    <div class="col-sm-10">
                                        <img src="data:image/png;base64, {!! base64_encode(
                                            QrCode::format('png')->generate(
                                                'Nama : ' .
                                                    $inventory->inventory_name .
                                                    "\n" .
                                                    'Fasilitas : ' .
                                                    $inventory->facility->facility_name .
                                                    ' ' .
                                                    $inventory->facility->city->city_name .
                                                    "\n" .
                                                    'Tanggal : ' .
                                                    \Carbon\Carbon::parse($inventory->purchase_date)->format('d/m/Y') .
                                                    "\n" .
                                                    'Lokasi : ' .
                                                    $inventory->location .
                                                    "\n" .
                                                    'Pic : ' .
                                                    $inventory->pic .
                                                    "\n" .
                                                    'Harga : ' .
                                                    $inventory->price .
                                                    "\n" .
                                                    'Keterangan : ' .
                                                    $inventory->information,
                                            ),
                                        ) !!} ">
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
