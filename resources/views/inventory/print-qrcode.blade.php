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
                        <div class="row mb-3" style="text-align: center; border:1px solid #000; width:20%">
                            <br>
                            <div>
                                <img src="data:image/png;base64, {!! base64_encode(
                                    QrCode::format('png')->generate(
                                        'Nama : ' .
                                            $inventory->inventory_name .
                                            "\n" .
                                            'Fasilitas : ' .
                                            $inventory->facility->facility_name .
                                            ' ' .
                                            $inventory->facility->city->city_name .
                                            "\n" .
                                            'Tanggal Beli : ' .
                                            \Carbon\Carbon::parse($inventory->purchase_date)->format('d/m/Y') .
                                            "\n" .
                                            'Lokasi : ' .
                                            $inventory->location .
                                            "\n" .
                                            'Pic : ' .
                                            $inventory->employee->employee_name .
                                            "\n" .
                                            'Harga : ' .
                                            $inventory->price .
                                            "\n" .
                                            'Keterangan : ' .
                                            $inventory->information,
                                    ),
                                ) !!} ">
                            </div>
                            <br>
                            <div> {{ $inventory->inventory_name }} </div>
                            <div> {{ $inventory->location }} </div>
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
