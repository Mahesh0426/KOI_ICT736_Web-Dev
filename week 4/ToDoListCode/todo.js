const taskInput = document.getElementById("taskInput");
const addBtn = document.getElementById("addBtn");
const taskList = document.getElementById("taskList");
const counter = document.getElementById("counter");
const clearBtn = document.getElementById("clearBtn");

//get from local storage
let tasks = JSON.parse(localStorage.getItem("tasks")) || [];

function save() {
  // save to local storage
  localStorage.setItem("tasks", JSON.stringify(tasks));
  render();
}

function render() {
  taskList.innerHTML = "";
  tasks.forEach((task, idx) => {
    const li = document.createElement("li");
    li.className = task.done ? "done" : "";

    li.innerHTML = `
      <label class="checkLabel" onclick="toggleTask(${idx})">
        <i class="fa-solid ${task.done ? "fa-square-check" : "fa-square"}"></i>
        <span>${task.text}</span>
      </label>
      <button class="delete" onclick="deleteTask(${idx})">
        <i class="fa-solid fa-trash"></i>
      </button>
    `;
    taskList.appendChild(li);
  });

  //calculate how many tasks left
  const left = tasks.filter((t) => !t.done).length; //filter out tasks that are done
  counter.textContent = `${left} left`; //display the number of tasks left
  clearBtn.hidden = tasks.every((t) => !t.done); //hide the clear button if all tasks are done
}

//function to add task
function addTask() {
  const text = taskInput.value.trim(); //trim removes whitespace
  if (!text) return;
  tasks.unshift({ text, done: false }); //unshift adds to the beginning
  taskInput.value = "";
  save();
}

//function to toggle task
function toggleTask(i) {
  tasks[i].done = !tasks[i].done;
  save();
}

//function to delete task
function deleteTask(i) {
  tasks.splice(i, 1); //splice deletes
  save();
}

// EVENTS
addBtn.addEventListener("click", addTask);
taskInput.addEventListener("keydown", (e) => e.key === "Enter" && addTask()); //when enter key is pressed
clearBtn.addEventListener("click", () => {
  tasks = tasks.filter((t) => !t.done); //filter out tasks that are done
  save();
});

// INIT
render();
