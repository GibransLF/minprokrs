<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>

<style>
    h4 {
        margin: 0;
    }

    .w-full {
        width: 100%;
    }

    .w-half {
        width: 50%;
    }

    .margin-top {
        margin-top: 1.25rem;
    }

    .footer {
        font-size: 0.875rem;
        padding: 1rem;
        background-color: rgb(241 245 249);
    }

    table {
        width: 100%;
        border-spacing: 0;
    }

    table.products {
        font-size: 0.875rem;
    }

    table.products tr {
        background-color: rgb(96 165 250);
    }

    table.products th {
        color: #ffffff;
        padding: 0.5rem;
    }

    table tr.items {
        background-color: rgb(241 245 249);
    }

    table tr.items td {
        padding: 0.5rem;
    }

    .total {
        text-align: right;
        margin-top: 1rem;
        font-size: 0.875rem;
    }
</style>

<body>
    <table class="w-full">
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
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div>
                        <h4>Kepada:</h4>
                    </div>
                    <div>{{ucwords($riwayatPembayaran->mahasiswa->user->name)}}</div>
                </td>
                <td class="w-half">
                    <div>
                        <h4>Dari:</h4>
                    </div>
                    <div>{{ucwords($riwayatPembayaran->admin->user->name)}}</div>
                    <div>STMIK Bandung - Cianjur</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="margin-top">
        <table class="products">
            <tr>
                <th>NO</th>
                <th>MATA KULIAH</th>
                <th>DOSEN</th>
                <th>WAKTU</th>
                <th>SKS</th>
            </tr>
            <tr class="items">
                @foreach($data as $kontrakKrs)
            <tr>
                <td>
                    {{$loop->iteration}}</td>
                <td>{{ $kontrakKrs->krs->matkul->kode_mk . ' - ' . $kontrakKrs->krs->matkul->nama_mk }}
                </td>
                <td>{{ $kontrakKrs->krs->dosen->nidn . ' - ' . $kontrakKrs->krs->dosen->nama_dosen }}
                </td>
                <td>{{ $kontrakKrs->krs->mulai . ' - ' . $kontrakKrs->krs->selesai }}</td>
                <td>{{ $kontrakKrs->krs->matkul->sks }}</td>
            </tr>

            @endforeach
        </table>
    </div>

    <div class="total">
        Total: Rp.{{number_format($riwayatPembayaran->semester->nominal_pembayaran,
        2, ',', '.') }}
    </div>

    <div class="footer margin-top">
        <div>Terimakasih</div>
        <div>&copy; STMIK Bandung - Cianjur</div>
    </div>
</body>

</html>