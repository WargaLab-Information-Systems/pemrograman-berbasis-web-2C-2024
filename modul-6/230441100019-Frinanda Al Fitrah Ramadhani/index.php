<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form action="tambah.php" class="tambah" method="post">
        <section class="form_biodata">
            <main class="content">
                <center>
                    <h1><span>Form</span> Pendaftaran</h1>
                    <form name="data">
                        <input type="text" id="nama" name="nama" placeholder="Nama" required><br>
                        <input type="text" id="nim" name="nim" placeholder="NIM" required><br>
                        <input type="text" id="umur" name="umur" placeholder="Umur" required><br>
                        <input type="text" id="jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin" required><br>
                        <input type="text" id="prodi" name="prodi" placeholder="Program Studi" required><br>
                        <input type="text" id="jurusan" name="jurusan" placeholder="Jurusan" required><br>
                        <input type="text" id="asal_kota" name="asal_kota" placeholder="Asal Kota" required><br>
                        <button type="submit" class="btn" name="tambah">Daftar</button>
                    </form>
                </center>
            </main>
        </section>
    </form>
</body>
</html>
