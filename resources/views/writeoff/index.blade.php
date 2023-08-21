@extends('slice.app')

@section('title')
    Aset Write Off
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Aset Write Off</h1>
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
                    <div class="col-md-2">
                        {{-- <a href="{{ route('asset.create') }}" class="btn btn-success">Tambah Aset Write Off</a> --}}
                    </div>
                    <div class="col mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Aset Write Off</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No FA</th>
                                            <th>Nama</th>
                                            <th>Fasilitas</th>
                                            <th>Tanggal</th>
                                            <th>Lokasi</th>
                                            <th>Pic</th>
                                            <th>Harga</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>QR Code</th>
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
                                                <td>{{ \Carbon\Carbon::parse($data->purchase_date)->format('d/m/Y') }}</td>
                                                <td>{{ $data->location }}</td>
                                                <td>{{ $data->pic }}</td>
                                                <td>{{ rupiah($data->price) }}</td>
                                                <td>
                                                    <img src="{{ asset('images/' . $data->photo) }}"
                                                        style="width: 100px; height: 70px;">
                                                </td>
                                                <td>{{ $data->status->status_name }}</td>
                                                <td>{{ $data->information }}</td>
                                                <td>{!! QrCode::generate($data->asset_code) !!}</td>
                                                <td>
                                                    <a href="{{ route('asset.show', $data->id) }}"
                                                        class="btn btn-primary">Show</a>
                                                    <a href="{{ route('asset.edit', $data->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('asset.destroy', $data->id) }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger"
                                                            onclick="return confirm('Apakah anda yakin ingin menghapus aset?')">
                                                            Delete
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
                                            <th>Tanggal</th>
                                            <th>Lokasi</th>
                                            <th>Pic</th>
                                            <th>Harga</th>
                                            <th>Photo</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>QR Code</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
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