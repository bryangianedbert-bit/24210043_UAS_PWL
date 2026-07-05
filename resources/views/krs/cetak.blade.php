<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak KRS - {{ $krs->mahasiswa->nim }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            text-transform: uppercase;
        }
        .info-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .info-table td {
            padding: 5px;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .data-table th, .data-table td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        .data-table th {
            background-color: #f2f2f2;
        }
        .signature {
            float: right;
            text-align: center;
            width: 250px;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>KARTU RENCANA STUDI (KRS)</h2>
        <p>Sistem Informasi Akademik Tahun {{ date('Y') }}</p>
    </div>

    <table class="info-table">
        <tr>
            <td width="15%"><strong>NIM</strong></td>
            <td width="2%">:</td>
            <td width="33%">{{ $krs->mahasiswa->nim }}</td>
            <td width="15%"><strong>Semester</strong></td>
            <td width="2%">:</td>
            <td width="33%">{{ $krs->semester }}</td>
        </tr>
        <tr>
            <td><strong>Nama</strong></td>
            <td>:</td>
            <td>{{ $krs->mahasiswa->nama_mahasiswa }}</td>
            <td><strong>Tahun Akademik</strong></td>
            <td>:</td>
            <td>{{ $krs->tahun_akademik }}</td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th width="15%">SKS</th>
            </tr>
        </thead>
        <tbody>
            @php $total_sks = 0; @endphp
            @forelse ($detail_krs as $index => $item)
                @php $total_sks += $item->mataKuliah->sks ?? 0; @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->mataKuliah->kode_mk ?? '-' }}</td>
                    <td style="text-align: left;">{{ $item->mataKuliah->nama_mk ?? '-' }}</td>
                    <td>{{ $item->mataKuliah->sks ?? '0' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada mata kuliah yang diambil.</td>
                </tr>
            @endempty
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right; font-weight: bold;">Total SKS:</td>
                <td style="font-weight: bold;">{{ $total_sks }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="signature">
        <p>Pontianak, {{ date('d F Y') }}</p>
        <br><br><br><br>
        <p><strong>Admin Akademik</strong></p>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>