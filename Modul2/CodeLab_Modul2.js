const form = document.getElementById('myForm');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    const nama = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const Alamat = document.getElementById('alamat').value;

    if (nama === '' || email === '' || Alamat ==='') {
        alert('Mohon isi semua field!');
    } else {
        alert('Data berhasil dikirim!');
    }
});