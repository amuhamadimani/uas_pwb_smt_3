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
            <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">Input Stok</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="{{ route('distribusi.index') }}">Distribusi</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="{{ route('cekStok') }}">Cek Stok</a>
        </nav>
        <!-- nav -->

        <!-- Form Input -->
        <h4 class="mt-5">Form Input Stok LKS</h4>
        <form action="{{ route('stok.store') }}" method="post">
            @csrf
            <div class="mt-3 row">
                <label for="inputKelas" class="col-sm-1 col-form-label">Kelas</label>
                <div class="col-sm-4">
                    <select class="form-control" required name="id_kelas">
                        <option value="">-- Pilih Kelas--</option>
                        @php
                        for ($x = 1; $x <= 6; $x++) { @endphp <option value="{{ $x }}">{{ $x }}</option>
                            @php
                            }
                            @endphp
                    </select>
                </div>
            </div>
            <div class="mt-3 row">
                <label for="inputJumlah" class="col-sm-1 col-form-label">Jumlah</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputJumlah" name="jumlah" required>
                </div>
            </div>
            <div class="mt-3 row">
                <label for="inputHarga" class="col-sm-1 col-form-label">Harga</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputHarga" name="harga" required>
                </div>
            </div>
            <div class="mt-3 row">
                <div class="col-sm-5">
                    <button class="btn btn-success float-end">Submit</button>
                </div>
            </div>
        </form>
        <!-- Form Input -->

        <!-- Data -->
        <table class="table table-striped mt-5">
            <tr>
                <td class="text-center fw-bold">No</td>
                <td class="text-center fw-bold">Kelas</td>
                <td class="text-center fw-bold">Jumlah</td>
                <td class="text-center fw-bold">Harga</td>
                <td class="text-center fw-bold">Nilai Persediaan</td>
                <td class="text-center fw-bold">Action</td>
            </tr>
            @foreach($data as $stok)
            <tr>
                <td class="text-center">{{ $loop->index+1 }}</td>
                <td class="text-center">{{ $stok->id_kelas }}</td>
                <td class="text-center">{{ $stok->jumlah }}</td>
                <td class="text-center">{{ $stok->harga }}</td>
                <td class="text-center">{{ $stok->nilai_persediaan }}</td>
                <td class="text-center">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-2">
                            <a href="{{ route('stok.edit', $stok->id ) }}" class="btn btn-info"><i class="fa-solid fa-pencil"></i></a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('stok.destroy', $stok->id ) }}" class="btn  btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="mt-5 row">
            <label for="inputJumlah" class="col-sm-2 col-form-label">Jumlah LKS Seluruh</label>
            <div class="col-sm-2">
                <input type="number" class="form-control text-center" value="{{ $jumlah_lks }}" readonly>
            </div>
        </div>
        <div class="mt-3 row">
            <label for="inputJumlah" class="col-sm-2 col-form-label">Total Nilai Persediaan</label>
            <div class="col-sm-2">
                <input type="number" class="form-control text-center" value="{{ $total_persediaan }}" readonly>
            </div>
        </div>

    </div>
</body>

</html>