@extends('slice2.app')

@section('title')
    Kota
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
                                <i class="fa fa-map-marker bg-c-yellow"></i>
                                <div class="d-inline">
                                    <h4 class="mt-3">Daftar Kota</h4>
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
                                    <a href="{{ route('city.create') }}" class="btn btn-success">
                                        <i class="fa fa-plus"></i> Create</a>
                                    <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($no = 1)
                                                @foreach ($city as $data)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->city_name }}</td>
                                                        <td>
                                                            <a href="{{ route('city.edit', $data->id) }}"
                                                                class="btn btn-warning"><i class="ti-pencil-alt"></i></a>
                                                            <form action="{{ route('city.destroy', $data->id) }}"
                                                                method="POST" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn-danger"
                                                                    onclick="return confirm('Apakah anda yakin ingin menghapus kota?')">
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
