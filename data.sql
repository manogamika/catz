-- Membuat tabel "messages" untuk menyimpan pesan.
CREATE TABLE messages (
    -- Kolom "id" sebagai kunci utama dengan penomoran otomatis (AUTO_INCREMENT).
    id INT AUTO_INCREMENT PRIMARY KEY,
    
    -- Kolom "message" untuk menyimpan isi pesan. Tidak boleh kosong (NOT NULL).
    message TEXT NOT NULL,
    
    -- Kolom "created_at" untuk menyimpan timestamp kapan pesan dibuat.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
