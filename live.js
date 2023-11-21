// Fungsi untuk mengirim pesan ke server.
function sendMessage() {
    // Mendapatkan elemen input pesan berdasarkan ID.
    var messageInput = document.getElementById("message-input");
    // Mengambil nilai pesan setelah menghapus spasi di awal dan akhir.
    var message = messageInput.value.trim();

    // Memastikan pesan tidak kosong sebelum mengirim ke server.
    if (message !== "") {
  
        // Membuat objek XMLHttpRequest untuk berkomunikasi dengan server.
        var xhr = new XMLHttpRequest();
        // Mengatur metode dan endpoint untuk pengiriman pesan.
        xhr.open("POST", "send.php", true);
        // Mengatur header untuk konten yang akan dikirim.
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // Menangani perubahan status XMLHttpRequest.
        xhr.onreadystatechange = function () {
            // Memastikan permintaan berhasil dan selesai.
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Mengosongkan input setelah berhasil mengirim pesan.
                messageInput.value = "";
            }
        };
        // Mengirim data pesan terenkripsi ke server.
        xhr.send("message=" + encodeURIComponent(message));
    }
}

// Fungsi untuk memperbarui tampilan obrolan dari server secara periodik.
function updateChat() {
    // Mendapatkan elemen yang menampung pesan obrolan.
    var chatMessages = document.getElementById("chat-messages");

    // Membuat objek XMLHttpRequest untuk berkomunikasi dengan server.
    var xhr = new XMLHttpRequest();
    // Mengatur metode dan endpoint untuk mendapatkan pesan obrolan.
    xhr.open("GET", "get.php", true);
    // Menangani perubahan status XMLHttpRequest.
    xhr.onreadystatechange = function () {
        // Memastikan permintaan berhasil dan selesai.
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Menyimpan respons server (pesan obrolan) ke dalam elemen HTML.
            chatMessages.innerHTML = xhr.responseText;
        }
    };
    // Mengirim permintaan GET ke server.
    xhr.send();

    // Mengatur fungsi ini agar dipanggil setiap 1000 milidetik (1 detik).
    setTimeout(updateChat, 1000);
}

// Memanggil fungsi updateChat untuk pertama kali saat halaman dimuat.
updateChat();
