<?php
include ("services/koneksi.php");
$nim = "";
$nama = "";
$umur = "";
$kelamin = "";
$prodi = "";
$jurusan = "";
$kota = "";
$eror = "";
$sukses = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from tb_mhs where id = '$id'";
    $q1 = mysqli_query($db, $sql1);
    if ($q1) {
        $sukses = "Data Anda Telah Berhasil Terhapus";
    } else {
        $eror = "Gagal melakukan delete data";
    }
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from tb_mhs where id ='$id'";
    $q1 = mysqli_query($db, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nim = $r1['nim'];
    $nama = $r1['nama'];
    $umur = $r1['umur'];
    $kota = $r1['kota'];
    $kelamin = $r1['kelamin'];
    $prodi = $r1['prodi'];
    $jurusan = $r1['jurusan'];

    if ($nim == '') {
        $eror = "Data Anda Tidak Ditemukan";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="card">
        <h5 class="card-header text-white bg-primary">Daftar Mahasiswa</h5>
        <div class="card-body">
            <table class="table" style="width: 100vw;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                    </tr>
                <tbody>
                    <?php
                    $sql2 = "SELECT * FROM tb_mhs ORDER BY id DESC";
                    $q2 = mysqli_query($db, $sql2);
                    $urut = 1;
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $id = $r2['id'];
                        $nim = $r2['nim'];
                        $nama = $r2['nama'];
                        $umur = $r2['umur'];
                        $kelamin = $r2['kelamin'];
                        $prodi = $r2['prodi'];
                        $jurusan = $r2['jurusan'];
                        $kota = $r2['kota'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo $nim ?></td>
                            <td scope="row"><?php echo $nama ?></td>
                            <td scope="row"><?php echo $umur ?></td>
                            <td scope="row"><?php echo $kelamin ?></td>
                            <td scope="row"><?php echo $prodi ?></td>
                            <td scope="row"><?php echo $jurusan ?></td>
                            <td scope="row"><?php echo $kota ?></td>
                            <td scope="row">
                                <a href="edit.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-info"
                                        onclick="sound3.play()">Edit</button></a>
                                <a href="tabel.php?op=delete&id=<?php echo $id ?>" onclick="sound2.play()"><button
                                        type="button" class="btn btn-danger" onclick="sound2.play()">Delete</button></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
    <div class="card mx-auto" style="width: 150px; margin-top: 50px;">
        <div class="card-body mx-auto">
            <form action="formulir.php" style="display: flex; flex-direction: column;">
                <button type="submit" class="btn btn-success" onclick="sound3.play()">Isi form Lagi</button>
            </form>
        </div>
    </div>


    <script>
        var sound2 = new Audio();
        sound2.src = "sound/delete.mp3"
        var sound3 = new Audio();
        sound3.src = "sound/click.mp3"
    </script>
</body>

</html>