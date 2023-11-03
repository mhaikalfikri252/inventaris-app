@extends('slice2.app')

@section('title')
    Inventaris
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
                                    <i class="fa fa-paste bg-c-red"></i>
                                @else
                                    <i class="fa fa-paste bg-c-yellow"></i>
                                @endif
                                <div class="d-inline">
                                    <h4 class="mt-3">Daftar Inventaris</h4>
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
                                        <a href="{{ route('inventory.create') }}" class="btn btn-success"
                                            style="margin-left: 15px"> <i class="fa fa-plus"></i>
                                            Create</a>
                                        <a href="#" class="btn btn-primary" onclick="printAllInventoryQR()"
                                            style="margin-left: 10px">
                                            <i class="fa fa-print"></i>
                                            Print</a>
                                    </div>
                                    <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="table-default" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Fasilitas</th>
                                                    <th>Tanggal Beli</th>
                                                    <th>Lokasi</th>
                                                    <th>Pic</th>
                                                    <th>Harga</th>
                                                    <th>Foto</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($no = 1)
                                                @foreach ($inventory as $data)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->id }}</td>
                                                        <td>{{ $data->inventory_name }}</td>
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
                                                        <td>{{ $data->information }}</td>
                                                        <td>
                                                            <a href="{{ route('print.inventory.qrcode', $data->id) }}"
                                                                class="btn btn-info" target="_blank">
                                                                <i class="fa fa-qrcode"></i></a>
                                                            <a href="{{ route('inventory.edit', $data->id) }}"
                                                                class="btn btn-warning"><i class="ti-pencil-alt"></i></a>
                                                            <form action="{{ route('inventory.destroy', $data->id) }}"
                                                                method="POST" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn-danger"
                                                                    onclick="return confirm('Apakah anda yakin ingin menghapus inventaris?')">
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
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Fasilitas</th>
                                                    <th>Tanggal Beli</th>
                                                    <th>Lokasi</th>
                                                    <th>Pic</th>
                                                    <th>Harga</th>
                                                    <th>Foto</th>
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
