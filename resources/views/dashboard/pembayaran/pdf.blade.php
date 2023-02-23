<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Bukti Pembayaran</title>
</head>
<body>
    <table class="table align-items-center mt-4 mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">No</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">Petugas</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">NISN</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">Tanggal Bayar</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">SPP</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">Jumlah Bayar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($history as $row)
            <tr>
              <td class="text-xs font-weight-bolder opacity-7">
                {{ $loop->iteration }}
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
                {{ $row->nama_petugas }}
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
                {{ $row->nisn }}
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
                {{ $row->tgl_bayar }} {{ $row->bulan_dibayar }} {{ $row->tahun_dibayar }}
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
                {{ number_format($row->nominal) }}
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
                Rp {{ number_format($row->jumlah_bayar) }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>