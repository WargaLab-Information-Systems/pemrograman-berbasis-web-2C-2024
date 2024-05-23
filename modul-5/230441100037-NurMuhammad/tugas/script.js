// NAVBAR
var navLinks = document.querySelectorAll('.nav-link a');

navLinks.forEach(function(navLink) {
    if (navLink.href === window.location.href) {
        navLink.parentNode.classList.add('active');
    }
});
// navbar

// SIDEBAR
let humbergerMenu = document.querySelector(".navbar #humberger-menu");
humbergerMenu.addEventListener("click", () => {
    document.querySelector(".navbar .sidebar").classList.toggle("active");
    document.querySelector(".navbar").classList.toggle("sidebar-active");
    document.querySelector(".container").classList.toggle("sidebar-active");
});
// sidebar

// VALIDASI LOGIN
function validasiLogin() {
    let validasi = true;
    let username = document.getElementById("username");
    let password = document.getElementById("password");

    if (username.parentNode.querySelector("span")) username.parentNode.querySelector("span").remove();
    if (password.parentNode.querySelector("span")) password.parentNode.querySelector("span").remove();

    if (username.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Username tidak boleh kosong";
        username.parentNode.appendChild(pesanError);
    }
    if (password.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Password tidak boleh kosong";
        password.parentNode.appendChild(pesanError);
    }

    return validasi;
}
// validasi login

// FORM TAMBAH
function formTambah(button) {
    let formTambah = document.querySelector("form.tambah");
    formTambah.classList.toggle("active");
    if (formTambah.classList.contains("active")) {
        document.querySelector("form.tambah .isi h2").textContent = "Tambah Data";
        document.querySelector("form.tambah .isi button").setAttribute("onclick", "return validasiTambah()");
        document.querySelector("form.tambah .isi button").setAttribute("name", "tambah");
        document.getElementById("nim").value = "";
        document.getElementById("nama").value = "";
        document.getElementById("jurusan").value = "";
        document.getElementById("alamat").value = "";
        document.getElementById("angkatan").value = "";
        if (document.getElementById("nim").parentNode.querySelector("span")) document.getElementById("nim").parentNode.querySelector("span").remove();
        if (document.getElementById("nama").parentNode.querySelector("span")) document.getElementById("nama").parentNode.querySelector("span").remove();
        if (document.getElementById("jurusan").parentNode.querySelector("span")) document.getElementById("jurusan").parentNode.querySelector("span").remove();
        if (document.getElementById("alamat").parentNode.querySelector("span")) document.getElementById("alamat").parentNode.querySelector("span").remove();
        if (document.getElementById("angkatan").parentNode.querySelector("span")) document.getElementById("angkatan").parentNode.querySelector("span").remove();
        button.textContent = "Cancel";
    } else {
        button.textContent = "Tambah";
    }
}
// form tambah

// VALIDASI TAMBAH
function validasiTambah() {
    let validasi = true;
    let nim = document.getElementById("nim");
    let nama = document.getElementById("nama");
    let jurusan = document.getElementById("jurusan");
    let alamat = document.getElementById("alamat");
    let angkatan = document.getElementById("angkatan");
    
    if (nim.parentNode.querySelector("span")) nim.parentNode.querySelector("span").remove();
    if (nama.parentNode.querySelector("span")) nama.parentNode.querySelector("span").remove();
    if (jurusan.parentNode.querySelector("span")) jurusan.parentNode.querySelector("span").remove();
    if (alamat.parentNode.querySelector("span")) alamat.parentNode.querySelector("span").remove();
    if (angkatan.parentNode.querySelector("span")) angkatan.parentNode.querySelector("span").remove();

    if (nim.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* NIM tidak boleh kosong";
        nim.parentNode.appendChild(pesanError);
    }
    if (nama.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Nama tidak boleh kosong";
        nama.parentNode.appendChild(pesanError);
    }
    if (jurusan.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Jurusan tidak boleh kosong";
        jurusan.parentNode.appendChild(pesanError);
    }
    if (alamat.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Alamat tidak boleh kosong";
        alamat.parentNode.appendChild(pesanError);
    }
    if (angkatan.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Angkatan tidak boleh kosong";
        angkatan.parentNode.appendChild(pesanError);
    }

    return validasi;
}
// validasi tambah

// FORM DELETE
function formDelete(button) {
    document.querySelector("body .notif").style.display = "flex";
    document.querySelector(".kotak .iya").value = button.value;
    let cancel = document.querySelector(".kotak .cancel");
    cancel.addEventListener("click", () => {
        document.querySelector("body .notif").style.display = "none";
    });
}
// form delete

// FORM EDIT
function formEdit(button) {
    let formTambah = document.querySelector("form.tambah");
    formTambah.classList.add("active");
    document.querySelector("button.tambah").textContent = "Cancel";
    document.querySelector("form.tambah h2").textContent = "Edit Data";
    document.getElementById("nim").value = button.parentNode.parentNode.querySelector("td:nth-child(1)").textContent;
    document.getElementById("nama").value = button.parentNode.parentNode.querySelector("td:nth-child(2)").textContent;
    document.getElementById("jurusan").value = button.parentNode.parentNode.querySelector("td:nth-child(3)").textContent;
    document.getElementById("alamat").value = button.parentNode.parentNode.querySelector("td:nth-child(4)").textContent;
    document.getElementById("angkatan").value = button.parentNode.parentNode.querySelector("td:nth-child(5)").textContent;
    document.querySelector("form.tambah button").setAttribute("onclick", "return validasiEdit()");
    document.querySelector("form.tambah button").setAttribute("name", "edit");
    document.querySelector("form.tambah button").setAttribute("value", button.value);
}
// form edit

// VALIDASI EDIT
function validasiEdit() {
    let validasi = true;
    let nim = document.getElementById("nim");
    let nama = document.getElementById("nama");
    let jurusan = document.getElementById("jurusan");
    let alamat = document.getElementById("alamat");
    let angkatan = document.getElementById("angkatan");
    
    if (nim.parentNode.querySelector("span")) nim.parentNode.querySelector("span").remove();
    if (nama.parentNode.querySelector("span")) nama.parentNode.querySelector("span").remove();
    if (jurusan.parentNode.querySelector("span")) jurusan.parentNode.querySelector("span").remove();
    if (alamat.parentNode.querySelector("span")) alamat.parentNode.querySelector("span").remove();
    if (angkatan.parentNode.querySelector("span")) angkatan.parentNode.querySelector("span").remove();

    if (nim.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* NIM tidak boleh kosong";
        nim.parentNode.appendChild(pesanError);
    }
    if (nama.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Nama tidak boleh kosong";
        nama.parentNode.appendChild(pesanError);
    }
    if (jurusan.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Jurusan tidak boleh kosong";
        jurusan.parentNode.appendChild(pesanError);
    }
    if (alamat.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Alamat tidak boleh kosong";
        alamat.parentNode.appendChild(pesanError);
    }
    if (angkatan.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Angkatan tidak boleh kosong";
        angkatan.parentNode.appendChild(pesanError);
    }

    return validasi;
}
// validasi edit