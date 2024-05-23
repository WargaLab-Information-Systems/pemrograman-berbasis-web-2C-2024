function confirmDelete() {
    return confirm('Apakah Anda yakin ingin menghapus data ini?');
}

function validateForm() {
    var nama = document.getElementById('nama').value;
    var nim = document.getElementById('nim').value;
    var umur = document.getElementById('umur').value;
    var prodi = document.getElementById('prodi').value;
    var jurusan = document.getElementById('jurusan').value;
    var asal_kota = document.getElementById('asal_kota').value;

    if (nama == "" || nim == "" || umur == "" || prodi == "" || jurusan == "" || asal_kota == "") {
        alert("Semua field harus diisi!");
        return false;
    }

    return true;
}
