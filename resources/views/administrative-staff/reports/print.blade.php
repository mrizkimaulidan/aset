<html>

<head>
    <title>PRINT</title>
</head>

<body>
    <div align="center">
        <img src="{{ asset('assets/images/logo.png') }}" width="10%">

        <h3>Laporan Data Aset</h3>
        <h3>SMK SAHIDA LEMAHABANG</h3>
        <hr>
        <br>
    </div>
    <table width="90%" border="0" align="center">
        <tr>
            <td>
                <h4>&nbsp;Hasil Update Data Aset</h4>
            </td>
        </tr>
    </table>

    <table width="90%" border="1" align="center">
        <tbody>
            <tr>
                <td align="center">Id_Aset</td>
                <td align="center">Aset Lama</td>
                <td align="center">Aset Baru</td>
                <td align="center">Jenis Aset</td>
                <td align="center">Ruangan</td>
                <td align="center">Jumlah</td>
                <td align="center">Tanggal Update</td>
                <td align="center">User</td>
            </tr>
            @foreach($commodity_updates as $key => $commodity_update)
            <tr>
                <td>{{ $commodity_update->commodities->unique_commodity_number }}</td>
                <td>{{ $commodity_update->commodities->name }}</td>
                <td>{{ $commodity_update->commodities->name }}</td>
                <td>{{ $commodity_update->commodity_categories->name }}</td>
                <td>{{ $commodity_update->commodity_locations->name }}</td>
                <td>{{ $commodity_update->amount }}</td>
                <td>{{ indonesian_date_format($commodity_update->update_date) }}</td>
                <td>{{ $commodity_update->users->name }}</td>
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