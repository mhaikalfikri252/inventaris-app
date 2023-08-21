@extends('slice.app')

@section('title')
    Inventaris
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Inventaris</h1>
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
                        <a href="{{ route('city.create') }}" class="btn btn-success">Tambah Inventaris</a>
                    </div>
                    <div class="col mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Inventaris</h3>
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
                                        <td>1</td>
                                        <td>2009FA8141</td>
                                        <td>1 unit Laptop Samsung Chromebook 4</td>
                                        <td>SFC Banda Aceh</td>
                                        <td>19/12/2022</td>
                                        <td>R. Server</td>
                                        <td>Reza</td>
                                        <td>Rp.1.000.0000-.</td>
                                        <td>Foto</td>
                                        <td>Baik</td>
                                        <td>Tagging OK</td>
                                        <td>QR Code</td>
                                        <td>
                                            <a href="" class="btn btn-primary">Show</a>
                                            <a href="" class="btn btn-warning">Edit</a>
                                            <form action="" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                        {{-- @php($no = 1) --}}
                                        {{-- @foreach ($asset as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                {{-- <td>{{ $data->city_name }}</td> --}}
                                        {{-- <td>
                                                    <a href="{{ route('city.show', $data->id) }}"
                                                        class="btn btn-primary">Show</a>
                                                    <a href="{{ route('city.edit', $data->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('city.destroy', $data->id) }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger"
                                                            onclick="return confirm('Are you sure?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach --}}
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
