let tombolDropdown = document.getElementById("tombol-dropdown");
let itemsDropdown = document.getElementById("items-dropdown");

tombolDropdown.addEventListener("click", () => {
    if (itemsDropdown.style.display === "none") {
        itemsDropdown.style.display = "block"
    } else {
        itemsDropdown.style.display = "none"
    }
})


// TODO
// TODO LIST
let list = [];

function addTask() {
    let input = document.getElementById("taskInput");
    let listText = input.value.trim();
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

function editList(index) {
    let text = prompt("Masukkan teks baru:");
    if (text !== null && text.trim() !== "") {
        list[index].text = text.trim();
        tampil();
    }
}

function deleteList(index) {
    list.splice(index, 1);
    tampil();
}

function tampil() {
    let ul = document.getElementById("taskList");
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
        
        let aksi = document.createElement("div.aksi");
        let li = document.createElement("li");
        aksi.appendChild(editButton);
        aksi.appendChild(deleteButton);
        li.appendChild(p)
        li.appendChild(aksi)
        ul.appendChild(li);
    });
}
// todo list
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