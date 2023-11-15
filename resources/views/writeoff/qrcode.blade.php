<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>QR Code {{ $writeoff->asset_code }}</title>
</head>

<body>
    <div style="width: 60em; height: 20em;">
        <div style="text-align: center; border:1px solid #000; width: 12em; float: left; margin: 1em;">
            <br>
            <div>
                <img src="data:image/png;base64, {!! base64_encode(
                    QrCode::size(150)->format('png')->merge(public_path('images\logo.png'), 0.3, true)->errorCorrection('H')->generate(
                            'No FA : ' .
                                $writeoff->asset_code .
                                "\n" .
                                'Nama : ' .
                                $writeoff->asset_name .
                                "\n" .
                                'Fasilitas : ' .
                                $writeoff->facility->facility_name .
                                ' ' .
                                $writeoff->facility->city->city_name .
                                "\n" .
                                'Tanggal : ' .
                                \Carbon\Carbon::parse($writeoff->purchase_date)->format('d/m/Y') .
                                "\n" .
                                'Lokasi : ' .
                                $writeoff->location .
                                "\n" .
                                'Pic : ' .
                                $writeoff->employee->employee_name .
                                "\n" .
                                'Harga : ' .
                                $writeoff->price .
                                "\n" .
                                'Status : ' .
                                $writeoff->status_asset->status_name .
                                "\n" .
                                'Tanggal Write Off : ' .
                                \Carbon\Carbon::parse($writeoff->updated_at)->format('d/m/Y') .
                                "\n" .
                                'Keterangan : ' .
                                $writeoff->information,
                        ),
                ) !!} ">
            </div>
            <br>
            <div> {{ $writeoff->asset_code }} </div>
            <div> {{ $writeoff->asset_name }} </div>
            <div> {{ $writeoff->location }} </div>
            <br>
        </div>
    </div>
</body>

</html>
