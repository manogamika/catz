<?php
// Membuat koneksi ke database menggunakan MySQLi.
// "localhost" adalah alamat server database, sering kali digunakan saat pengembangan di lingkungan lokal.
// "username" adalah nama pengguna database yang memiliki hak akses ke tabel yang diinginkan.
// "password" adalah kata sandi untuk akun pengguna database.
// "table" adalah nama tabel dalam database yang akan diakses.
$conn = new mysqli("localhost", "username", "password", "table");

// Memeriksa apakah koneksi berhasil. Jika tidak, hentikan eksekusi dengan pesan kesalahan.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menyiapkan SQL query untuk mengambil 10 pesan terakhir dari tabel "messages".
$sql = "SELECT id, message, created_at FROM messages ORDER BY created_at DESC LIMIT 10";

// Menjalankan query ke database dan menyimpan hasilnya di variabel $result.
$result = $conn->query($sql);

// Memeriksa apakah ada baris data yang dihasilkan dari query sebelumnya.
if ($result->num_rows > 0) {
    // Melakukan iterasi melalui hasil query dan menampilkan pesan dalam elemen paragraf.
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row["message"] . "</p>";
    }
}

// Menutup koneksi database setelah selesai mengambil dan menampilkan data.
$conn->close();
?>
