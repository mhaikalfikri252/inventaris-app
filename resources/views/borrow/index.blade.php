@extends('slice.app')

@section('title')
    Peminjaman Aset
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Peminjaman Aset</h1>
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
                        <a href="{{ route('borrow.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Create</a>
                    </div>
                    <div class="col mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Peminjaman Aset</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Peminjam</th>
                                            <th>No FA</th>
                                            <th>Barang</th>
                                            <th>Lokasi</th>
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
                                                <td>{{ $data->person_name }}</td>
                                                <td>{{ $data->asset->asset_code }}</td>
                                                <td>{{ $data->asset->asset_name }}</td>
                                                <td>{{ $data->asset->location }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->borrow_date)->format('d/m/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->return_date)->format('d/m/Y') }}</td>
                                                @if ($data->status_borrow->id == 2 && $data->borrow_date == $data->return_date)
                                                    <td style="color: red;">
                                                        {{ $data->status_borrow->status_name }}</td>
                                                    <td>
                                                    @elseif ($data->status_borrow->id == 2 && $data->return_date == date('Y-m-d'))
                                                    <td style="color: red;">
                                                        {{ $data->status_borrow->status_name }}</td>
                                                    <td>
                                                    @elseif ($data->status_borrow->id == 1)
                                                    <td style="color: green;">
                                                        {{ $data->status_borrow->status_name }}</td>
                                                    <td>
                                                    @else
                                                    <td style="color: blue;">
                                                        {{ $data->status_borrow->status_name }}</td>
                                                    <td>
                                                @endif

                                                <a href="#" class="btn btn-info">Print</a>
                                                <a href="{{ route('borrow.show', $data->id) }}"
                                                    class="btn btn-primary">Detail</a>
                                                <a href="{{ route('borrow.edit', $data->id) }}"
                                                    class="btn btn-warning">Update</a>
                                                <form action="{{ route('borrow.destroy', $data->id) }}" method="post"
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
                                            <th>Nama Peminjam</th>
                                            <th>No FA</th>
                                            <th>Barang</th>
                                            <th>Lokasi</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
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
