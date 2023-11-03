@extends('slice2.app')

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
                                <div class="card-header">
                                    <div class="row">
                                        <a href="{{ route('asset.create') }}" class="btn btn-success"
                                            style="margin-left: 15px"> <i class="fa fa-plus"></i>
                                            Create</a>
                                        <a href="#" class="btn btn-primary"
                                            style="margin-left: 10px" onclick="printAssetQR()">
                                            <i class="fa fa-print"></i>
                                            Print</a>
                                    </div>
                                    <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                </div>
                                <div class="card-block">
                                    {{-- <div class="dt-responsive table-responsive">
                                        <table class="m-b-20">
                                            <tbody>
                                                <tr>
                                                    <td>Kota:</td>
                                                    <td>
                                                        <input class="form-control" type="text" id="searchcity"
                                                            name="searchcity">
                                                    </td>
                                                </tr> --}}
                                    {{-- <tr>
                                                    <td>Maximal Tahun:</td>
                                                    <td>
                                                        <input class="form-control" type="text" id="max"
                                                            name="max">
                                                    </td>
                                                </tr> --}}
                                    {{-- </tbody>
                                        </table>
                                    </div> --}}
                                    <div class="dt-responsive table-responsive">
                                        @if (auth()->user()->role_id == 1)
                                            <table id="asset-search" class="table table-striped table-bordered nowrap">
                                            @else
                                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        @endif
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
                                                            class="btn btn-info"><i class="fa fa-qrcode"></i></a>
                                                        <a href="{{ route('create.borrow.byid', $data->id) }}"
                                                            class="btn btn-secondary"><i class="fa fa-handshake-o"></i></a>
                                                        <a href="{{ route('asset.edit', $data->id) }}"
                                                            class="btn btn-warning"><i class="ti-pencil-alt"></i></a>
                                                        <form action="{{ route('asset.destroy', $data->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-danger"
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
