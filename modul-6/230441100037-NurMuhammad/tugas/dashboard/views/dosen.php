<div class="container sidebar-active">
    <div class="data">
        <h1>Data Dosen</h1>
        <div class="atas">
            <a href="" class="btn tambah">Tambah</a>
            <div class="search">
                <form action="" method="POST">
                    <input type="text" value="<?php if(isset($keyword)) echo $keyword?>" name="keyword" placeholder="Search....">
                    <button type="submit" name="cari"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <table class="table">
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td colspan="5">Data Kosong</td>
            </tr>
        </table>
    </div>
</div>
