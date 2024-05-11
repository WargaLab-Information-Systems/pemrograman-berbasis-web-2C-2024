const input = document.querySelector("input"); // Memilih elemen input
const addButton = document.querySelector(".add-button"); // Memilih tombol tambah
const todosHtml = document.querySelector(".todos"); // Memilih elemen daftar tugas
const emptyImage = document.querySelector(".empty-image"); // Memilih elemen gambar kosong
let todosJson = JSON.parse(localStorage.getItem("todos")) || []; // Mengambil data tugas dari local storage atau membuat array kosong
const deleteAllButton = document.querySelector(".delete-all"); // Memilih tombol hapus semua
const filters = document.querySelectorAll(".filter"); // Memilih semua elemen filter
let filter = ''; // Variabel untuk menyimpan filter yang sedang aktif

// Fungsi untuk menghasilkan HTML untuk setiap tugas
function getTodoHtml(todo, index) {
  if (filter && filter != todo.status) { // Memeriksa filter yang aktif
    return ''; // Jika tidak cocok dengan filter, kembalikan string kosong
  }
  let checked = todo.status == "completed" ? "checked" : ""; // Menandai apakah tugas telah selesai
  return /* html */ `
    <li class="todo">
      <label for="${index}">
        <input id="${index}" onclick="updateStatus(this)" type="checkbox" ${checked}>
        <span class="${checked}">${todo.name}</span>
      </label>
      <button class="edit-btn" data-index="${index}"><i class="fa fa-pencil"></i> Edit</button>
      <button class="delete-btn" data-index="${index}" onclick="remove(this)"><i class="fa fa-times"></i></button>
    </li>
  `; 
}


// Fungsi untuk menampilkan daftar tugas
function showTodos() {
  if (todosJson.length == 0) {
    todosHtml.innerHTML = ''; // Kosongkan daftar tugas jika tidak ada tugas
    emptyImage.style.display = 'block'; // Tampilkan gambar kosong
  } else {
    todosHtml.innerHTML = todosJson.map(getTodoHtml).join(''); // Tampilkan daftar tugas
    emptyImage.style.display = 'none'; // Sembunyikan gambar kosong
  }
}

// Fungsi untuk menambahkan tugas baru
function addTodo(todo)  {
  input.value = ""; // Mengosongkan input
  todosJson.unshift({ name: todo, status: "pending" }); // Menambahkan tugas ke array
  localStorage.setItem("todos", JSON.stringify(todosJson)); // Menyimpan array tugas ke local storage
  showTodos(); // Menampilkan daftar tugas terbaru
}

// Fungsi untuk mengedit tugas
function editTodo(index) {
    const newName = prompt("Edit task:", todosJson[index].name);
    if (newName !== null && newName.trim() !== "") {
      todosJson[index].name = newName.trim();
      localStorage.setItem("todos", JSON.stringify(todosJson)); // Simpan perubahan ke local storage
      showTodos(); // Tampilkan daftar tugas yang diperbarui
    }
  }
  
  // Mendengarkan event saat tombol "Edit" di-klik pada setiap tugas
  document.addEventListener("click", function(event) {
    if (event.target && event.target.classList.contains("edit-btn")) {
      const index = event.target.dataset.index;
      editTodo(index);
    }
  });
  

// Mendengarkan event saat tombol enter ditekan pada input
input.addEventListener("keyup", e => {
  let todo = input.value.trim();
  if (!todo || e.key != "Enter") {
    return;
  }
  addTodo(todo);
});

// Mendengarkan event saat tombol tambah diklik
addButton.addEventListener("click", () => {
  let todo = input.value.trim();
  if (!todo) {
    return;
  }
  addTodo(todo);
});

// Fungsi untuk memperbarui status tugas (selesai/belum selesai)
function updateStatus(todo) {
  let todoName = todo.parentElement.lastElementChild;
  if (todo.checked) {
    todoName.classList.add("checked");
    todosJson[todo.id].status = "completed";
  } else {
    todoName.classList.remove("checked");
    todosJson[todo.id].status = "pending";
  }
  localStorage.setItem("todos", JSON.stringify(todosJson)); // Menyimpan perubahan ke local storage
}

// Fungsi untuk menghapus tugas
function remove(todo) {
  const index = todo.dataset.index;
  todosJson.splice(index, 1); // Menghapus tugas dari array
  showTodos(); // Menampilkan daftar tugas terbaru
  localStorage.setItem("todos", JSON.stringify(todosJson)); // Menyimpan perubahan ke local storage
}

// Mendengarkan event saat filter di-klik
filters.forEach(function (el) {
  el.addEventListener("click", (e) => {
    if (el.classList.contains('active')) {
      el.classList.remove('active');
      filter = '';
    } else {
      filters.forEach(tag => tag.classList.remove('active'));
      el.classList.add('active');
      filter = e.target.dataset.filter;
    }
    showTodos(); // Menampilkan daftar tugas sesuai dengan filter yang aktif
  });
});

// Mendengarkan event saat tombol hapus semua di-klik
deleteAllButton.addEventListener("click", () => {
  todosJson = []; // Mengosongkan array tugas
  localStorage.setItem("todos", JSON.stringify(todosJson)); // Menyimpan perubahan ke local storage
  showTodos(); // Menampilkan daftar tugas terbaru
});
