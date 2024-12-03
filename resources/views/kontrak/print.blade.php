<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    h4 {
        margin: 0;
    }

    .table-container {
        position: relative;
        overflow-x: auto;
    }

    .table {
        width: 100%;
        font-size: 0.875rem;
        text-align: left;
        color: #6b7280;
        border-collapse: ;
        margin-top: 1rem;
    }

    .w-half {
        width: 50%;
    }

    .table thead tr {
        background-color: #60a5fa;
        color: #ffffff;
    }

    .table th,
    .table td {
        padding: 0.5rem;
        border: none;
    }

    .table-row {
        background-color: #f9fafb;
    }

    .table-row:nth-child(even) {
        background-color: #ffffff;
    }

    .margin-top {
        margin-top: 1.25rem;
    }

    .total {
        text-align: right;
        font-size: 0.875rem;
        margin-top: 1rem;
    }

    .footer {
        font-size: 0.875rem;
        padding: 1rem;
        background-color: rgb(241, 245, 249);
        text-align: center;
    }
</style>

<body>
    <table class="table">
        <tr>
            <td class="w-half">
                <img src="{{ public_path('img/logoSTMIK.svg') }}" alt="STMIK Bandung" width="200" />
            </td>
            <td class="w-half">
                <h2>Invoice ID: {{ $riwayatPembayaran->kode_pembayaran }}</h2>
            </td>
        </tr>
    </table>

    <div class="margin-top">
        <table class="table">
            <tr>
                <td class="w-half">
                    <h4>Kepada:</h4>
                    <div>{{ ucwords($riwayatPembayaran->mahasiswa->user->name) }}</div>
                </td>
                <td class="w-half">
                    <h4>Dari:</h4>
                    <div>{{ ucwords($riwayatPembayaran->admin->user->name) }}</div>
                    <div>STMIK Bandung - Cianjur</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="total">Semester&nbsp;
        {{ucfirst($riwayatPembayaran->semester->nama_semester) . ' '
        . $riwayatPembayaran->semester->tahun_ajaran}}
    </div>

    <div class="table-container margin-top">
        <table class="table products">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>MATA KULIAH</th>
                    <th>DOSEN</th>
                    <th>WAKTU</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $kontrakKrs)
                <tr class="table-row">
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $kontrakKrs->krs->matkul->kode_mk . ' - ' . $kontrakKrs->krs->matkul->nama_mk }}</td>
                    <td>{{ $kontrakKrs->krs->dosen->nidn . ' - ' . $kontrakKrs->krs->dosen->nama_dosen }}</td>
                    <td>{{ $kontrakKrs->krs->mulai . ' - ' . $kontrakKrs->krs->selesai }}</td>
                    <td style="text-align: center;">{{ $kontrakKrs->krs->matkul->sks }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot style="text-align: center; font-weight: bold">
                <tr class="table-products">
                    <td colspan="4">TOTAL SKS</td>
                    <td>{{ $data->sum('krs.matkul.sks') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="total">
        Total Pembayaran Diterima: Rp.{{ number_format($riwayatPembayaran->semester->nominal_pembayaran, 2, ',', '.') }}
    </div>

    <div class="footer margin-top">
        <div>{{$riwayatPembayaran->updated_at->format('d-m-Y H:i:s')}}</div>
        <div>Terimakasih</div>
        <div>&copy; STMIK Bandung - Cianjur</div>
    </div>
</body>

</html>