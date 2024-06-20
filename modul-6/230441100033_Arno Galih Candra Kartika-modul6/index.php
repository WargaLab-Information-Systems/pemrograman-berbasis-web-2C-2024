<?php include 'config.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Sistem Informasi Mahasiswa</h1>
    </header>
    <main class="container mt-5">
        <div class="card shadow-lg mx-auto" style="max-width: 600px;">
            <div class="card-header bg-gradient-primary text-white text-center">
                <h2>Input Data Mahasiswa</h2>
            </div>
            <div class="card-body">
                <form id="mahasiswaForm" action="index.php" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="text" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur:</label>
                        <input type="number" class="form-control" id="umur" name="umur" required>
                    </div>
                    <!-- validasi  -->
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label for="prodi">Prodi:</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="jurusan">Jurusan:</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="asal_kota">Asal Kota:</label>
                        <input type="text" class="form-control" id="asal_kota" name="asal_kota" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    <a href="tabel.php" class="btn btn-info">Lihat Data</a>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2024 Sistem Informasi Mahasiswa. All rights reserved.</p>
    </footer>
    <script>
        // Validasi formulir sebelum pengiriman
        document.getElementById("mahasiswaForm").addEventListener("submit", function(event) {
            var nama = document.getElementById("nama").value;
            var nim = document.getElementById("nim").value;
            var umur = document.getElementById("umur").value;
            var jenis_kelamin = document.getElementById("jenis_kelamin").value;
            var prodi = document.getElementById("prodi").value;
            var jurusan = document.getElementById("jurusan").value;
            var asal_kota = document.getElementById("asal_kota").value;

            // Validasi tidak boleh kosong
            if (nama.trim() === "") {
                alert("Nama tidak boleh kosong");
                event.preventDefault(); // Mencegah pengiriman formulir
                return;
            }

           
            if (nim.trim() === "") {
                alert("NIM tidak boleh kosong");
                event.preventDefault();
                return;
            }

            
            if (isNaN(umur) || umur <= 0) {
                alert("Umur harus berupa angka dan lebih dari 0");
                event.preventDefault(); 
                return;
            }

            
            if (jenis_kelamin === "") {
                alert("Jenis Kelamin harus dipilih");
                event.preventDefault(); 
                return;
            }

           
            if (prodi.trim() === "") {
                alert("Prodi tidak boleh kosong");
                event.preventDefault(); 
                return;
            }

           
            if (jurusan.trim() === "") {
                alert("Jurusan tidak boleh kosong");
                event.preventDefault(); 
                return;
            }

           
            if (asal_kota.trim() === "") {
                alert("Asal Kota tidak boleh kosong");
                event.preventDefault(); 
                return;
            }
        });
    </script>
</body>
</html>
