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


// const todoList = [];
// const addTask = document.getElementById("addTask");

// addTask.addEventListener("click", addTodoItem);

// function addTodoItem() {
//   let item = document.getElementById("todoInput").value;
//   todoList.push(item);

//   let list = document.getElementById("todoList");
//   let listItem = document.createElement("li"); // Ganti dari "div" ke "li"
//   listItem.className = "todoItem";

//   let checkbox = document.createElement("input");
//   checkbox.type = "checkbox";
//   let itemText = document.createElement("span");
//   itemText.textContent = item; // Pengetikan benar
  
//   checkbox.onclick = function () {
//     if (checkbox.checked) {
//       itemText.style.textDecoration = "line-through";
//       listItem.classList.add("checked");
//     } else {
//       itemText.style.textDecoration = "none";
//       listItem.classList.remove("checked");
//     }
//   };

//   listItem.appendChild(checkbox);
//   listItem.appendChild(itemText); // Pastikan urutannya benar
  
//   let buttonsDiv = document.createElement("div");
//   listItem.appendChild(buttonsDiv);

//   let editButton = document.createElement("button");
//   editButton.innerHTML = '<i class="fa-light fa-pen-to-square"></i>';
//   editButton.onclick = function () {
//     itemText.contentEditable = true;
//     itemText.focus();
//   };

//   buttonsDiv.appendChild(editButton);

//   itemText.onblur = function () {
//     itemText.contentEditable = false;
//     todoList[todoList.indexOf(item)] = itemText.textContent; // indexOf
//   };

//   let deleteButton = document.createElement("button");
//   deleteButton.innerHTML = '<i class="fa-light fa-trash"></i>';
//   deleteButton.onclick = function () {
//     list.removeChild(listItem);
//     todoList.splice(todoList.indexOf(item), 1); // indexOf
//   };

//   buttonsDiv.appendChild(deleteButton);

//   list.appendChild(listItem); // appendChild, bukan appendChil
//   document.getElementById("todoInput").value = ""; // Kosongkan input setelah menambah item
// }


// let todoinput=[];
// const addTask = document.getElementById("addTask");
// addTask.addEventListener("click" ,addTodoItem);
// function addTodoItem(){
//     let item = document.getElementById("todoInput").ariaValueMax;
//     todoList.push(item);

//     let list = document.getElementById("todoList");
//     let listItem = document.createElement("div");
//     listItem.className = "todoItem";

//     let checkbox = document.createElement("input");
//     checkbox.type = "checkbox";
//     checkbox.onclick = function (){
//         if(checkbox.checked){
//             itemText.style.textDecoration = "line-through";
//             listItem.classList.add("checked");
//         }else{
//             itemText.style.textDecoration="none";
//             listItem.classList.remove("checeked");
//         }
//     }
//     listItem.appendChild(checkbox);
//     let itemText = document.createElement("span");
//     listText.textContent = item;
//     listItem.appendChil(itemText);
//     let buttonsDiv = document.createElement("div");
//     listItem.appendChild(buttonsDiv);

//     let editButton = document.createElement("button");
//     editButton.innerHTML

//     let editButton = document.createElement("button");
//     editButton.innerHTML = '<i class="fa-light fa-pen-to-square"></i>';
//     editButton.onclick = function () {
//         itemText.contentEditable=true;
//         itemText.focus();
//     }
//     buttonsDiv.appendChild(editButton);

//     itemText.onblur = function(){
//         itemText.contentEditable = false;
//         todoList[todoList.index0f(item)]=itemText.textContent;
//     }
//     let deleteButton = document.createElement("button");
//     deleteButton.innerHTML = '<i class="fa-light fa-trash"></i>';
//     deleteButton.onclick = function (){
//         list.removeChild(listItem);
//         todoList.splice(todoList.indexOf(item),1);
//     }
//     buttonsDiv.appendChild(deleteButton);
//     list.appendChild(listItem);
//     document.getElementById("todoInput").value=""
// }