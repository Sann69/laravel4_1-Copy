<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            width: 30%;
            background-color: #0CCAF0;
            border-radius: 10px;
            padding: 2%;
        }

        .btn-dark {
            width: 100%;

        }

        label {
            font-weight: 600;
        }

        #validation-message {
            text-align: center;
            margin-top: 2%;
            background-color: red;
            color: white;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 30%;
            margin-left: auto;
            margin-right: auto;
            font-size: 16pt;
        }

        .mb-4 {
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div id="validation-message"></div>

    <div class="container mt-5">
        <h3 class="mb-4 text-center">Tambah Data Produk</h3>
        <form action="{{ route('products.storeMerchant') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Produk</label>
                <input type="url" class="form-control" id="gambar" name="gambar" placeholder="Gambar Produk">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Produk">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Produk">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok Produk">
            </div>
            <div class="mb-3">
                <label for="berat" class="form-label">Berat</label>
                <input type="number" class="form-control" id="berat" name="berat" placeholder="Berat Produk">
            </div>
            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi</label>
                <select class="form-select" id="kondisi" name="kondisi">
                    <option selected disabled value="">Pilih Kondisi Barang</option>
                    <option value="Baru">Baru</option>
                    <option value="Bekas">Bekas</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi Produk"></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>

    <script>
        var form = document.querySelector('form');

        form.addEventListener('submit', function(event) {

            event.preventDefault();

            var gambar = document.getElementById('gambar').value;
            var nama = document.getElementById('nama').value;
            var harga = document.getElementById('harga').value;
            var stok = document.getElementById('stok').value;
            var berat = document.getElementById('berat').value;
            var kondisi = document.getElementById('kondisi').value;
            var deskripsi = document.getElementById('deskripsi').value;

            var validationMessage = document.getElementById('validation-message');

            if (gambar.trim() === '') {
                validationMessage.innerText = 'Error. Field Gambar wajib diisi';
                return;
            } else if (nama.trim() === '') {
                validationMessage.innerText = 'Error. Field Nama Produk wajib diisi';
                return;
            } else if (harga.trim() === '') {
                validationMessage.innerText = 'Error. Field Harga wajib diisi';
                return;
            } else if (stok.trim() === '') {
                validationMessage.innerText = 'Error. Field Stok wajib diisi';
                return;
            } else if (berat.trim() === '') {
                validationMessage.innerText = 'Error. Field Berat wajib diisi';
                return;
            } else if (kondisi.trim() === '') {
                validationMessage.innerText = 'Error. Field Kondisi wajib diisi';
                return;
            } else if (deskripsi.trim() === '') {
                validationMessage.innerText = 'Error. Field Deskripsi wajib diisi';
                return;
            }

            form.submit();
        });
    </script>

</body>

</html>
