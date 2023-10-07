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
                                            <th>Tanggal Beli</th>
                                            <th>Lokasi</th>
                                            <th>Pic</th>
                                            <th>Harga</th>
                                            <th>Foto</th>
                                            <th>Tanggal Write Off</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            {{-- <th>QR Code</th> --}}
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
                                                <td>{{ $data->employee->employee_name }}</td>
                                                <td>{{ rupiah($data->price) }}</td>
                                                <td>
                                                    <img src="{{ asset('images/' . $data->photo) }}"
                                                        style="width: 100px; height: 80px;">
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('d/m/Y') }}</td>
                                                <td>{{ $data->status_asset->status_name }}</td>
                                                <td>{{ $data->information }}</td>
                                                {{-- <td>
                                                    <img src="data:image/png;base64, {!! base64_encode(
                                                        QrCode::format('png')->generate(
                                                            'No FA : ' .
                                                                $data->asset_code .
                                                                "\n" .
                                                                'Nama : ' .
                                                                $data->asset_name .
                                                                "\n" .
                                                                'Fasilitas : ' .
                                                                $data->facility->facility_name .
                                                                ' ' .
                                                                $data->facility->city->city_name .
                                                                "\n" .
                                                                'Tanggal Beli : ' .
                                                                \Carbon\Carbon::parse($data->purchase_date)->format('d/m/Y') .
                                                                "\n" .
                                                                'Lokasi : ' .
                                                                $data->location .
                                                                "\n" .
                                                                'Pic : ' .
                                                                $data->employee->employee_name .
                                                                "\n" .
                                                                'Harga : ' .
                                                                $data->price .
                                                                "\n" .
                                                                'Status : ' .
                                                                $data->status->status_name .
                                                                "\n" .
                                                                'Keterangan : ' .
                                                                $data->information,
                                                        ),
                                                    ) !!} ">
                                                </td> --}}
                                                <td>
                                                    <a href="{{ route('asset.edit', $data->id) }}"
                                                        class="btn btn-warning">Update</a>
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
                                            <th>Tanggal Beli</th>
                                            <th>Lokasi</th>
                                            <th>Pic</th>
                                            <th>Harga</th>
                                            <th>Foto</th>
                                            <th>Tanggal Write Off</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            {{-- <th>QR Code</th> --}}
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
