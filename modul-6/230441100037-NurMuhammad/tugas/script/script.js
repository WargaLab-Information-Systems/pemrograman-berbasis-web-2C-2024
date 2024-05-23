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
function loginOrRegister() {
    var login = document.querySelector(".login");
    if(login.querySelector('h1').textContent === "Login") {
        login.classList.add('register');
        login.querySelector('h1').textContent = "Register";
        // login.querySelector('.reset').textContent = "Login";
        login.querySelector('.submit').setAttribute("name", "register");
        login.querySelector('.submit').setAttribute("onclick", "return validasiLogin(false)");
    } else {
        login.classList.remove('register');
        login.querySelector('h1').textContent = "Login";
        // login.querySelector('.reset').textContent = "Register";
        login.querySelector('.submit').setAttribute("name", "login");
        login.querySelector('.submit').setAttribute("onclick", "return validasiLogin(true)");
    }
}

function validasiLogin(isLogin) {
    let validasi = true;
    if(!isLogin) {
        let username = document.getElementById("username");
        if (username.parentNode.querySelector("span")) username.parentNode.querySelector("span").remove();
        if (username.value.trim() === '') {
            validasi = false;
            let pesanError = document.createElement("span");
            pesanError.textContent = "* Username tidak boleh kosong";
            username.parentNode.appendChild(pesanError);
        }
    }
    let email = document.getElementById("email");
    let password = document.getElementById("password");

    if (email.parentNode.querySelector("span")) email.parentNode.querySelector("span").remove();
    if (password.parentNode.querySelector("span")) password.parentNode.querySelector("span").remove();

    if (email.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Email tidak boleh kosong";
        email.parentNode.appendChild(pesanError);
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

// FAKULTAS JURUSAN PRODI

// show toggle
document.querySelectorAll('.fakultas-row .info').forEach(function(infoButton) {
    infoButton.addEventListener('click', function() {
        var btn = this;
        var idFakultas = btn.getAttribute('id-fakultas');
        var jurusanRows = document.querySelectorAll('.jurusan-row');
        
        jurusanRows.forEach(function(jurusanRow) {
            if (jurusanRow.getAttribute('id-fakultas') === idFakultas) {
                if (jurusanRow.style.display === "none") {
                    jurusanRow.style.display = "table-row";
                    btn.innerHTML = '<i class="fa-solid fa-chevron-down"></i>';
                } else {
                    jurusanRow.style.display = "none";
                    btn.innerHTML = '<i class="fa-solid fa-chevron-up"></i>';
                    var idJurusan = jurusanRow.querySelector('.info').getAttribute('id-jurusan');
                    var prodiRows = document.querySelectorAll('.prodi-row');
                    prodiRows.forEach(function(prodiRow) {
                        if (prodiRow.getAttribute('id-jurusan') === idJurusan) {
                            prodiRow.style.display = "none";
                            jurusanRow.querySelector('.info').innerHTML = '<i class="fa-solid fa-chevron-up"></i>';
                        }
                    });
                }
            }
        });
    });
});
document.querySelectorAll('.jurusan-row .info').forEach(function(infoButton) {
    infoButton.addEventListener('click', function() {
        var btn = this;
        var idJurusan = btn.getAttribute('id-jurusan');
        var prodiRows = document.querySelectorAll('.prodi-row');
        
        prodiRows.forEach(function(prodiRow) {
            if (prodiRow.getAttribute('id-jurusan') === idJurusan) {
                if (prodiRow.style.display === "none") {
                    prodiRow.style.display = "table-row";
                    btn.innerHTML = '<i class="fa-solid fa-chevron-down"></i>';
                } else {
                    prodiRow.style.display = "none";
                    btn.innerHTML = '<i class="fa-solid fa-chevron-up"></i>';
                }
            }
        });
    });
});
// fakultas jurusan prodi

// VALIDASI MAHASISWA
function validasiMahasiswa() {
    let validasi = true;
    let nim = document.getElementById("nim");
    let nama = document.getElementById("nama");
    let tgl_lahir = document.getElementById("tgl_lahir");
    let jenis_kelamin = document.getElementById("jenis_kelamin");
    let fakultas = document.getElementById("fakultas");
    let jurusan = document.getElementById("jurusan");
    let prodi = document.getElementById("prodi");
    let alamat = document.getElementById("alamat");
    
    if (nim.parentNode.querySelector("span")) nim.parentNode.querySelector("span").remove();
    if (nama.parentNode.querySelector("span")) nama.parentNode.querySelector("span").remove();
    if (tgl_lahir.parentNode.querySelector("span")) tgl_lahir.parentNode.querySelector("span").remove();
    if (jenis_kelamin.parentNode.querySelector("span")) jenis_kelamin.parentNode.querySelector("span").remove();
    if (fakultas.parentNode.querySelector("span")) fakultas.parentNode.querySelector("span").remove();
    if (jurusan.parentNode.querySelector("span")) jurusan.parentNode.querySelector("span").remove();
    if (prodi.parentNode.querySelector("span")) prodi.parentNode.querySelector("span").remove();
    if (alamat.parentNode.querySelector("span")) alamat.parentNode.querySelector("span").remove();

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
    if (tgl_lahir.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Tanggal Lahir tidak boleh kosong";
        tgl_lahir.parentNode.appendChild(pesanError);
    }
    if (jenis_kelamin.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Jenis Kelamin tidak boleh kosong";
        jenis_kelamin.parentNode.appendChild(pesanError);
    }
    if (fakultas.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Fakultas tidak boleh kosong";
        fakultas.parentNode.appendChild(pesanError);
    }
    if (jurusan.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Jurusan tidak boleh kosong";
        jurusan.parentNode.appendChild(pesanError);
    }
    if (prodi.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Program Studi tidak boleh kosong";
        prodi.parentNode.appendChild(pesanError);
    }
    if (alamat.value.trim() === '') {
        validasi = false;
        let pesanError = document.createElement("span");
        pesanError.textContent = "* Alamat tidak boleh kosong";
        alamat.parentNode.appendChild(pesanError);
    }

    return validasi;
}
// validasi mahasiswa