<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
# Sistem Form Generator Pertanahan Gorontalo

Aplikasi web pembuatan dan pengelolaan form administrasi untuk instansi pertanahan di Gorontalo berbasis Laravel 11.

## Tentang Aplikasi

Aplikasi ini dirancang untuk memudahkan proses administrasi kantor di instansi pertanahan Gorontalo, dengan fokus utama:
- Pembuatan dan generate form administrasi otomatis
- Konversi data ke format Excel 
- Repositori dokumen digital (hasil scan)
- Pengelolaan administrasi perjalanan dinas
- Pengarsipan dokumen digital

## Teknologi yang Digunakan

- **Framework:** Laravel 11
- **Database:** MySQL
- **Frontend:** Blade, Vite
- **Export Data:** Laravel Excel
- **Authentication:** Laravel Fortify/Breeze
- **File Storage:** Laravel Storage

## Fitur Utama

- 📝 **Form Generator**
  - Pembuatan form otomatis untuk berbagai kebutuhan administrasi
  - Template yang dapat disesuaikan
  - Form untuk perjalanan dinas, pengeluaran, dan administrasi lainnya

- 📊 **Export Data**
  - Konversi data form ke format Excel
  - Laporan yang dapat diunduh
  - Filter data sebelum export

- 🗄️ **Repositori Dokumen**
  - Penyimpanan dokumen hasil scan
  - Organisasi file berdasarkan kategori
  - Pencarian dokumen cepat

- 📱 **Dashboard Admin**
  - Monitoring penggunaan form
  - Statistik penggunaan aplikasi
  - Manajemen pengguna

- 🚗 **Modul Perjalanan Dinas**
  - Input data perjalanan dinas
  - Generate surat tugas
  - Rekap biaya perjalanan
  - Arsip berkas perjalanan dinas

## Instalasi

### Prasyarat
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL Database

### Langkah Instalasi

1. Clone repository ini
   ```bash
   git clone https://github.com/andimohsoreang/Pertanahan.git
   cd Pertanahan
   ```

2. Install dependensi PHP
   ```bash
   composer install
   ```

3. Install dependensi JavaScript
   ```bash
   npm install && npm run dev
   ```

4. Siapkan file environment
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Konfigurasi database di file .env
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=pertanahan
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Jalankan migrasi dan seeder
   ```bash
   php artisan migrate --seed
   ```

7. Siapkan storage link untuk penyimpanan file
   ```bash
   php artisan storage:link
   ```

8. Jalankan aplikasi
   ```bash
   php artisan serve
   ```

## Penggunaan

1. Akses aplikasi di `http://localhost:8000`
2. Login dengan kredensial admin:
   - Email: admin@example.com
   - Password: password
3. Pilih modul yang ingin digunakan dari sidebar
4. Untuk membuat form baru, pilih jenis form dan isi data yang diperlukan
5. Untuk mengekspor data ke Excel, gunakan tombol "Export" di halaman terkait
6. Untuk mengunggah dokumen, gunakan modul Repositori Dokumen

## Struktur Database

Aplikasi ini menggunakan struktur database relasional dengan tabel-tabel utama:
- `users` - Data pengguna sistem
- `form_templates` - Template form yang tersedia
- `form_data` - Data yang diinput melalui form
- `business_trips` - Data perjalanan dinas
- `documents` - Dokumen yang diunggah ke sistem
- `trip_expenses` - Rincian biaya perjalanan dinas

## Kontribusi

Jika Anda ingin berkontribusi pada project ini, silakan ikuti langkah-langkah berikut:
1. Fork repository
2. Buat branch fitur baru (`git checkout -b feature/fitur-baru`)
3. Commit perubahan Anda (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin feature/fitur-baru`)
5. Buat Pull Request

## Lisensi

Project ini dilisensikan di bawah [MIT License](LICENSE)

## Kontak

Andi Mohsoreang - [GitHub](https://github.com/andimohsoreang)

---

Dibuat dengan ❤️ untuk Instansi Pertanahan Gorontalo
