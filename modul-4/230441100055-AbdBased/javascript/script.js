// Awal js navbar
const dropdownText = document.querySelector(".dropdownText");
const dropdownItems = document.querySelector(".dropdownItems");

dropdownText.addEventListener("click", () => {
  dropdownItems.classList.toggle("active");
});
// Akhir js navbar

const taskInput = document.querySelector(".task-input input");
const filters = document.querySelectorAll(".filters span");
const clearAll = document.querySelector(".clear-btn");
const taskBox = document.querySelector(".task-box");

let editId;
let isEditTask = false;
let todos = JSON.parse(localStorage.getItem("todo-list")) || [];

// Tampilkan tugas berdasarkan filter yang dipilih
function showTodo(filter) {
  let liTag = "";
  todos.forEach((todo, id) => {
    let completed = todo.status === "completed" ? "checked" : "";
    if (filter === todo.status || filter === "all") {
      liTag += `<li class="task">
                    <label for="${id}">
                        <input onclick="updateStatus(this)" type="checkbox" id="${id}" ${completed}>
                        <p class="${completed}">${todo.name}</p>
                    </label>
                    <div class="settings">
                        <i onclick="showMenu(this)" class="fa-solid fa-ellipsis"></i>
                        <ul class="task-menu">
                            <li onclick='editTask(${id}, "${todo.name}")'><i class="fa-solid fa-pen"></i>Edit</li>
                            <li onclick='deleteTask(${id})'><i class="fa-solid fa-trash"></i>Delete</li>
                        </ul>
                    </div>
                </li>`;
    }
  });

  taskBox.innerHTML = liTag || `<span>Tidak ada tugas yang ditambahkan</span>`;
  clearAll.classList.toggle(
    "active",
    !!taskBox.querySelectorAll(".task").length
  );
  taskBox.classList.toggle("overflow", taskBox.offsetHeight >= 300);
}

// Tampilkan semua tugas saat halaman dimuat
showTodo("all");

// Tampilkan menu saat tombol ellipsis diklik
function showMenu(selectedTask) {
  let menuDiv = selectedTask.parentElement.lastElementChild;
  menuDiv.classList.toggle("show");

  document.addEventListener("click", (e) => {
    if (e.target.tagName !== "I" || e.target !== selectedTask) {
      menuDiv.classList.remove("show");
    }
  });
}

// Perbarui status tugas saat checkbox diklik
function updateStatus(selectedTask) {
  let taskName = selectedTask.parentElement.lastElementChild;
  taskName.classList.toggle("checked", selectedTask.checked);
  todos[selectedTask.id].status = selectedTask.checked
    ? "completed"
    : "incompleted";
  localStorage.setItem("todo-list", JSON.stringify(todos));
}

// Edit tugas
function editTask(taskId, textName) {
  editId = taskId;
  isEditTask = true;
  taskInput.value = textName;
  taskInput.focus();
  taskInput.classList.add("active");
}

// Hapus tugas
function deleteTask(deleteId) {
  isEditTask = false;
  todos.splice(deleteId, 1);
  localStorage.setItem("todo-list", JSON.stringify(todos));
  showTodo(document.querySelector("span.active").id);
}

// Hapus semua tugas
clearAll.addEventListener("click", () => {
  isEditTask = false;
  todos = [];
  localStorage.setItem("todo-list", JSON.stringify(todos));
  showTodo("all");
});

// Tambah tugas baru saat tombol Enter ditekan
taskInput.addEventListener("keyup", (e) => {
  if (e.key === "Enter" && taskInput.value.trim()) {
    if (!isEditTask) {
      todos.push({ name: taskInput.value.trim(), status: "incompleted" });
    } else {
      todos[editId].name = taskInput.value.trim();
      isEditTask = false;
    }
    taskInput.value = "";
    localStorage.setItem("todo-list", JSON.stringify(todos));
    showTodo("all");
  }
});

// Aktifkan filter saat tombol filter diklik
filters.forEach((btn) => {
  btn.addEventListener("click", () => {
    document.querySelector(".filters span.active").classList.remove("active");
    btn.classList.add("active");
    showTodo(btn.id);
  });
});
