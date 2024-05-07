<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card-title {
            display: inline-block;
            font-weight: bolder;
        }

        .berat {
            display: inline-block;
            background-color: gray;
            color: white;
            padding: 2px 8px;
            border-radius: 5px;
            font-weight: 600;
            float: right;
        }

        .harga {
            display: inline-block;
            background-color: #0CCAF0;
            padding: 2px 8px;
            border-radius: 5px;
            font-weight: 600;
            margin-left: 19%;
        }

        .stok {
            display: inline-block;
            background-color: rgb(63, 204, 157);
            padding: 2px 8px;
            border-radius: 5px;
            font-weight: 600;
            float: left;
        }

        .kondisi {
            display: inline-block;
            float: right;
            background-color: rgb(63, 204, 157);
            padding: 1%;
            border-radius: 5px;
            font-weight: 600;
        }

        .kondisi.baru {
            background-color: #28a745;
        }

        .kondisi.bekas {
            background-color: #ffc107;
        }

        .product>.container {
            background-color: #0CCAF0;
            width: 100%;
            padding: 2%;
            border-radius: 10px;
            margin-top: 2%;
        }

        .product-h2 {
            text-align: center;
            font-weight: bolder;
        }

        .product-h2-line {
            text-align: center;
            font-weight: bolder;
            margin-top: -2.5%;
            margin-bottom: 3%;
        }
    </style>
</head>

<body>


    <section class="product">
        <div class="container">
            <h2 class="product-h2">PRODUCTS</h2>
            <h2 class="product-h2-line">_____</h2>

            <div class="container my-2">
                <a href="{{ route('products.list', ['id' => 1]) }}" class="btn btn-primary fw-bold">Ke Halaman Admin</a>
                <a href="{{ route('products.listmerchant', ['id' => 2]) }}"
                    class="btn btn-success fw-bold float-end">Halaman Pengguna Merchant</a>
            </div>

            <div class="row row-cols-1 row-cols-md-4">
                @foreach ($products as $product)
                    <div class="col mb-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ $product->gambar }}">
                            <div class="card-body">
                                <h5 class="card-title w-100">{{ $product->nama }}</h5>
                                @if ($product->kondisi == 'Baru')
                                    <p class="kondisi baru">Baru</p>
                                @else
                                    <p class="kondisi bekas">Bekas</p>
                                @endif
                                <br><br><br><br>
                                <p class="stok">{{ number_format($product->stok, 0, ',', '.') }}</p>
                                <p class="harga">Rp.{{ number_format($product->harga, 0, ',', '.') }}</p>
                                <p class="berat">{{ number_format($product->berat, 0, ',', '.') }} gr</p>
                                <br><br>
                                <p class="card-text">{{ $product->deskripsi }}</p>
                                <button type="button" class="btn btn-primary w-100">Pesan Sekarang</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
