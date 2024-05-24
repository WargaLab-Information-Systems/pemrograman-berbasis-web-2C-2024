<div class="container sidebar-active">
    <div class="data">
        <h1>Data Mahasiswa</h1>
        <div class="atas">
            <a href="index.php?formMahasiswa" class="btn tambah">Tambah</a>
            <div class="search">
                <form action="" method="POST">
                    <input type="text" value="<?php if(isset($keywordM)) echo $keywordM?>" name="keywordM" placeholder="Search....">
                    <button type="submit" name="cariMahasiswa"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <table class="table">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
            <?php if(mysqli_num_rows($selectMahasiswa) > 0) { ?>
            <?php foreach ($selectMahasiswa as $key => $d) { ?>
                <tr>
                    <td><?= $d['nim']; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['nama_jurusan']; ?></td>
                    <td><?= $d['nama_prodi']; ?></td>
                    <td class="aksi">
                        <a href="index.php?detailMahasiswa&nim=<?= $d['nim']; ?>"><i class="fa-solid fa-info"></i></a>
                        <a href="index.php?formMahasiswa&nim=<?= $d['nim']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="index.php?mahasiswa&hapus=<?= $d['nim']; ?>"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php } } else { ?>
                <tr>
                    <td colspan="5">Data Kosong</td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php if(isset($_GET['hapus'])) {?>
    <div class="notif">
        <div class="kotak">
            <h2>Yakin ingin menghapus data ini?</h2>
            <form action="./../koneksi.php" method="POST">
                <button type="submit" name="HapusMahasiswa" class="iya" value="<?= $_GET['hapus'];?>">Iya</button>
                <a href="index.php?mahasiswa" class="btn cancel">Cancel</a>
            </form>
        </div>
    </div>
<?php } ?>
