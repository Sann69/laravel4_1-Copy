<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            width: 30%;
            background-color: #0CCAF0;
            border-radius: 10px;
            padding: 2%;
        }

        .btn-primary {
            width: 100%;
        }

        label {
            font-weight: 600;
        }

        .mb-4 {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h3 class="mb-4 text-center">Edit Data Produk</h3>
        <form action="{{ route('products.update', $product->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Produk</label>
                <input type="url" class="form-control" id="gambar" name="gambar" value="{{ $product->gambar }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $product->nama }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="berat" class="form-label">Berat</label>
                <input type="number" class="form-control" id="berat" name="berat" value="{{ $product->berat }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $product->harga }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ $product->stok }}"
                    required>
            </div>


            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi</label>
                <select class="form-select" id="kondisi" name="kondisi" required>
                    <option value="Baru" {{ $product->kondisi == 'Baru' ? 'selected' : '' }}>Baru</option>
                    <option value="Bekas" {{ $product->kondisi == 'Bekas' ? 'selected' : '' }}>Bekas</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $product->deskripsi }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
