// scripts.js

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('loginForm');
    const errorMsg = document.getElementById('errorMsg');

    form.addEventListener('submit', function(event) {
        // reset pesan
        errorMsg.textContent = '';
        errorMsg.style.display = 'none';

        const username = form.username.value.trim();
        const password = form.password.value.trim();

        if (!username || !password) {
            event.preventDefault(); // hentikan submit
            errorMsg.textContent = 'Username dan password wajib diisi.';
            errorMsg.style.display = 'block';
            return;
        }

        // jika perlu validasi lain, bisa ditambahkan di sini
    });
});
