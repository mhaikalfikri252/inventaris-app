@extends('slice2.app')

@section('title')
    Write Off
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
                                    <i class="fa fa-times-rectangle-o bg-c-purple"></i>
                                @else
                                    <i class="fa fa-times-rectangle-o bg-c-green"></i>
                                @endif
                                <div class="d-inline">
                                    <h4 class="mt-3">Daftar Aset Write Off</h4>
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
                                    <a href="#" class="btn btn-primary btn-style" onclick="printAllAssetQRUser()">
                                        <i class="fa fa-print"></i> Print</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="table-default" class="table table-striped table-bordered nowrap">
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
                                                    <th>Tanggal Write Off</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($no = 1)
                                                @foreach ($writeoff as $data)
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
                                                                style="width: 80px; height: 100px;">
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
                                                        <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('d/m/Y') }}
                                                        </td>
                                                        <td>{{ $data->information }}</td>
                                                        <td>
                                                            <a href="{{ route('print.asset.qrcode', $data->id) }}"
                                                                class="btn btn-info btn-style" target="_blank">
                                                                <i class="fa fa-qrcode"></i></a>
                                                            <a href="{{ route('asset.edit', $data->id) }}"
                                                                class="btn btn-warning btn-style"><i
                                                                    class="ti-pencil-alt"></i></a>
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
                                                    <th>Tanggal Write Off</th>
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
