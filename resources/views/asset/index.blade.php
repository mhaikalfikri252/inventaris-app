@extends('slice.app')

@section('title')
    Aset
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
                                    <i class="fa fa-cube bg-c-tosca"></i>
                                @else
                                    <i class="fa fa-cube bg-c-pink"></i>
                                @endif
                                <div class="d-inline">
                                    <h4 class="mt-3">Daftar Aset</h4>
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
                            <!-- Zero config.table start -->
                            <div class="card">
                                @if (auth()->user()->role_id == 2)
                                    <div class="card-header">
                                        <div class="row">
                                            <a href="{{ route('asset.create') }}" class="btn btn-success btn-addsave">
                                                <i class="fa fa-plus"></i> Tambah</a>
                                            <a href="#" class="btn btn-primary btn-printcancel"
                                                onclick="printAllAssetQR()"> <i class="fa fa-print"></i> Print</a>
                                        </div>
                                    </div>
                                @endif
                                <div class="card-block">
                                    @if (auth()->user()->role_id == 1)
                                        <div class="">
                                            <div class="row">
                                                <div class="">
                                                    <a href="{{ route('asset.create') }}"
                                                        class="btn btn-success btn-addsave">
                                                        <i class="fa fa-plus"></i> Tambah</a>
                                                    <a href="#" class="btn btn-primary btn-printcancel"
                                                        onclick="printAllAssetQR()">
                                                        <i class="fa fa-print"></i> Print</a>
                                                </div>
                                                <div class="ml-auto" style="padding-right: 16px">
                                                    <input rel="3" type="text"
                                                        class="search form-control input-sm" placeholder="Search Kota">
                                                    <input rel="4" type="text"
                                                        class="search form-control input-sm mt-2"
                                                        placeholder="Search Tahun">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="dt-responsive table-responsive">
                                        <table id="table-asset" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>No FA</th>
                                                    <th>Nama</th>
                                                    <th>Fasilitas</th>
                                                    <th>Tanggal Beli</th>
                                                    <th>Lokasi</th>
                                                    <th>Pic</th>
                                                    <th>Harga</th>
                                                    <th>Foto</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($no = 1)
                                                @foreach ($asset as $data)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->asset_code }}</td>
                                                        <td>{{ $data->asset_name }}</td>
                                                        <td>{{ $data->facility->facility_name . ' ' . $data->facility->city->city_name }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($data->purchase_date)->format('d/m/Y') }}
                                                        </td>
                                                        <td>{{ $data->location }}</td>
                                                        <td>{{ $data->employee->employee_name }}</td>
                                                        <td>{{ rupiah($data->price) }}</td>
                                                        <td>
                                                            <img src="{{ asset('images/' . $data->photo) }}"
                                                                style="width: 80px; height: 80px;">
                                                        </td>
                                                        @if ($data->status_asset->id == 2)
                                                            <td><small class="badge badge-danger">
                                                                    {{ $data->status_asset->status_name }}
                                                                </small>
                                                            </td>
                                                        @else
                                                            <td><small class="badge badge-success">
                                                                    {{ $data->status_asset->status_name }}
                                                                </small>
                                                            </td>
                                                        @endif
                                                        <td>{{ $data->information }}</td>
                                                        <td>
                                                            <a href="{{ route('print.asset.qrcode', $data->id) }}"
                                                                class="btn btn-info btn-style" target="_blank">
                                                                <i class="fa fa-qrcode"></i>
                                                            </a>
                                                            <a href="{{ route('create.borrow.byid', $data->id) }}"
                                                                class="btn btn-secondary btn-style"><i
                                                                    class="fa fa-handshake-o"></i>
                                                            </a>
                                                            <a href="{{ route('asset.edit', $data->id) }}"
                                                                class="btn btn-warning btn-style"><i
                                                                    class="ti-pencil-alt"></i>
                                                            </a>
                                                            <form action="{{ route('asset.destroy', $data->id) }}"
                                                                method="POST" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn-danger btn-style"
                                                                    onclick="return confirm('Apakah anda yakin ingin menghapus aset?')">
                                                                    <i class="ti-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>No FA</th>
                                                    <th>Nama</th>
                                                    <th>Fasilitas</th>
                                                    <th>Tanggal Beli</th>
                                                    <th>Lokasi</th>
                                                    <th>Pic</th>
                                                    <th>Harga</th>
                                                    <th>Foto</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Zero config.table end -->
            </div>
        </div>
    </div>
@endsection
