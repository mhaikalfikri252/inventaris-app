<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>QR Code {{ $inventory->id }}</title>
</head>

<body>
    <div style="width: 60em; height: 20em;">
        <div style="text-align: center; border:1px solid #000; width: 12em; float: left; margin: 1em;">
            <br>
            <div>
                <img src="data:image/png;base64, {!! base64_encode(
                    QrCode::size(150)->format('png')->generate(
                            'Nama : ' .
                                $inventory->inventory_name .
                                "\n" .
                                'Fasilitas : ' .
                                $inventory->facility->facility_name .
                                ' ' .
                                $inventory->facility->city->city_name .
                                "\n" .
                                'Tanggal : ' .
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
</body>

</html>
