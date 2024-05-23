<div class="container sidebar-active">
    <div class="data">
        <h1>Data Fakultas</h1>
        <div class="atas">
            <a href="index.php?formFakultas" class="btn tambah">Tambah</a>
        </div>
        <table class="fakultas table">
            <tr>
                <th>#</th>
                <th>Nama Fakultas</th>
                <th>Jumlah Program Studi</th>
                <th>Aksi</th>
            </tr>
            <?php if(mysqli_num_rows($selectFakultas) > 0) { ?>
            <?php foreach ($selectFakultas as $key => $f) { ?>
                <tr class="fakultas-row">
                    <td><?= $key+1; ?></td>
                    <td><?= $f['nama_fakultas']; ?></td>
                    <td><?= $f['jumlah_jurusan']; ?></td>
                    <td class="aksi">
                        <a class="info" id-fakultas="<?= $f['id_fakultas']; ?>"><i class="fa-solid fa-chevron-up"></i></a>
                        <a href="index.php?fakultas&tambah=Jurusan&id=<?= $f['id_fakultas']; ?>"><i class="fa-solid fa-plus"></i></a>
                        <a href="index.php?fakultas&edit=Fakultas&id=<?= $f['id_fakultas']; ?>&nama=<?= $f['nama_fakultas']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="index.php?fakultas&hapus=Fakultas&id=<?= $f['id_fakultas']; ?>"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php if(mysqli_num_rows($selectJurusan) > 0) { ?>
                <?php foreach ($selectJurusan as $key => $j) { ?>
                <?php if( $f['id_fakultas'] ==  $j['id_fakultas']) {?>
                    <tr style="display: none;" class="jurusan-row" id-fakultas="<?= $j['id_fakultas']; ?>">
                        <td></td>
                        <td><?= $j['nama_jurusan']; ?></td>
                        <td><?= $j['jumlah_prodi']; ?></td>
                        <td class="aksi">
                            <a class="info" id-jurusan="<?= $j['id_jurusan']; ?>"><i class="fa-solid fa-chevron-up"></i></a>
                            <a href="index.php?fakultas&tambah=Prodi&id=<?= $j['id_jurusan']; ?>"><i class="fa-solid fa-plus"></i></a>
                            <a href="index.php?fakultas&edit=Jurusan&id=<?= $j['id_jurusan']; ?>&nama=<?= $j['nama_jurusan']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="index.php?fakultas&hapus=Jurusan&id=<?= $j['id_jurusan']; ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php if(mysqli_num_rows($selectProdi) > 0) { ?>
                    <?php foreach ($selectProdi as $key => $p) { ?>
                    <?php if( $j['id_jurusan'] ==  $p['id_jurusan']) {?>
                        <tr style="display: none;" class="prodi-row" id-jurusan="<?= $p['id_jurusan']; ?>">
                            <td colspan="2"></td>
                            <td><?= $p['nama_prodi']; ?></td>
                            <td class="aksi">
                                <a style="opacity: 0;cursor: default;"></a>
                                <a style="opacity: 0;cursor: default;"></a>
                                <a href="index.php?fakultas&edit=Prodi&id=<?= $p['id_prodi']; ?>&nama=<?= $p['nama_prodi']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="index.php?fakultas&hapus=Prodi&id=<?= $p['id_prodi']; ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }}} ?>
                <?php }}} ?>
            <?php }} else { ?>
                <tr>
                    <td colspan="4">Data Kosong</td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php if(isset($_GET['tambah'])) {?>
    <div class="notif">
        <div class="kotak">
            <h2>Tambah Data</h2>
            <form action="koneksi.php" method="POST">
                <div class="form-input">
                    <label>Nama <?= $_GET['tambah'];?>:</label>
                    <input name="nama" type="text" placeholder="Nama <?= $_GET['tambah'];?>">
                </div>
                <button type="submit" name="Tambah<?= $_GET['tambah'];?>" class="iya" value="<?= $_GET['id'];?>">Iya</button>
                <a href="index.php?fakultas" class="btn cancel">Cancel</a>
            </form>
        </div>
    </div>
<?php } ?>
<?php if(isset($_GET['edit'])) {?>
    <div class="notif">
        <div class="kotak">
            <h2>Edit Data</h2>
            <form action="koneksi.php" method="POST">
                <div class="form-input">
                    <label>Nama <?= $_GET['edit'];?>:</label>
                    <input name="nama" value="<?= $_GET['nama'];?>" type="text" placeholder="Nama Fakultas">
                </div>
                <button type="submit" name="Edit<?= $_GET['edit'];?>" class="iya" value="<?= $_GET['id'];?>">Iya</button>
                <a href="index.php?fakultas" class="btn cancel">Cancel</a>
            </form>
        </div>
    </div>
<?php } ?>
<?php if(isset($_GET['hapus'])) {?>
    <div class="notif">
        <div class="kotak">
            <h2>Yakin ingin menghapus data ini?</h2>
            <form action="koneksi.php" method="POST">
                <button type="submit" name="Hapus<?= $_GET['hapus'];?>" class="iya" value="<?= $_GET['id'];?>">Iya</button>
                <a href="index.php?fakultas" class="btn cancel">Cancel</a>
            </form>
        </div>
    </div>
<?php } ?>


