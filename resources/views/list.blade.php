<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container bg-info mt-4 py-4 px-3 rounded">

        <h2 class="d-inline-block fw-semibold">List Product</h2>

        <div class="d-inline-block float-end ">
            <a href="{{ route('products.create') }}" class="btn btn-dark fw-semibold">Tambah Produk</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary fw-semibold">Kembali ke Produk</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Stok</th>
                    <th class="text-center">Berat</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Kondisi</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $nomor = 1; @endphp
                @foreach ($products as $product)
                    <tr>
                        <td class="text-center">{{ $nomor++ }}</td>
                        <td class="text-center">{{ $product->nama }}</td>
                        <td class="text-center">{{ number_format($product->stok, 0, ',', '.') }}</td>
                        <td class="text-center">{{ number_format($product->berat, 0, ',', '.') }}</td>
                        <td class="text-center">Rp. {{ number_format($product->harga, 0, ',', '.') }}</td>
                        @if ($product->kondisi == 'Baru')
                            <td class="text-center">
                                <p class="bg-success text-black p-1 rounded">{{ $product->kondisi }}</p>
                            </td>
                        @else
                            <td class="text-center">
                                <p class="bg-dark text-white p-1 rounded">{{ $product->kondisi }}</p>
                            </td>
                        @endif

                        <td class="text-center">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Update</a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
