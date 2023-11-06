@extends('slice.app')

@section('title')
    Karyawan
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
                                <i class="fa fa-group bg-c-green"></i>
                                <div class="d-inline">
                                    <h4 class="mt-3">Daftar Karyawan</h4>
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
                                    <a href="{{ route('employee.create') }}" class="btn btn-success btn-style">
                                        <i class="fa fa-plus"></i> Tambah</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="table-default" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Kota</th>
                                                    <th>Alamat</th>
                                                    <th>No Hp</th>
                                                    <th>Jabatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($no = 1)
                                                @foreach ($employee as $data)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->employee_name }}</td>
                                                        <td>{{ $data->city->city_name }} </td>
                                                        <td>{{ $data->address }}</td>
                                                        <td>{{ $data->phone }}</td>
                                                        <td>{{ $data->position }}</td>
                                                        <td>
                                                            <a href="{{ route('employee.edit', $data->id) }}"
                                                                class="btn btn-warning btn-style">
                                                                <i class="ti-pencil-alt"></i>
                                                            </a>
                                                            <form action="{{ route('employee.destroy', $data->id) }}"
                                                                method="POST" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn-danger btn-style"
                                                                    onclick="return confirm('Apakah anda yakin ingin menghapus karyawan?')">
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
                                                    <th>Nama</th>
                                                    <th>Kota</th>
                                                    <th>Alamat</th>
                                                    <th>No Hp</th>
                                                    <th>Jabatan</th>
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
