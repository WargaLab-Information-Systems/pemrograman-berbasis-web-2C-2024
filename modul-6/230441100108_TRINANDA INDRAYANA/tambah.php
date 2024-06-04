<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    body {
    background-color: #52BE80 ;
    padding: 20px;
}

h2 {
    color: #007bff;
}

.form-group label {
    color: #6c757d;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.container {
    max-width: 500px;
    margin: 0 auto;
}

 <style>
        /* Gaya Navbar */
        nav {
            background-color: #007bff; /* Warna latar belakang navbar */
            padding: 10px; /* Padding untuk memberi ruang di sekitar elemen navbar */
        }

        ul {
            list-style-type: none; /* Menghilangkan bullet point pada daftar */
            margin: 0; /* Menghapus margin bawaan */
            padding: 0; /* Menghapus padding bawaan */
            overflow: hidden; /* Menangani overflow jika ada banyak elemen navbar */
        }

        li {
            float: left; /* Membuat elemen navbar menjadi horizontal */
        }

        li a {
            display: block;
            color: white; 
            text-align: center; 
            padding: 14px 16px; 
            text-decoration: none; 
        }

        li a:hover {
            background-color: black;
             border-radius: 20px; 
}

        
    </style>

<body>
      <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
    <div class="container mt-5">
        <h2>Form Input Mahasiswa</h2>
        <form action="proses_tambah.php" method="post">
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
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
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
            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</body>
</html>
