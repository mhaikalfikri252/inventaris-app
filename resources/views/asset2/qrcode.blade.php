<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print QR Code</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="col">
                        <div class="row mb-3" style="text-align: center; border:1px solid #000; width:30%">
                            <br>
                            <div>
                                <img src="data:image/png;base64, {!! base64_encode(
                                    QrCode::size(150)->format('png')->generate(
                                            'No FA : ' .
                                                $asset->asset_code .
                                                "\n" .
                                                'Nama : ' .
                                                $asset->asset_name .
                                                "\n" .
                                                'Fasilitas : ' .
                                                $asset->facility->facility_name .
                                                ' ' .
                                                $asset->facility->city->city_name .
                                                "\n" .
                                                'Tanggal : ' .
                                                \Carbon\Carbon::parse($asset->purchase_date)->format('d/m/Y') .
                                                "\n" .
                                                'Lokasi : ' .
                                                $asset->location .
                                                "\n" .
                                                'Pic : ' .
                                                $asset->employee->employee_name .
                                                "\n" .
                                                'Harga : ' .
                                                $asset->price .
                                                "\n" .
                                                'Status : ' .
                                                $asset->status_asset->status_name .
                                                "\n" .
                                                'Keterangan : ' .
                                                $asset->information,
                                        ),
                                ) !!} ">
                            </div>
                            <br>
                            <div> {{ $asset->asset_code }} </div>
                            <div> {{ $asset->asset_name }} </div>
                            <div> {{ $asset->location }} </div>
                            <br>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </div>

</body>

</html>
