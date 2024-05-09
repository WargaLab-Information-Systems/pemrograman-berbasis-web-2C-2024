<?php
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Initialize session if not already set
if (!isset($_SESSION['dataMahasiswa'])) {
    $_SESSION['dataMahasiswa'] = array();
}

$dataMahasiswa =& $_SESSION['dataMahasiswa'];

function tambahData($nim, $nama, $alamat, $angkatan) {
    global $dataMahasiswa;
    $dataMahasiswa[] = array('nim' => $nim, 'nama' => $nama, 'alamat' => $alamat, 'angkatan' => $angkatan);
    // Show success message
    $_SESSION['success_message'] = "Data mahasiswa berhasil ditambahkan.";
}

function hapusData($index) {
    global $dataMahasiswa;
    if (isset($dataMahasiswa[$index])) {
        unset($dataMahasiswa[$index]);
        $dataMahasiswa = array_values($dataMahasiswa); // Reindex the array
        // Show success message
        $_SESSION['success_message'] = "Data mahasiswa berhasil dihapus.";
    } else {
        // Show error message if index is invalid
        $_SESSION['error_message'] = "Indeks data mahasiswa tidak valid.";
    }
}

function editData($index, $nim, $nama, $alamat, $angkatan) {
    global $dataMahasiswa;
    if (isset($dataMahasiswa[$index])) {
        $dataMahasiswa[$index]['nim'] = $nim;
        $dataMahasiswa[$index]['nama'] = $nama;
        $dataMahasiswa[$index]['alamat'] = $alamat;
        $dataMahasiswa[$index]['angkatan'] = $angkatan;
        // Show success message
        $_SESSION['success_message'] = "Data mahasiswa berhasil diubah.";
    } else {
        // Show error message if index is invalid
        $_SESSION['error_message'] = "Indeks data mahasiswa tidak valid.";
    }
}

// Process data addition
if(isset($_POST['submit'])) {
    tambahData($_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['angkatan']);
}

// Process data deletion
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['index'])) {
    hapusData($_GET['index']);
    // Update $_SESSION['dataMahasiswa'] after deletion
    $_SESSION['dataMahasiswa'] = $dataMahasiswa;
}


// Process data editing
if(isset($_POST['edit']) && isset($_POST['index_to_edit'])) { 
    editData($_POST['index_to_edit'], $_POST['nim_edit'], $_POST['nama_edit'], $_POST['alamat_edit'], $_POST['angkatan_edit']);
}

// If there is a success message, display it and remove from session
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : "";
unset($_SESSION['success_message']);

// If there is an error message, display it and remove from session
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "";
unset($_SESSION['error_message']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #A0DEFF;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 85%;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .action a {
        text-decoration: none;
        padding: 5px 10px;
        margin: 0 5px;
        border-radius: 5px;
    }

    .action a.edit {
        background-color: #4CAF50;
        color: white;
    }

    .action a.delete {
        background-color: #f44336;
        color: white;
    }

    .action a:hover {
        opacity: 0.7;
    }

    form input[type="text"], form input[type="submit"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    form input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    form input[type="submit"]:hover {
        background-color: #45a049;
    }

    .logout {
        text-align: center;
        margin-top: 20px;
    }

    .logout a {
        text-decoration: none;
        background-color: #f44336;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .logout a:hover {
        background-color: #d32f2f;
    }

    .success-message {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .error-message {
        background-color: #f44336;
        color: white;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <?php if (!empty($success_message)): ?>
            <div class="success-message"><?= $success_message ?></div>
        <?php endif; ?>
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?= $error_message ?></div>
        <?php endif; ?>
        <table>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Action</th>
            </tr>
            <?php foreach ($dataMahasiswa as $index => $mahasiswa): ?>
                <tr>
                    <td><?= $mahasiswa['nim'] ?></td>
                    <td><?= $mahasiswa['nama'] ?></td>
                    <td><?= $mahasiswa['alamat'] ?></td>
                    <td><?= $mahasiswa['angkatan'] ?></td>
                    <td>
                        <a href='?action=edit&index=<?= $index ?>'>Edit</a>
                        <a href='?action=delete&index=<?= $index ?>'>Delete</a>
                    </td>
                </tr>
                <?php if(isset($_GET['action']) && $_GET['action'] == 'edit' && $_GET['index'] == $index): ?>
                    <tr>
                        <td colspan="5">
                            <form method="post" action="">
                                <input type="hidden" name="index_to_edit" value="<?= $index ?>">
                                <input type="text" name="nim_edit" value="<?= $mahasiswa['nim'] ?>" placeholder="NIM" required><br>
                                <input type="text" name="nama_edit" value="<?= $mahasiswa['nama'] ?>" placeholder="Nama" required><br>
                                <input type="text" name="alamat_edit" value="<?= $mahasiswa['alamat'] ?>" placeholder="Alamat" required><br>
                                <input type="text" name="angkatan_edit" value="<?= $mahasiswa['angkatan'] ?>" placeholder="Angkatan" required><br>
                                <input type="submit" name="edit" value="Simpan">
                            </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>

        <h3>Tambah Data Mahasiswa</h3>
        <form method="post" action="">
            <input type="text" name="nim" placeholder="NIM" required><br>
            <input type="text" name="nama" placeholder="Nama" required><br>
            <input type="text" name="alamat" placeholder="Alamat" required><br>
            <input type="text" name="angkatan" placeholder="Angkatan" required><br>
            <input type="submit" name="submit" value="Tambah">
        </form>
        
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>  
</body>
</html>
