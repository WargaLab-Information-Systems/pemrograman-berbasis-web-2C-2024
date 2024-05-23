<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <!--berfungsi membuat tabel untuk menampilkan data mahasiswa-->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Prodi</th>
                <th>Jurusan</th>
                <th>Asal Kota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mahasiswa_db";

            // Membuat koneksi ke database
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Memeriksa apakah koneksi berhasil
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Memeriksa apakah ada parameter delete_id di URL
            if (isset($_GET['delete_id'])) {
                $id = intval($_GET['delete_id']); // Mengonversi delete_id menjadi integer
                $sql_delete = "DELETE FROM mahasiswa WHERE id=$id";

                // Menjalankan query delete dan memeriksa apakah berhasil
                if ($conn->query($sql_delete) === TRUE) {
                    echo "Data berhasil dihapus.";
                } else {
                    echo "Error: " . $conn->error;
                }

                // Memeriksa apakah tabel mahasiswa kosong
                $sql_check_empty = "SELECT COUNT(*) as count FROM mahasiswa";
                $result_check_empty = $conn->query($sql_check_empty);
                $row_check_empty = $result_check_empty->fetch_assoc();
                if ($row_check_empty['count'] == 0) {
                    // Mengatur ulang nilai auto-increment jika tabel kosong
                    $sql_reset_ai = "ALTER TABLE mahasiswa AUTO_INCREMENT = 1";
                    $conn->query($sql_reset_ai);
                }
            }

            // Menampilkan data mahasiswa dari database
            $sql = "SELECT * FROM mahasiswa";
            $result = $conn->query($sql);

            // Memeriksa apakah ada data yang ditemukan
            if ($result->num_rows > 0) {
                // Mengulang setiap baris data dan menampilkannya dalam tabel
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['nim']}</td>
                            <td>{$row['umur']}</td>
                            <td>{$row['jenis_kelamin']}</td> 
                            <td>{$row['prodi']}</td>
                            <td>{$row['jurusan']}</td>
                            <td>{$row['asal_kota']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}'>Edit</a>
                                <a href='tampilan.php?delete_id={$row['id']}' onclick='return confirmDelete()'>Hapus</a>
                            </td>
                          </tr>";
                }// onclick='return confirmDelete()'>Hapus</a> berfungsi untuk memanggil sripts js yang berisikan alert confirmasi delete
            } else {
                // Menampilkan pesan jika tidak ada data
                echo "<tr><td colspan='9'>Tidak ada data</td></tr>";
            }

            // Menutup koneksi ke database
            $conn->close();
            ?>
        </tbody>
    </table>
    <!--berfungsi untuk memindahkan halaman tampilan ke halaman inputan atau index-->
    <a href="index.php">Tambah Data Mahasiswa</a>
</body>
</html>
