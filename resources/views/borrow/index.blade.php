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
                                                <td>{{ $data->employee->employee_name }}</td>
                                                <td>{{ $data->asset->asset_code }}</td>
                                                <td>{{ $data->asset->asset_name }}</td>
                                                <td>{{ $data->asset->location }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->borrow_date)->format('d/m/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->return_date)->format('d/m/Y') }}</td>
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
                                                        class="btn btn-info"><i class="fas fa-file-pdf"></i></a>
                                                    <a href="{{ asset('files/' . $data->letter) }}"
                                                        class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    {{-- <a href="{{ route('borrow.edit', $data->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
                                                    <a href="" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#modal-default"><i class="fas fa-upload"></i></a>
                                                    <form action="{{ route('borrow.destroy', $data->id) }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger"
                                                            onclick="return confirm('Apakah anda yakin ingin menghapus aset?')">
                                                            <i class="fas fa-trash-alt"></i>
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

            {{-- Modal Upload Letter --}}
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Default Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('borrow.update', $borrow->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="{{ route('borrow.edit', $data->id) }}" type="button" class="btn btn-primary">Save</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

        </section>
    </div>
@endsection
