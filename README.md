<p align="center">
  <b>RentNGo</b><br>
  <i>(Sistem Penyewaan Alat Camping)</i><br><br>
  <img src="images/LogoUnsulbar.png" width="150"><br><br>
  <b>Rifqah.S</b><br>
  <b>D0223314</b><br><br>
  Framework Web Based<br>
  2025
</p>

## 🎯 Role dan Fitur-fiturnya

### 🔐 Admin
- Manajemen Pengguna: Admin dapat melihat, menambah, mengedit, dan menghapus pengguna (admin, staff, dan user).
- Manajemen Alat Camping: Admin dapat menambah, mengedit, dan menghapus alat camping yang tersedia untuk disewa.
- Manajemen Penyewaan: Admin dapat melihat dan memverifikasi status penyewaan alat camping oleh pengguna.
- Manajemen Pembayaran: Admin dapat mengelola pembayaran yang terkait dengan penyewaan, seperti mengonfirmasi pembayaran yang sudah diterima.
- Laporan dan Statistik: Admin dapat melihat laporan penyewaan dan pendapatan dari sistem sewa.
- Pengaturan Umum: Admin dapat mengubah pengaturan sistem terkait dengan alat camping dan kebijakan sewa.

### Staff
- Manajemen Alat Camping: Staff dapat melihat dan mengelola alat camping yang tersedia (menambah stok, mengedit deskripsi dan harga).
- Manajemen Penyewaan: Staff dapat melihat penyewaan yang ada dan mengubah status penyewaan, misalnya menandai alat camping yang telah disewa atau dikembalikan.
- Penyewaan Baru: Staff dapat membuat atau mengedit penyewaan baru yang dilakukan oleh pengguna.
- Penyelesaian Pembayaran: Staff dapat melihat dan memproses pembayaran yang terkait dengan penyewaan.
- Laporan Penyewaan: Staff dapat mengakses laporan penyewaan untuk memantau alat camping yang sedang disewa.

### 👤 User (Penyewa)
- Menampilkan Alat Camping: User dapat melihat daftar alat camping yang tersedia beserta deskripsi dan harga sewa.
- Melakukan Penyewaan: User dapat menyewa alat camping dengan memilih alat, mengisi form penyewaan, dan menentukan tanggal sewa serta pengembalian.
- Melakukan Pembayaran: Setelah melakukan penyewaan, user dapat melakukan pembayaran melalui metode yang disediakan.
- Melihat Riwayat Penyewaan: User dapat melihat riwayat penyewaan alat camping yang pernah dilakukan, termasuk status penyewaan dan pembayaran.
- Mengelola Profil: User dapat memperbarui informasi profil mereka, seperti nama, email, dan password.
---

## 🗃️ Tabel-tabel Database

### 🧾 Tabel 1: `users`
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| id | BIGINT | Primary key, auto-increment |
| name | VARCHAR | Nama lengkap pengguna |
| email | VARCHAR | Alamat email pengguna |
| password | VARCHAR | Password terenkripsi |
| role | ENUM | 'admin' atau 'user' |
| created_at | TIMESTAMP | Timestamp dibuat |
| updated_at | TIMESTAMP | Timestamp diperbarui |

---

### 🧾 Tabel 2: `alat_camping`
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| id | BIGINT | Primary key, auto-increment |
| nama_alat | VARCHAR | Nama alat camping |
| deskripsi | TEXT | Deskripsi alat |
| harga_sewa | DECIMAL | Harga sewa per hari |
| stok | INTEGER | Jumlah stok tersedia |
| created_at | TIMESTAMP | Timestamp dibuat |
| updated_at | TIMESTAMP | Timestamp diperbarui |

---


### 🧾 Tabel 3: `penyewaan`
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| id | BIGINT | Primary key, auto-increment |
| user_id | foreignId  | Foreign key ke tabel users |
| alat_camping_id | foreignId | Foreign key ke tabel users |
| tanggal_sewa | DATE | Tanggal mulai sewa |
| tanggal_kembali | DATE | Tanggal kembali alat |
| status | ENUM | pending/confirmed/returned/canceled |
| created_at | TIMESTAMP | Timestamp dibuat |
| updated_at | TIMESTAMP | Timestamp diperbarui |

---

### 🧾 Tabel 4: `pembayaran`
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| id | BIGINT | Primary key, auto-increment |
| penyewaan_id | foreignId | Foreign key ke tabel transaksi |
| subtotal | DECIMAL | Harga total untuk alat ini |
| payment_date | Timestamp | tanggal pembayaran |
| metode pembayaran| enum | credit/transfer/cash |
| status | DECIMAL | pending/completed/failed |
| created_at | TIMESTAMP | Timestamp dibuat |
| updated_at | TIMESTAMP | Timestamp diperbarui |

---

## 🔄 Jenis Relasi dan Tabel yang Berelasi

- Relasi antara users dan penyewaan:
    Setiap pengguna (user) bisa melakukan banyak penyewaan alat camping, sehingga relasi ini One-to-Many (1 user dapat memiliki banyak rental).
    Relasi: users.id → penyewaan.user_id

- Relasi antara camping_gear dan rentals:
    Setiap alat camping dapat disewa banyak kali, sehingga relasi ini juga One-to-Many (1 alat_camping dapat memiliki banyak rental).
    Relasi: camping_gear.id → rentals.gear_id

- Relasi antara penyewaan dan pembayaran:
    Setiap penyewaan dapat memiliki satu pembayaran terkait, sehingga relasi ini One-to-One (1 penyewaan memiliki 1 pembayaran).
    Relasi: penyewaan.id → pembayaran.penyewaan_id
