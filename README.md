# 🏕️ RentNGo - Sistem Penyewaan Alat Camping

## 👨‍💻 Nama  
**Rifqah. s**

## 🆔 NIM  
**D0223314**

## 📚 Mata Kuliah  
**Pemrosesan Data Besar & Data Mining**

## 📅 Tahun  
**2025**

---

## 🎯 Role dan Fitur-fiturnya

### 🔐 Admin
- Manajemen data alat camping (CRUD)
- Manajemen kategori alat
- Manajemen pengguna (admin & user)
- Verifikasi transaksi penyewaan
- Melihat laporan penyewaan

### 👤 User (Penyewa)
- Registrasi dan login
- Melihat daftar alat camping yang tersedia
- Melakukan penyewaan alat
- Melihat riwayat penyewaan
- Mengelola profil

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
| kategori_id | BIGINT | Foreign key ke tabel kategori |
| deskripsi | TEXT | Deskripsi alat |
| harga_sewa | DECIMAL | Harga sewa per hari |
| stok | INTEGER | Jumlah stok tersedia |
| created_at | TIMESTAMP | Timestamp dibuat |
| updated_at | TIMESTAMP | Timestamp diperbarui |

---

### 🧾 Tabel 3: `kategori_alat`
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| id | BIGINT | Primary key, auto-increment |
| nama_kategori | VARCHAR | Nama kategori alat |
| created_at | TIMESTAMP | Timestamp dibuat |
| updated_at | TIMESTAMP | Timestamp diperbarui |

---

### 🧾 Tabel 4: `transaksi`
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| id | BIGINT | Primary key, auto-increment |
| user_id | BIGINT | Foreign key ke tabel users |
| total_harga | DECIMAL | Total harga penyewaan |
| status | ENUM | pending/diproses/selesai |
| tanggal_sewa | DATE | Tanggal mulai sewa |
| tanggal_kembali | DATE | Tanggal kembali alat |
| created_at | TIMESTAMP | Timestamp dibuat |
| updated_at | TIMESTAMP | Timestamp diperbarui |

---

### 🧾 Tabel 5: `detail_transaksi`
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| id | BIGINT | Primary key, auto-increment |
| transaksi_id | BIGINT | Foreign key ke tabel transaksi |
| alat_id | BIGINT | Foreign key ke tabel alat |
| jumlah | INTEGER | Jumlah alat yang disewa |
| subtotal | DECIMAL | Harga total untuk alat ini |
| created_at | TIMESTAMP | Timestamp dibuat |
| updated_at | TIMESTAMP | Timestamp diperbarui |

---

## 🔄 Jenis Relasi dan Tabel yang Berelasi

- `users` 🔁 `transaksi`: **One to Many**  
  Satu pengguna bisa memiliki banyak transaksi.

- `kategori_alat` 🔁 `alat_camping`: **One to Many**  
  Satu kategori bisa memiliki banyak alat.

- `alat_camping` 🔁 `detail_transaksi`: **One to Many**  
  Satu alat bisa muncul di banyak detail transaksi.

- `transaksi` 🔁 `detail_transaksi`: **One to Many**  
  Satu transaksi bisa memiliki banyak detail transaksi.
