<html>

<head>
    <title>PRINT</title>
</head>

<body>
    <div align="center">
        <img src="#" width="10%">

        <h3>Laporan Data Aset</h3>
        <h3>SMK SAHIDA LEMAHABANG</h3>
        <hr>
        <br>
    </div>
    <table width="90%" border="0" align="center">
        <tr>
            <td>
                <h4>&nbsp;Hasil Laporan Data Aset Tahun {{ $year }}</h4>
            </td>
        </tr>
    </table>

    <table width="90%" border="1" align="center">
        <tbody>
            <tr>
                <td align="center">Id_Aset</td>
                <td align="center">Nama Aset</td>
                <td align="center">Jenis Aset</td>
                <td align="center">Ruangan</td>
                <td align="center">Jumlah</td>
                <td align="center">Tanggal Register</td>
                <td align="center">Kondisi</td>
                <td align="center">Tanggal Update</td>
                <td align="center">User</td>
            </tr>
            @foreach($commodities as $key => $commodity)
            <tr>
                <td>{{ $commodity->unique_commodity_number }}</td>
                <td>{{ $commodity->name }}</td>
                <td>{{ $commodity->commodity_categories->name }}</td>
                <td>{{ $commodity->commodity_locations->name }}</td>
                <td>{{ $commodity->amount }}</td>
                <td>{{ $commodity->register_date }}</td>
                <td>{{ $commodity->condition }}</td>
                <td>{{ $commodity->update_date }}</td>
                <td>{{ $commodity->users->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <table width="90%" border="0" align="center">
        <tbody>
            <tr>
                <td width="20%">Mengetahui</td>
                <td width="60%">&nbsp;</td>
                <td width="20%">Cirebon, ............. 2020</td>
            </tr>
            <tr>
                <td>Kepala Sekolah</td>
                <td>&nbsp;</td>
                <td>Staff TU</td>
            </tr>
            <tr>
                <td>............................</td>
                <td>&nbsp;</td>
                <td>............................</td>
            </tr>
            <tr>
                <td>NIP.</td>
                <td>&nbsp;</td>
                <td>NIP.</td>
            </tr>
        </tbody>
    </table>


</body>

</html>