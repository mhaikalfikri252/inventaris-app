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
                                    <h4 class="mt-3">Daftar Peminjaman Aset</h4>
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
                                    <a href="{{ route('borrow.create') }}" class="btn btn-success btn-addsave">
                                        <i class="fa fa-plus"></i> Tambah</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="table-default" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Peminjam</th>
                                                    <th>No FA</th>
                                                    <th>Barang</th>
                                                    <th>Lokasi</th>
                                                    @if (auth()->user()->role_id == 1)
                                                        <th>Kota</th>
                                                    @endif
                                                    <th>Tanggal Pinjam</th>
                                                    <th>Tanggal Kembali</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($no = 1)
                                                @foreach ($borrow as $data)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->employee->employee_name }}</td>
                                                        <td>{{ $data->asset->asset_code }}</td>
                                                        <td>{{ $data->asset->asset_name }}</td>
                                                        <td>{{ $data->asset->location }}</td>
                                                        @if (auth()->user()->role_id == 1)
                                                            <td>{{ $data->asset->facility->city->city_name }}</td>
                                                        @endif
                                                        <td>{{ \Carbon\Carbon::parse($data->borrow_date)->format('d/m/Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($data->return_date)->format('d/m/Y') }}
                                                        </td>
                                                        @if ($data->status_borrow->id == 1 && $data->borrow_date == $data->return_date)
                                                            <td><small class="badge badge-danger">
                                                                    {{ $data->status_borrow->status_name }}
                                                                </small>
                                                            </td>
                                                        @elseif ($data->status_borrow->id == 1 && $data->return_date == date('Y-m-d'))
                                                            <td><small class="badge badge-danger">
                                                                    {{ $data->status_borrow->status_name }}
                                                                </small>
                                                            </td>
                                                        @elseif ($data->status_borrow->id == 2)
                                                            <td><small class="badge badge-success">
                                                                    {{ $data->status_borrow->status_name }}
                                                                </small>
                                                            </td>
                                                        @else
                                                            <td><small class="badge badge-primary">
                                                                    {{ $data->status_borrow->status_name }}
                                                                </small>
                                                            </td>
                                                        @endif
                                                        <td>
                                                            <a href="{{ route('print.borrow.letter', $data->id) }}"
                                                                class="btn btn-info btn-style" target="_blank">
                                                                <i class="fa fa-file-pdf-o"></i>
                                                            </a>
                                                            @if ($data->letter != null)
                                                                <a href="{{ asset('files/' . $data->letter) }}"
                                                                    class="btn btn-secondary btn-style" target="_blank">
                                                                    <i class="ti-eye"></i></a>
                                                            @endif
                                                            <a href="{{ route('borrow.edit', $data->id) }}"
                                                                class="btn btn-warning btn-style">
                                                                <i class="fa fa-upload"></i></a>
                                                            {{-- <a href="{{ route('borrow.show', $data->id) }}"
                                                                class="btn btn-info"><i class="ti-eye"></i></a> --}}
                                                            <form action="{{ route('borrow.destroy', $data->id) }}"
                                                                method="POST" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn-danger btn-style"
                                                                    onclick="return confirm('Apakah anda yakin ingin menghapus peminjaman aset?')">
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
                                                    <th>Nama Peminjam</th>
                                                    <th>No FA</th>
                                                    <th>Barang</th>
                                                    <th>Lokasi</th>
                                                    @if (auth()->user()->role_id == 1)
                                                        <th>Kota</th>
                                                    @endif
                                                    <th>Tanggal Pinjam</th>
                                                    <th>Tanggal Kembali</th>
                                                    <th>Status</th>
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
