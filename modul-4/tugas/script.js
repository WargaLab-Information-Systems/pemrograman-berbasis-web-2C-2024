// DROPDOWN
dropdownToggleMenu = document.getElementById('dropdown-toggle-menu');
dropdownItemsMenu = document.getElementById('dropdown-items-menu');

dropdownToggleMenu.addEventListener("click", () => {
    if (dropdownItemsMenu.style.display === "none") {
        dropdownItemsMenu.style.display = "block";
    } else {
        dropdownItemsMenu.style.display = "none";
    }
});
// dropdown

// PLAYLIST MUSIC
let audio;
let isPlaying = false;
let musicSebelumnya = "";
let btnSebelumnya = null;

function playMusic(button, music) {
    if (!audio || music !== musicSebelumnya) {
        if (audio) {
            audio.pause();
        }
        audio = new Audio(music);
        audio.play();
        musicSebelumnya = music;
        isPlaying = true;
        if (btnSebelumnya !== null) {
            btnSebelumnya.innerHTML = '<i class="fa-solid fa-play"></i>';
        }
        button.innerHTML = '<i class="fa-solid fa-pause"></i>';
    } else {
        if (isPlaying) {
            audio.pause();
            isPlaying = false;
            button.innerHTML = '<i class="fa-solid fa-play"></i>';
        } else {
            audio.play();
            isPlaying = true;
            button.innerHTML = '<i class="fa-solid fa-pause"></i>';
        }
    }
    
    btnSebelumnya = button;
}
// playlist music


// TODO LIST
let list = [];

function addList() {
    let input = document.getElementById("input");
    let listText = input.value;
    if (listText !== "") {
        list.push({ 
            text: listText,
            selesai: false
        });
        input.value = "";
        tampil();
    }
}

function toggleList(index) {
    list[index].selesai = !list[index].selesai;
    tampil();
}

// function editList(index) {
//     let text = prompt("Masukkan teks baru:");
//     if (text !== null && text !== "") {
//         list[index].text = text;
//         tampil();
//     }
// }
function editList(index) {
    let input = document.getElementById("input");
    input.value = list[index].text;
    let btnAdd = document.querySelector(".form button");
    btnAdd.setAttribute("onclick", "");
    btnAdd.textContent = "Simpan";
    btnAdd.addEventListener("click", () => {
        if (input.value !== null && input.value !== "") {
            list[index].text = input.value;
            input.value = "";
            btnAdd.setAttribute("onclick", "addList()");
            btnAdd.textContent = "Tambah";
            tampil();
        }
    });
}

function deleteList(index) {
    list.splice(index, 1);
    tampil();
}

function tampil() {
    let ul = document.getElementById("list");
    ul.innerHTML = "";
    list.forEach((isi, index) => {
        let p = document.createElement("p");
        p.textContent = isi.text;
        if (isi.selesai) {
            p.classList.add("selesai");
        }

        p.addEventListener("click", () => toggleList(index));

        let editButton = document.createElement("button");
        editButton.textContent = "Edit";
        editButton.addEventListener("click", () => editList(index));

        let deleteButton = document.createElement("button");
        deleteButton.textContent = "Delete";
        deleteButton.addEventListener("click", () => deleteList(index));
        
        let aksi = document.createElement("div");
        aksi.classList.add("aksi");
        let li = document.createElement("li");
        aksi.appendChild(editButton);
        aksi.appendChild(deleteButton);
        li.appendChild(p)
        li.appendChild(aksi)
        ul.appendChild(li);
    });
}
// todo list