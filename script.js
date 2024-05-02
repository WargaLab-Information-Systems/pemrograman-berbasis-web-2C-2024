// Mendapatkan elemen input dan daftar tugas
var taskInput = document.getElementById("taskInput");
var taskList = document.getElementById("taskList");

// Fungsi untuk menambahkan tugas
function addTask() {
    var taskText = taskInput.value;
    if (taskText.trim() !== "") {
        var li = document.createElement("li");
        li.innerHTML = '<input type="checkbox" onclick="toggleCompleted(this)"> ' + taskText + ' <button onclick="editTask(this)">Ubah</button> <button onclick="deleteTask(this)">Hapus</button>';
        taskList.appendChild(li);
        taskInput.value = "";
    } else {
        alert("Silakan masukkan teks untuk tugas!");
    }
}

// Fungsi untuk menandai atau menghapus tugas sebagai selesai
function toggleCompleted(checkbox) {
    var listItem = checkbox.parentNode;
    if (checkbox.checked) {
        listItem.classList.add("completed");
    } else {
        listItem.classList.remove("completed");
    }
}

// Fungsi untuk mengedit tugas
function editTask(element) {
    var listItem = element.parentNode;
    var taskText = listItem.childNodes[1].nodeValue;
    var newText = prompt("Edit tugas:", taskText);
    if (newText !== null && newText.trim() !== "") {
        listItem.childNodes[1].nodeValue = newText;
    }
}

// Fungsi untuk menghapus tugas
function deleteTask(element) {
    var listItem = element.parentNode;
    taskList.removeChild(listItem);
}

// Mendefinisikan elemen audio dan tombol
var audio = new Audio('DJ GOYANG DAYUNG MASHUP FULL SONG MAMAN FVNDY 2023 (320).mp3');
var playButton = document.getElementById("playButton");
var stopButton = document.getElementById("stopButton");

// Fungsi untuk memainkan musik
function playMusic() {
    audio.play();
}

// Fungsi untuk menghentikan musik
function stopMusic() {
    audio.pause();
    audio.currentTime = 0;
}

// Memasang event listener pada tombol play dan stop
playButton.addEventListener("click", playMusic);
stopButton.addEventListener("click", stopMusic);
