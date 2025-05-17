<p align="center">
  <b>RentNGo</b><br>
  <i>(Sistem Penyewaan Alat Camping)</i><br><br>
 <img src="./LogoUnsulbar.png" alt="Logo Unsulbar" width="150"><br><br>
  <b>Rifqah.S</b><br>
  <b>D0223314</b><br><br>
  Framework Web Based<br>
  2025
</p>

# 🏕️ RentNGo – Sistem Penyewaan Alat Camping

RentNGo adalah sistem berbasis Laravel yang digunakan untuk menyewakan peralatan camping secara online, dengan peran yang berbeda seperti **Admin**, **Staff**, dan **User (Penyewa)**. Sistem ini mendukung manajemen alat, penyewaan, pembayaran, laporan, serta pengelolaan pengguna dengan role-based access control.

---

## 🎯 Role dan Fitur-fiturnya

### 🔐 Admin

* Manajemen Pengguna: Melihat, menambah, mengedit, dan menghapus pengguna (admin, staff, user).
* Manajemen Alat Camping: Menambah, mengedit, dan menghapus alat camping.
* Manajemen Penyewaan: Melihat dan memverifikasi status penyewaan.
* Manajemen Pembayaran: Mengonfirmasi pembayaran yang masuk.
* Laporan dan Statistik: Melihat laporan penyewaan dan pendapatan.
* Pengaturan Umum: Mengatur kebijakan sewa dan sistem.

### 🛠️ Staff

* Manajemen Alat Camping: Menambah stok, mengedit deskripsi dan harga.
* Manajemen Penyewaan: Menandai alat telah disewa/dikembalikan.
* Input Penyewaan Baru: Membuat penyewaan atas nama user.
* Proses Pembayaran: Memverifikasi dan memproses pembayaran.
* Laporan Penyewaan: Melihat alat yang sedang disewa.

### 👤 User (Penyewa)

* Lihat Alat Camping: Melihat daftar alat camping beserta deskripsi dan harga.
* Sewa Alat: Memilih alat, menentukan tanggal sewa dan pengembalian.
* Pembayaran: Melakukan pembayaran setelah menyewa.
* Riwayat Penyewaan: Melihat riwayat sewa dan status pembayaran.
* Kelola Profil: Update informasi pribadi dan kata sandi.

---

## 🗃️ Struktur Database

### 1. users

| Field       | Tipe                         | Keterangan           |
| ----------- | ---------------------------- | -------------------- |
| id          | BIGINT                       | Primary Key          |
| name        | VARCHAR                      | Nama pengguna        |
| email       | VARCHAR                      | Email                |
| password    | VARCHAR                      | Terenkripsi          |
| role        | ENUM('admin','staff','user') | Role pengguna        |
| created\_at | TIMESTAMP                    | Timestamp dibuat     |
| updated\_at | TIMESTAMP                    | Timestamp diperbarui |

---

### 2. alat_camping

| Field       | Tipe      | Keterangan           |
| ----------- | --------- | -------------------- |
| id          | BIGINT    | Primary Key          |
| nama\_alat  | VARCHAR   | Nama alat            |
| deskripsi   | TEXT      | Deskripsi alat       |
| harga\_sewa | DECIMAL   | Harga sewa per hari  |
| stok        | INTEGER   | Stok tersedia        |
| created\_at | TIMESTAMP | Timestamp dibuat     |
| updated\_at | TIMESTAMP | Timestamp diperbarui |

---

### 3. penyewaan

| Field            | Tipe                                              | Keterangan             |
| ---------------- | ------------------------------------------------- | ---------------------- |
| id               | BIGINT                                            | Primary Key            |
| user\_id         | foreignId                                         | Foreign key ke users |
| tanggal\_sewa    | DATE                                              | Tanggal mulai sewa     |
| tanggal\_kembali | DATE                                              | Tanggal kembali alat   |
| status           | ENUM('pending','confirmed','returned','canceled') | Status penyewaan       |
| created\_at      | TIMESTAMP                                         | Timestamp dibuat       |
| updated\_at      | TIMESTAMP                                         | Timestamp diperbarui   |

---

### 4. alat_penyewaan (Pivot Table Many-to-Many)

| Field             | Tipe      | Keterangan                    |
| ----------------- | --------- | ----------------------------- |
| id                | BIGINT    | Primary Key                   |
| penyewaan\_id     | foreignId | Foreign key ke penyewaan    |
| alat\_camping\_id | foreignId | Foreign key ke alat_camping |
| jumlah            | INTEGER   | Jumlah alat disewa            |
| subtotal          | DECIMAL   | harga\_sewa × jumlah × hari   |
| created\_at       | TIMESTAMP | Timestamp dibuat              |
| updated\_at       | TIMESTAMP | Timestamp diperbarui          |

---

### 5. pembayaran

| Field              | Tipe                                 | Keterangan                 |
| ------------------ | ------------------------------------ | -------------------------- |
| id                 | BIGINT                               | Primary Key                |
| penyewaan\_id      | foreignId                            | Foreign key ke penyewaan |
| subtotal           | DECIMAL                              | Jumlah total yang dibayar  |
| payment\_date      | TIMESTAMP                            | Tanggal pembayaran         |
| metode\_pembayaran | ENUM('credit','transfer','cash')     | Metode pembayaran          |
| status             | ENUM('pending','completed','failed') | Status pembayaran          |
| created\_at        | TIMESTAMP                            | Timestamp dibuat           |
| updated\_at        | TIMESTAMP                            | Timestamp diperbarui       |

---

## 🔄 Relasi Antar Tabel

* **users ⇨ penyewaan**: One-to-Many
* **penyewaan ⇄ alat\_camping**: Many-to-Many melalui tabel alat_penyewaan
* **penyewaan ⇨ pembayaran**: One-to-One
 

---