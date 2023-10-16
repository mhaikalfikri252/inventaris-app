<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Surat Pinjam</title>
</head>

<style type="text/css">
    <!--
    p {
        margin: 0;
        padding: 0;
    }

    .ft10 {
        font-size: 14px;
        font-family: Times;
        color: #000000;
    }

    .ft11 {
        font-size: 10px;
        font-family: Times;
        color: #000000;
    }

    .ft12 {
        font-size: 10px;
        font-family: Times;
        color: #252525;
    }

    .ft13 {
        font-size: 16px;
        font-family: Times;
        color: #13ccd1;
    }

    .ft14 {
        font-size: 14px;
        font-family: Times;
        color: #000000;
    }

    .ft15 {
        font-size: 12px;
        font-family: Times;
        color: #000000;
    }

    .ft16 {
        font-size: 14px;
        font-family: Times;
        color: #000000;
    }

    .ft17 {
        font-size: 8px;
        font-family: Times;
        color: #000000;
    }

    .ft18 {
        font-size: 14px;
        line-height: 20px;
        font-family: Times;
        color: #000000;
    }

    .ft19 {
        font-size: 14px;
        line-height: 19px;
        font-family: Times;
        color: #000000;
    }

    .ft110 {
        font-size: 14px;
        line-height: 20px;
        font-family: Times;
        color: #000000;
    }

    .ft111 {
        font-size: 14px;
        line-height: 20px;
        font-family: Times;
        color: #000000;
    }

    .ft9 {
        font-size: 14px;
        font-family: Times;
        color: #000000;
        text-decoration: underline;
    }
    -->
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div id="page1-div" style="position:relative;width:1031px;height:1031px;">

                        <p style="position:absolute;top:50px;left:210px;" class="ft9">
                            <b>PERJANJIAN PENGGUNAAN BARANG ASET </b>
                        </p>

                        <p style="position:absolute;top:90px;left:80px;" class="ft10">
                            I.
                        </p>
                        <p style="position:absolute;top:90px;left:115px;" class="ft10">
                            Nama
                        </p>
                        <p style="position:absolute;top:90px;left:240px;" class="ft10">
                            : Reza Aulya
                        </p>
                        <p style="position:absolute;top:110px;left:115px;" class="ft10">
                            Alamat
                        </p>
                        <p style="position:absolute;top:110px;left:240px;" class="ft10">
                            : Jl. Teuku Nyak Arief, Jeulingke Kota Banda Aceh
                        </p>
                        <p style="position:absolute;top:130px;left:115px;" class="ft10">
                            Jabatan
                        </p>
                        <p style="position:absolute;top:130px;left:240px;" class="ft10">
                            : Information Communication and Technology Staff
                        </p>
                        <p style="position:absolute;top:150px;left:115px;" class="ft10">
                            Lokasi kerja
                        </p>
                        <p style="position:absolute;top:150px;left:240px;" class="ft10">
                            : SOS Childrens Village Banda Aceh
                        </p>
                        <p style="position:absolute;top:128;left:115px;" class="ft10">
                            No HP
                        </p>
                        <p style="position:absolute;top:128;left:240px;" class="ft10">
                            : 081375355407
                        </p>
                        <p style="position:absolute;top:190px;left:115px;" class="ft18">
                            yang dalam kesepakatan ini bertindak untuk dan atas namanya SOS Children’s Villages
                            <br />Indonesia, dan selanjutnya dalam perjanjian ini disebut PIHAK KESATU <br />
                        </p>


                        <p style="position:absolute;top:240px;left:80px;" class="ft10">
                            II.
                        </p>
                        <p style="position:absolute;top:240px;left:115px;" class="ft10">
                            Nama
                        </p>
                        <p style="position:absolute;top:240px;left:240px;" class="ft10">
                            : {{ $borrow->employee->employee_name }}
                        </p>
                        <p style="position:absolute;top:260px;left:115px;" class="ft10">
                            Alamat
                        </p>
                        <p style="position:absolute;top:260px;left:240px;" class="ft10">
                            : {{ $borrow->employee->address }}
                        </p>
                        <p style="position:absolute;top:280px;left:115px;" class="ft10">
                            Jabatan
                        </p>
                        <p style="position:absolute;top:280px;left:240px;" class="ft10">
                            : {{ $borrow->employee->position }}
                        </p>
                        <p style="position:absolute;top:300px;left:115px;" class="ft10">
                            Lokasi kerja
                        </p>
                        <p style="position:absolute;top:300px;left:240px;" class="ft10">
                            : SOS Childrens Villages {{ $borrow->employee->city->city_name }}
                        </p>
                        <p style="position:absolute;top:320px;left:115px;" class="ft10">
                            No HP
                        </p>
                        <p style="position:absolute;top:320px;left:240px;" class="ft10">
                            : {{ $borrow->employee->phone }}
                        </p>
                        <p style="position:absolute;top:340px;left:115px;" class="ft18">
                            yang dalam kesepakatan ini bertindak untuk dan atas namanya sendiri, dan selanjutnya
                            <br />disebut PIHAK KEDUA.
                        </p>


                        <p style="position:absolute;top:370px;left:60px;" class="ft18">
                            <br />
                            Pada hari {{ \Carbon\Carbon::parse($borrow->borrow_date)->translatedFormat('l, d F Y') }}
                            PIHAK KESATU menyerahkan seperangkat barang aset milik SOS <br />Children’s Villages
                            Indonesia berupa:
                            <br />
                        </p>


                        <p style="position:absolute;top:440px;left:80px;" class="ft10">
                            Kode Aset
                        </p>
                        <p style="position:absolute;top:440px;left:266px;" class="ft10">
                            : {{ $borrow->asset->asset_code }}
                        </p>
                        <p style="position:absolute;top:460px;left:80px;" class="ft10">
                            Nama Barang
                        </p>
                        <p style="position:absolute;top:460px;left:266px;" class="ft10">
                            : {{ $borrow->asset->asset_name }}
                        </p>
                        <p style="position:absolute;top:477px;left:80px;" class="ft18">
                            Lokasi
                        </p>
                        <p style="position:absolute;top:480px;left:266px;" class="ft10">
                            : {{ $borrow->asset->location }}
                        </p>
                        <p style="position:absolute;top:500px;left:80px;" class="ft10">
                            Tanggal Pinjam
                        </p>
                        <p style="position:absolute;top:500px;left:266px;" class="ft10">
                            : {{ \Carbon\Carbon::parse($borrow->borrow_date)->translatedFormat('l, d F Y') }}
                        </p>
                        <p style="position:absolute;top:520px;left:80px;" class="ft10">
                            Tanggal Kembali
                        </p>
                        <p style="position:absolute;top:520px;left:266px;" class="ft10">
                            : {{ \Carbon\Carbon::parse($borrow->return_date)->translatedFormat('l, d F Y') }}
                        </p>


                        <p style="position:absolute;top:535px;left:60px;" class="ft18">
                            <br />untuk digunakan oleh PIHAK KEDUA dengan ketentuan sebagai berikut:
                        </p>
                        <p style="position:absolute;top:580px;left:65px;" class="ft15">
                            -
                        </p>
                        <p style="position:absolute;top:576px;left:80px;" class="ft18">
                            Penggunaan barang aset ini bisa digunakan selama PIHAK KEDUA berkarya/bekerja untuk SOS
                            <br />Children’s Villages Indonesia dan PIHAK KEDUA wajib menjaga kondisi barang aset ini.
                        </p>
                        <p style="position:absolute;top:621px;left:65px;" class="ft15">
                            -
                        </p>
                        <p style="position:absolute;top:618px;left:80px;" class="ft18">
                            Pada akhir Kontrak Kerja atau Pemutusan Hubungan Kerja, mana pun yang terjadi terlebih
                            dahulu, <br />PIHAK KEDUA harus menyerahkan barang aset yang digunakannya dalam kondisi
                            baik.
                        </p>
                        <p style="position:absolute;top:663px;left:65px;" class="ft15">
                            -
                        </p>
                        <p style="position:absolute;top:660px;left:80px;" class="ft18">
                            Bila diperlukan, PIHAK KESATU mempunyai hak penuh untuk memperoleh kembalinya barang
                            <br />aset ini.
                        </p>


                        <div class="col">
                            <p class="ft14" style="position:absolute;top:735px;left:130px;">
                                <b>PIHAK KESATU</b>
                            </p>
                            <p class="ft14" style="position:absolute;top:810px;left:143px;">
                                <b>(Reza Aulya)</b>
                            </p>
                            <p class="ft16" style="position:absolute;top:830px;left:90px;">
                                <b>ICT Staff SOS CV Banda Aceh</b>
                            </p>
                        </div>


                        <div class="col">
                            <p class="ft110" style="position:absolute;top:860px;left:330px;">
                                <b>Mengetahui</b>
                            </p>
                            <p class="ft14" style="position:absolute;top:940px;left:320px;">
                                <b>(Rinaldi Hasan)</b>
                            </p>
                            <p class="ft16" style="position:absolute;top:960px;left:319px;">
                                <b>Village Director</b>
                            </p>
                        </div>


                        <div class="col" style="position:absolute;top:735px;left:470px;">
                            <p class="ft14" style="text-align: center">
                                <b>PIHAK KEDUA</b>
                            </p>
                            <p class="ft14"
                                style="position:relative; top:58px; white-space:nowrap; text-align: center">
                                <b>({{ $borrow->employee->employee_name }})</b>
                            </p>
                            <p class="ft16"
                                style="position:relative; top:58px; white-space:nowrap; text-align: center">
                                <b>{{ $borrow->employee->position }}</b>
                            </p>
                        </div>

                    </div>
                </div>
                <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
    </div>
    </div>

</body>

</html>
