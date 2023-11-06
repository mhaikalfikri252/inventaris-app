<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Inventaris QR Code</title>
</head>

<body>
    @foreach ($inventory->chunk(3) as $chunk)
        <div style="width: 60em; height: 20em;">
            @foreach ($chunk as $data)
                <div style="text-align: center; border:1px solid #000; width: 12em; float: left; margin: 1em;">
                    <br>
                    <div>
                        <img src="data:image/png;base64, {!! base64_encode(
                            QrCode::size(150)->format('png')->merge(public_path('images\logo.png'), 0.3, true)->errorCorrection('H')->generate(
                                    'Nama : ' .
                                        $data->inventory_name .
                                        "\n" .
                                        'Fasilitas : ' .
                                        $data->facility->facility_name .
                                        ' ' .
                                        $data->facility->city->city_name .
                                        "\n" .
                                        'Tanggal : ' .
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
                                        'Keterangan : ' .
                                        $data->information,
                                ),
                        ) !!} ">
                    </div>
                    <br>
                    <div> {{ $data->inventory_name }} </div>
                    <div> {{ $data->location }} </div>
                    <br>
                </div>
            @endforeach
        </div>
    @endforeach
</body>

</html>
