<div class="container sidebar-active">
    <div class="data">
        <form action="./../koneksi.php" method="POST" enctype="multipart/form-data">
            <div class="isi">
                <h2><?= $btn; ?> Data Mahasiswa</h2>
                <div class="form-input">
                    <label for="nim">NIM:</label>
                    <input value="<?= $nim; ?>" name="nim" id="nim" type="text" placeholder="NIM" <?php if(isset($_GET['nim'])) echo "readonly"; ?>>
                </div>
                <div class="form-input">
                    <label for="nama">Nama:</label>
                    <input value="<?= $nama; ?>" name="nama" id="nama" type="text" placeholder="Nama">
                </div>
                <div class="form-input">
                    <label for="tgl_lahir">Tanggal Lahir:</label>
                    <input value="<?= $tgl_lahir; ?>" name="tgl_lahir" id="tgl_lahir" type="date" placeholder="Tanggal Lahir">
                </div>
                <div class="form-input">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" id="jenis_kelamin">
                        <option value="<?= $jenis_kelamin; ?>"><?= $jenis_kelamin; ?></option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="fakultas">Fakultas:</label>
                    <select name="fakultas" id="fakultas">
                        <option value="<?= $id_fakultas; ?>"><?= $fakultas; ?></option>
                        <?php if(mysqli_num_rows($selectFakultas) > 0) { ?>
                        <?php foreach ($selectFakultas as $dFakultas) { ?>
                            <option value="<?= $dFakultas['id_fakultas']; ?>"><?= $dFakultas['nama_fakultas']; ?></option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="form-input">
                    <label for="jurusan">Jurusan:</label>
                    <select name="jurusan" id="jurusan">
                        <option value="<?= $id_jurusan; ?>"><?= $jurusan; ?></option>
                        <?php if(mysqli_num_rows($selectJurusan) > 0) { ?>
                        <?php foreach ($selectJurusan as $dJurusan) { ?>
                            <option style="display: none;" class="jurusan" value="<?= $dJurusan['id_jurusan']; ?>" data-fakultas="<?= $dJurusan['id_fakultas']?>"><?= $dJurusan['nama_jurusan']; ?></option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="form-input">
                    <label for="prodi">Program Studi:</label>
                    <select name="prodi" id="prodi">
                        <option value="<?= $id_prodi; ?>"><?= $prodi; ?></option>
                        <?php if(mysqli_num_rows($selectProdi) > 0) { ?>
                        <?php foreach ($selectProdi as $dProdi) { ?>
                            <option style="display: none;" class="prodi" value="<?= $dProdi['id_prodi']?>" data-jurusan="<?= $dProdi['id_jurusan']?>"><?= $dProdi['nama_prodi']; ?></option>";
                        <?php }} ?>
                    </select>
                </div>
                <div class="form-input">
                    <label for="alamat">Alamat:</label>
                    <input value="<?= $alamat; ?>" name="alamat" id="alamat" type="text" placeholder="Alamat">
                </div>
                <div class="form-input">
                    <label for="foto">Gambar :</label>
                    <input name="foto" id="foto" type="file">
                </div>
                <div class="form-input">
                    <button type="submit" name="<?= $btn; ?>Mahasiswa" onclick="return validasiMahasiswa()">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>