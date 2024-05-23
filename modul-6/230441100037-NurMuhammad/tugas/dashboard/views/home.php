<div class="container sidebar-active">
    <div class="home">
        <h1>Selamat Datang <?= $_SESSION['user']['username']; ?></h1>
        <div class="info">
            <div class="kotak">
                <div class="gambar"><i class="fa-solid fa-user-tie"></i></div>
                <div class="desk">
                    <h4>Dosen</h4>
                    <p>0</p>
                </div>
            </div>
            <div class="kotak">
                <div class="gambar"><i class="fa-solid fa-user-graduate"></i></div>
                <div class="desk">
                    <h4>Mahasiswa</h4>
                    <p><?= $totalMahasiswa; ?></p>
                </div>
            </div>
            <div class="kotak">
                <div class="gambar"><i class="fa-solid fa-rectangle-list"></i></div>
                <div class="desk">
                    <h4>Fakultas</h4>
                    <p><?= $totalFakultas; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>