@extends('slice2.app')

@section('title')
    Peminjaman Aset
@endsection

@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                @if (auth()->user()->role_id == 1)
                                    <i class="fa fa-handshake-o bg-c-light-blue"></i>
                                @else
                                    <i class="fa fa-handshake-o bg-c-brown"></i>
                                @endif
                                <div class="d-inline">
                                    <h4 class="mt-3">Detail Data Peminjaman Aset</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    {{-- <h5>Data Peminjaman Aset</h5> --}}
                                    <a href="{{ route('borrow.index') }}" class="btn btn-danger">
                                        <i class="fa fa-arrow-left"></i> Back</a>
                                    <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-spinner-alt-5"></i>
                                    </div>
                                </div>


                                <div class="card-block">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-label-form">Nama Peminjam : </label>
                                        <div class="col-sm-10">
                                            {{ $borrow->employee->employee_name }}
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
                                            {{ $borrow->asset->employee->employee_name }}
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
                                                style=" max-width:40%; max-height: 80%;">
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
                                    @if ($borrow->status_borrow->id == 2)
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-label-form">Surat Pinjam : </label>
                                            @if ($borrow->letter == !null)
                                                <div class="col-sm-10">
                                                    <a href="{{ asset('files/' . $borrow->letter) }}">Lihat Upload
                                                        Surat</a>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
