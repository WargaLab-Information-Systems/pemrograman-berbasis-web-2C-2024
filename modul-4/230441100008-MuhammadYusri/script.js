const taskInput = document.getElementById('taskInput');
const Tombol_tambah = document.getElementById('Tombol_tambah');
const List = document.getElementById('List');

Tombol_tambah.addEventListener('click', addTask);

function addTask() {
	const taskText = taskInput.value.trim();
	if (taskText) {
		const taskItem = createTaskItem(taskText);
		List.appendChild(taskItem);
		taskInput.value = '';
	}
}

function createTaskItem(text) {
	const li = document.createElement('li');
	const span = document.createElement('span');
	span.textContent = text;
	li.appendChild(span);

	const toggleBtn = document.createElement('button');
	toggleBtn.textContent = 'Tandai Selesai';
	toggleBtn.addEventListener('click', toggleTask);
	li.appendChild(toggleBtn);

	const editBtn = document.createElement('button');
	editBtn.textContent = 'Ubah';
	editBtn.addEventListener('click', editTask);
	li.appendChild(editBtn);

	const deleteBtn = document.createElement('button');
	deleteBtn.textContent = 'Hapus';
	deleteBtn.addEventListener('click', deleteTask);
	li.appendChild(deleteBtn);

	return li;
}

function toggleTask() {
	this.parentNode.classList.toggle('completed');
}

function editTask() {
	const taskText = this.parentNode.firstChild.textContent;
	const newTaskText = prompt('Ubah tugas:', taskText);
	if (newTaskText !== null && newTaskText.trim() !== '') {
		this.parentNode.firstChild.textContent = newTaskText;
	}
}

function deleteTask() {
	this.parentNode.remove();
}




