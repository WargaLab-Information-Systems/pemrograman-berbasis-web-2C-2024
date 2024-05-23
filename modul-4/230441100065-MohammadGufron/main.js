// Muat daftar tugas dari localStorage dan isi daftar tugas
function loadTasks() {
    var tasks = JSON.parse(localStorage.getItem('tasks')) || [];
    var taskList = document.getElementById("taskList");
    taskList.innerHTML = "";

    tasks.forEach(function(task) {
        var li = document.createElement("li");
        li.innerHTML = task.text + ' <button onclick="toggleTaskCompletion(this)">Tandai Selesai</button>' +
                        ' <button onclick="editTask(this)">Ubah</button>' +
                        ' <button onclick="deleteTask(this.parentElement)">Hapus</button>';
        if (task.completed) {
            li.classList.add("completed");
        }
        taskList.appendChild(li);
    });
}

// Tambah tugas baru ke daftar tugas
function addTask() {
    var taskInput = document.getElementById("taskInput");
    var taskList = document.getElementById("taskList");
    var tasks = JSON.parse(localStorage.getItem('tasks')) || [];

    if (taskInput.value !== "") {
        var li = document.createElement("li");
        li.innerHTML = taskInput.value + ' <button onclick="toggleTaskCompletion(this)">Tandai Selesai</button>' +
                        ' <button onclick="editTask(this)">Ubah</button>' +
                        ' <button onclick="deleteTask(this.parentElement)">Hapus</button>';
        taskList.appendChild(li);
        tasks.push({ text: taskInput.value, completed: false });
        localStorage.setItem('tasks', JSON.stringify(tasks));
        taskInput.value = "";
    } else {
        alert("Silakan masukkan tugas!");
    }
}

// Ubah teks tugas
function editTask(button) {
    var task = button.parentElement;
    var tasks = JSON.parse(localStorage.getItem('tasks')) || [];
    var index = Array.from(task.parentNode.children).indexOf(task);
    var newText = prompt("Ubah tugas:", tasks[index].text);
    if (newText !== null) {
        tasks[index].text = newText;
        localStorage.setItem('tasks', JSON.stringify(tasks));
        task.firstChild.nodeValue = newText;
    }
}

// Hapus tugas dari daftar tugas
function deleteTask(task) {
    var tasks = JSON.parse(localStorage.getItem('tasks')) || [];
    var index = Array.from(task.parentNode.children).indexOf(task);
    tasks.splice(index, 1);
    localStorage.setItem('tasks', JSON.stringify(tasks));
    task.parentElement.removeChild(task);
}

// Toggle status penyelesaian tugas
function toggleTaskCompletion(button) {
    var task = button.parentElement;
    task.classList.toggle("completed");

    var tasks = JSON.parse(localStorage.getItem('tasks')) || [];
    var index = Array.from(task.parentNode.children).indexOf(task);
    tasks[index].completed = !tasks[index].completed;
    localStorage.setItem('tasks', JSON.stringify(tasks));
}