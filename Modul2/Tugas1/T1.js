const display = document.getElementById('display');
let currentInput = '';      // Menyimpan input saat ini
let operator = '';          // Menyimpan operator terakhir
let resultDisplayed = false; // Menandakan apakah hasil ditampilkan

// Fungsi untuk memperbarui layar
function updateDisplay(value) {
    display.textContent = value;
}

// Fungsi untuk menangani klik tombol
function handleButtonClick(e) {
    const buttonValue = e.target.textContent;

    if (buttonValue === 'C') {
        clearCalculator();
    } else if (buttonValue === '=') {
        calculateResult();
    } else if (['+', '-', '/', '*'].includes(buttonValue)) {
        handleOperator(buttonValue);
    } else {
        handleNumber(buttonValue);
    }
}

// Fungsi untuk menangani input angka
function handleNumber(number) {
    if (resultDisplayed) {
        currentInput = number; // Reset input jika hasil ditampilkan
        resultDisplayed = false;
    } else {
        currentInput += number; // Tambahkan angka
    }
    updateDisplay(currentInput); // Perbarui layar
}

// Fungsi untuk menangani operator
function handleOperator(op) {
    // Jika sudah ada input, tambahkan operator dan spasi
    if (currentInput) {
        currentInput += ' ' + op + ' '; // Tambahkan operator
        updateDisplay(currentInput); // Tampilkan ekspresi di layar
    }
    operator = op; // Simpan operator yang baru dipilih
}

// Fungsi untuk menghitung hasil
function calculateResult() {
    if (!currentInput) return; // Cek apakah ada input

    // Mengganti semua spasi dalam input untuk memudahkan evaluasi
    const cleanedInput = currentInput.replace(/\s+/g, ' ').trim();
    try {
        const result = eval(cleanedInput); // Hitung hasil dari input
        currentInput = result.toString(); // Simpan hasil
        resultDisplayed = true; // Tandai bahwa hasil ditampilkan
        updateDisplay(currentInput); // Perbarui layar dengan hasil
    } catch (error) {
        updateDisplay('Error'); // Tampilkan error jika evaluasi gagal
    }
}

// Fungsi untuk menghapus semua input
function clearCalculator() {
    currentInput = '';
    resultDisplayed = false;
    updateDisplay('0');
}

// Tambahkan event listener untuk setiap tombol
document.querySelectorAll('.button').forEach(button => {
    button.addEventListener('click', handleButtonClick);
});
