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
            <a class="flex-sm-fill text-sm-center nav-link active" href="#">Distribusi</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="{{ route('cekStok') }}">Cek Stok</a>
        </nav>
        <!-- nav -->

        <!-- Form Input -->
        <h4 class="mt-5">Form Input Stok LKS</h4>
        <form action="{{ route('distribusi.update', $edit->id) }}" method="post">
            @csrf

            <div class="mt-3 row">
                <label for="inputSekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputSekolah" name="nama_sekolah" value="{{ $edit->nama_sekolah }}" required>
                </div>
            </div>
            <div class="mt-3 row">
                <label for="inputKelas" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-5">
                    <div class="row">
                        @php
                        for ($x = 1; $x <= 6; $x++) { @endphp <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kelas" value="{{ $x }}" {{ ($edit->kelas==$x)? "checked" : "" }}>
                                <label class="form-check-label">
                                    {{ $x }}
                                </label>
                            </div>
                    </div>
                    @php
                    }
                    @endphp
                </div>
            </div>
    </div>
    <div class="mt-3 row">
        <label for="inputJumlah" class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-5">
            <input type="number" class="form-control" id="inputJumlah" name="jumlah" value="{{ $edit->jumlah }}" required>
        </div>
    </div>

    <div class="mt-3 row">
        <div class="col-sm-7">
            <button class="btn btn-success float-end">Update Data</button>
        </div>
    </div>
    </form>
    <!-- Form Input -->

    <!-- Data -->
    <table class="table table-striped mt-5">
        <tr>
            <td class="text-center fw-bold">No</td>
            <td class="text-center fw-bold">Nama Sekolah</td>
            <td class="text-center fw-bold">Kelas</td>
            <td class="text-center fw-bold">Jumlah</td>
            <td class="text-center fw-bold">Action</td>
        </tr>
        @foreach($data as $distribusi)
        <tr>
            <td class="text-center">{{ $loop->index+1 }}</td>
            <td class="text-center">{{ $distribusi->nama_sekolah }}</td>
            <td class="text-center">{{ $distribusi->kelas }}</td>
            <td class="text-center">{{ $distribusi->jumlah }}</td>
            <td class="text-center">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-2">
                        <a href="{{ route('distribusi.edit', $distribusi->id ) }}" class="btn btn-info"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('distribusi.destroy', $distribusi->id ) }}" class="btn  btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>


    </div>
</body>

</html>