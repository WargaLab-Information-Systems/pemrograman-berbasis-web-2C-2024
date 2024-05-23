<?php $data = mahasiswaByNim($_GET['nim']); ?>
<div class="container sidebar-active">
    <div class="data">
        <h1>Detail Mahasiswa</h1>
        <table class="rapih">
            <tr>
                <td colspan="3">
                    <div class="gambar">
                        <?php if(!empty($data['foto'])) {?>
                            <img src="./../img/<?= $data['foto']?>" alt="">
                        <?php } else { ?>
                            <img src="./../img/profil.png" alt="">
                        <?php } ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>NIM</td>
                <td> : </td>
                <td><?= $data['nim']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td> : </td>
                <td><?= $data['nama']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td> : </td>
                <td><?= $data['tgl_lahir']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td> : </td>
                <td><?= $data['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td> : </td>
                <td><?= $data['nama_jurusan']; ?></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td> : </td>
                <td><?= $data['nama_prodi']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> : </td>
                <td><?= $data['alamat']; ?></td>
            </tr>
        </table>
    </div>
</div>