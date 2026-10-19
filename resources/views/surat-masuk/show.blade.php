<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Surat Masuk</title>
</head>
<body>
    <h1>Halaman Detail Surat Masuk</h1>
@if($SuratShow)
    <p>
        <strong>Nomor Surat : </strong>{{ $SuratShow['nomor_surat']}}<br>
        <strong>Tanggal : </strong>{{ $SuratShow['tanggal']}}<br>
        <strong>Pengirim : </strong>{{ $SuratShow['pengirim']}}<br>
        <strong>Perihal : </strong>{{ $SuratShow['perihal']}}<br>
    </p>
@else
    <p>Data tidak ditemukan</p>
@endif
    
</body>
</html>