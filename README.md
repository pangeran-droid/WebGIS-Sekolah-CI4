# 🗺️ Web GIS Sekolah - CodeIgniter 4

Proyek ini merupakan aplikasi Web GIS (Geographic Information System) sederhana untuk pendataan dan pemetaan lokasi sekolah, dibangun menggunakan framework **CodeIgniter 4** serta tampilan berbasis **AdminLTE**.

## ✨ Fitur Utama

- 🔐 Autentikasi Admin (Login & Logout)
- 📍 Pemetaan lokasi sekolah menggunakan Leaflet.js
- 🏫 Manajemen data sekolah (CRUD)
- 📊 Dashboard admin responsif dan modern
- 🧭 Penentuan koordinat lokasi secara interaktif di peta
- 📁 Upload gambar/foto sekolah

## 🛠️ Teknologi yang Digunakan

- [CodeIgniter 4](https://codeigniter.com/)
- [AdminLTE 3](https://adminlte.io/)
- [Leaflet.js](https://leafletjs.com/)
- MySQL/MariaDB
- Bootstrap, jQuery, FontAwesome

## 🚀 Cara Menjalankan Proyek

1. **Clone repositori**

   ```bash
   git clone https://github.com/pangeran-droid/WebGIS-Sekolah-CI4.git
   cd WebGIS-Sekolah-CI4
   ```

2. **Salin file `.env.example`**

   ```bash
   cp .env.example .env
   ```

3. **Edit konfigurasi database di `.env`**

   ```
   database.default.hostname = localhost
   database.default.database = nama_database
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   ```

4. **Jalankan server lokal**

   ```bash
   php spark serve
   ```

5. **Akses di browser**
   ```
   http://localhost:8080
   ```

## 🔑 Login Admin

Gunakan kredensial berikut untuk masuk sebagai admin:

- **Email**: `admin@gmail.com`
- **Password**: `admin123`

## 🧭 Struktur Proyek (Ringkasan)

```
/app
  ├── Controllers
  ├── Models
  ├── Views
  └── Config
/public
  └── AdminLTE/
/writable
.env
```

## 📌 Catatan

- Pastikan ekstensi PHP seperti `intl`, `curl`, `mbstring`, dan `openssl` aktif.
- Gunakan versi PHP minimal 7.4 atau lebih tinggi.
- Jika menggunakan XAMPP/Laragon, tempatkan folder proyek di `htdocs` atau `www`.

## 📄 Lisensi

Proyek ini dibuat untuk keperluan pembelajaran dan tugas kuliah. Bebas dimodifikasi sesuai kebutuhan.

---
