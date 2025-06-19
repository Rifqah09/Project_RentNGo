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

* Kelola pengguna (lihat, tambah, edit, hapus)
* Kelola alat camping (lihat, tambah, edit, hapus)
* Kelola penyewaan (konfirmasi, tandai selesai)
* Kelola pembayaran (konfirmasi status)

### 🛠️ Staff

* Lihat & edit alat camping
* Konfirmasi penyewaan
* Tandai penyewaan selesai
* Konfirmasi pembayaran


### 👤 User (Penyewa)

* Lihat dan sewa alat camping
* Lihat riwayat penyewaan sendiri
* Upload & lihat status pembayaran

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