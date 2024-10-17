const taskGroups = {};

function addTask() {
    const taskTitle = prompt("Masukkan judul tugas:");
    const taskDate = prompt("Masukkan tanggal tugas (contoh: 'Kam, 14 Jan'):");
    const taskCategory = prompt("Masukkan kategori tugas (contoh: 'Pekerjaan', 'Pribadi', 'Belanja'):");
    
    if (taskTitle && taskDate && taskCategory) {
        const dateKey = taskDate.trim();
        
        // Buat elemen tugas
        const taskContainer = document.createElement("div");
        taskContainer.className = "task";
        taskContainer.innerHTML = `
            <input class="checkbox" type="checkbox"/>
            <div class="details">
                <div class="title">${taskTitle}</div>
                <div class="subtitle">Tugas Pekerjaan · ${dateKey}</div>
                <div class="category">${taskCategory}</div>
            </div>
            <i class="fas fa-star star" onclick="toggleStar(this)"></i>
            <i class="fas fa-trash delete" onclick="deleteTask(this)"></i>
        `;

        // Tambahkan tugas ke kelompok tanggal yang sesuai
        if (!taskGroups[dateKey]) {
            taskGroups[dateKey] = document.createElement("div");
            taskGroups[dateKey].className = "date-group";
            taskGroups[dateKey].innerHTML = `<div class="date">${dateKey} <span class="count">1</span></div>`;
            document.getElementById("taskContainer").appendChild(taskGroups[dateKey]);
        } else {
            const countSpan = taskGroups[dateKey].querySelector(".count");
            countSpan.textContent = parseInt(countSpan.textContent) + 1;
        }

        taskGroups[dateKey].appendChild(taskContainer);
    }
}

function toggleStar(starElement) {
    starElement.classList.toggle("active");
}

function deleteTask(deleteElement) {
    const task = deleteElement.closest('.task');
    const dateGroup = task.parentElement;
    dateGroup.removeChild(task);
    
    // Perbarui jumlah
    const countSpan = dateGroup.querySelector(".count");
    countSpan.textContent = parseInt(countSpan.textContent) - 1;

    // Jika jumlah menjadi nol, hapus kelompok tanggal
    if (parseInt(countSpan.textContent) <= 0) {
        dateGroup.remove();
        delete taskGroups[dateGroup.querySelector(".date").textContent.trim()];
    }
}

// Delegasi acara untuk penanganan kotak centang
document.getElementById('taskContainer').addEventListener('click', function(event) {
    if (event.target.classList.contains('checkbox')) {
        const task = event.target.closest('.task');
        if (event.target.checked) {
            task.style.textDecoration = "line-through";
            task.style.color = "gray";
        } else {
            task.style.textDecoration = "none";
            task.style.color = "black";
        }
    }
});
