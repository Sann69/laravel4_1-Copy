<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container text-center mt-4">
        <div class="d-inline-block mb-5">
            <a href="{{ route('products.list', ['id' => 1]) }}" class="btn btn-success fw-bold">Kembali Ke Halaman
                Admin</a>
        </div>

        <div class="row justify-content-start">
            <div class="row justify-content-between">
                <div class="col-5 rounded border border-3 border-dark">

                    <table class="table mt-3 table-borderless text-start">
                        <tbody>
                            <tr>
                                <th>Nama Akun</th>
                                <td>{{ $user->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <td>{{ $user->umur }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $user->tgl_lahir->format('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $user->alamat }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-5 rounded border border-3 border-dark">
                    <table class="table mt-3 table-borderless text-start">
                        <tbody>
                            <tr>
                                <th>Nama Toko</th>
                                <td>{{ $user->profile->nama_toko }}</td>
                            </tr>
                            <tr>
                                <th>Rate</th>
                                <td>{{ $user->profile->rate }}</td>
                            </tr>
                            <tr>
                                <th>Produk Terbaik</th>
                                <td>{{ $user->profile->produk_terbaik }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $user->profile->deskripsi }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
