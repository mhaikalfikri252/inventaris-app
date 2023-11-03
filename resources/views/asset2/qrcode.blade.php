<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>QR Code {{ $asset->asset_code }}</title>
</head>

<body>
    <div style="width: 60em; height: 20em;">
        <div style="text-align: center; border:1px solid #000; width: 12em; float: left; margin: 1em;">
            <br>
            <div>
                <img src="data:image/png;base64, {!! base64_encode(
                    QrCode::size(150)->format('png')->merge(public_path('images\logo.png'), 0.3, true)->errorCorrection('H')->generate(
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
</body>

</html>
