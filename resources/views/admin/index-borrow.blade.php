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
                                                <td>{{ \Carbon\Carbon::parse($data->borrow_date)->format('d/m/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->return_date)->format('d/m/Y') }}</td>
                                                <td>{{ $data->status_borrow->status_name }}</td>
                                                <td>
                                                    <a href="{{ route('borrow.edit', $data->id) }}"
                                                        class="btn btn-info">Show</a>
                                                    {{-- <a href="{{ route('borrow.edit', $data->id) }}"
                                                        class="btn btn-warning">Edit</a> --}}
                                                    <form action="{{ route('admin.borrow.destroy', $data->id) }}"
                                                        method="post" class="d-inline">
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
