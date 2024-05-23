// Menambahkan listener untuk tombol "Add"
const addTask = document.getElementById("addTask");
// Menambahkan listener untuk input untuk mendeteksi penekanan tombol "Enter"
const todoInput = document.getElementById("todoInput");

// Fungsi untuk menambahkan item ke dalam daftar tugas
function addTodoItem() {
  // Mendapatkan nilai dari input
  const itemText = todoInput.value.trim(); // Trim untuk menghapus spasi di awal dan akhir
  if (itemText === "") return; // Jika input kosong, jangan tambahkan item

  // Membuat elemen baru untuk item tugas
  const listItem = document.createElement("li");
  listItem.className = "todoItem";

  // Membuat checkbox
  const checkbox = document.createElement("input");
  checkbox.type = "checkbox";
  checkbox.onclick = function () {
    if (checkbox.checked) {
      itemSpan.style.textDecoration = "line-through";
    } else {
      itemSpan.style.textDecoration = "none";
    }
  };

  // Membuat span untuk teks item
  const itemSpan = document.createElement("span");
  itemSpan.textContent = itemText;

  // Membuat tombol untuk mengedit
  const editButton = document.createElement("button");
  editButton.innerHTML = '<i class="fa-solid fa-pen-to-square"></i>';
  editButton.onclick = function () {
    itemSpan.contentEditable = true;
    itemSpan.focus();
  };

  // Membuat tombol untuk menghapus
  const deleteButton = document.createElement("button");
  deleteButton.innerHTML = '<i class="fa-solid fa-trash"></i>';
  deleteButton.onclick = function () {
    listItem.remove(); // Menghapus item dari daftar
  };

  // Menambahkan elemen ke dalam listItem
  listItem.appendChild(checkbox);
  listItem.appendChild(itemSpan);
  listItem.appendChild(editButton);
  listItem.appendChild(deleteButton);

  // Menambahkan item ke dalam daftar tugas
  const todoList = document.getElementById("todoList");
  todoList.appendChild(listItem);

  // Mengosongkan input setelah menambahkan item
  todoInput.value = "";
}

// Menambahkan event listener untuk tombol "Add"
addTask.addEventListener("click", addTodoItem);

// Menambahkan event listener untuk input untuk mendeteksi penekanan tombol "Enter"
todoInput.addEventListener("keydown", function (event) {
  if (event.key === "Enter") { // Jika tombol yang ditekan adalah "Enter"
    addTodoItem(); // Menambahkan item baru
    event.preventDefault(); // Mencegah tindakan default (misalnya, pindah baris baru)
  }
});


