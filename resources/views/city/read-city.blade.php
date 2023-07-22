@extends('slice.app')

@section('title')
    Kota {{ $city->city_name }}
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kota {{ $city->city_name }}</h1>
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
                    {{-- <div class="col-md-2">
                        <a href="{{ route('city.create') }}" class="btn btn-primary">Tambah</a>
                    </div> --}}
                    <div class="col mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Kota {{ $city->city_name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kota</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($no = 1)
                                        @foreach ($city as $data)
                                            <tr>
                                                {{-- <td>{{ $no++ }}</td>
                                                <td>{{ $row->city_name }}</td>
                                                <td>

                                                    <a href="{{ route('city.edit', $row->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('city.destroy', $row->id) }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger"
                                                            onclick="return confirm('Are you sure?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kota</th>
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