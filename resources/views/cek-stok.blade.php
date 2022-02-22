<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container p-5">
        <h2 class="text-center">Data Logistik Lembar Kerja</h2>
        <div class="mt-5 row">
            <label for="staticProgrammer" class="col-sm-2 col-form-label">Programmer</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticProgrammer" value="Abil Muhamad Imani">
            </div>
        </div>

        <!-- nav -->
        <nav class="nav nav-pills flex-column flex-sm-row mt-5">
            <a class="flex-sm-fill text-sm-center nav-link" aria-current="page" href="{{ route('stok.index') }}">Input Stok</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="{{ route('distribusi.index') }}">Distribusi</a>
            <a class="flex-sm-fill text-sm-center nav-link active" href="#">Cek Stok</a>
        </nav>
        <!-- nav -->

        <h4 class="mt-5">Cek Stok</h4>

        <!-- Data -->
        <table class="table table-striped mt-5">
            <tr>
                <td class="text-center fw-bold">No</td>
                <td class="text-center fw-bold">Kelas</td>
                <td class="text-center fw-bold">Jumlah</td>
                <td class="text-center fw-bold">Harga</td>
                <td class="text-center fw-bold">Nilai Persediaan</td>
            </tr>
            @foreach($stok as $data)
            <tr>
                <td class="text-center">{{ $loop->index+1 }}</td>
                <td class="text-center">{{ $data->id_kelas }}</td>
                <td class="text-center">{{ $data->jumlah }}</td>
                <td class="text-center">{{ $data->harga }}</td>
                <td class="text-center">{{ $data->nilai_persediaan }}</td>
            </tr>
            @endforeach
        </table>


    </div>
</body>

</html>