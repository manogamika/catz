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

// Mengambil nilai pesan dari data yang dikirim melalui metode POST.
$message = $_POST["message"];

// Mengamankan nilai pesan untuk mencegah serangan SQL injection.
// Metode real_escape_string() dari MySQLi digunakan untuk membersihkan input dari karakter khusus.
$message = $conn->real_escape_string($message);

// Menyusun SQL query untuk menyimpan pesan ke dalam tabel "messages".
$sql = "INSERT INTO messages (message) VALUES ('$message')";

// Menjalankan query untuk menyimpan pesan ke dalam database.
$conn->query($sql);

// Menutup koneksi database setelah selesai menyimpan data.
$conn->close();
?>
