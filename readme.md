# Company Profile Web App - CodeIgniter 4

Aplikasi web Company Profile berbasis CodeIgniter 4. Project ini dirancang untuk menampilkan informasi perusahaan, layanan, portofolio, berita, staff, dan fitur manajemen user secara lengkap dan mudah digunakan.

## Kredit & Sumber Asli

Project ini merupakan hasil migrasi dan pengembangan dari project CodeIgniter 3 milik [Fajar Adi Setyawan](https://github.com/FajarAdiSetyawan/Company-Profile). Seluruh hak cipta dan kredit untuk versi awal (CI3) tetap milik pemilik aslinya.

## Instalasi
- `git clone `
- `composer install`
- Rename file `env` menjadi `.env`, kemudian lakukan penyesuaian konfigurasi Database di file `.env` tersebut
- Jalankan syntax `php spark migrate` untuk melakukan migrasi database
- Jalankan syntax `php spark db:seed AllSeed` untuk melakukan seeding data awal
- Jalankan syntax `php spark serve` untuk menjalankan aplikasi



## Screenshot

#### Front End (Home)
<div align="center">
    <img src="screenshoot/Company-Profile1.png"</img> 
</div>

#### Front End (Berita/Artikel)
<div align="center">
    <img src="screenshoot/Company-Profile2.png"</img> 
</div>

#### Back End (Login)
<div align="center">
    <img src="screenshoot/Company-Profile-›-Login.png"</img> 
</div>

#### Back End (Dashboard)
<div align="center">
    <img src="screenshoot/Company-Profile-›-Dashboard.png"</img> 
</div>

## Fitur Utama

- **Landing Page Dinamis**: Menampilkan informasi perusahaan, layanan, portofolio, dan berita terbaru.
- **Manajemen Berita**: CRUD berita dengan kategori.
- **Manajemen Layanan**: CRUD layanan yang ditawarkan perusahaan.
- **Manajemen Portofolio**: CRUD portofolio proyek/klien.
- **Manajemen Klien**: CRUD data klien.
- **Manajemen Staff**: CRUD data staff/karyawan.
- **Manajemen User**: Registrasi, login, profile, ganti password, dan hak akses.
- **Halaman Dashboard**: Statistik dan ringkasan data penting.
- **Autentikasi & Otorisasi**: Sistem login, logout, dan filter akses halaman.
- **Pengaturan Website**: Update profil perusahaan, kontak, dan sosial media.
- **404 Custom Page**: Halaman error khusus jika halaman tidak ditemukan.

## Struktur Folder Penting

- `app/Controllers/` : Controller utama (Home, Auth, Dashboard, Berita, Client, Portofolio, Staff, User, dll)
- `app/Models/` : Model untuk akses database (M_berita, M_client, M_portofolio, dll)
- `app/Views/` : Template tampilan frontend & backend
- `public/assets/` : Asset gambar, css, js
- `app/Helpers/` : Helper custom untuk berbagai kebutuhan
- `app/Config/Routes.php` : Konfigurasi routing aplikasi

## Kebutuhan Server

- PHP 8.1+
- Ekstensi PHP: intl, mbstring, json, curl, mysqlnd (jika pakai MySQL)
- Composer

## Kontribusi

Pull request dan issue sangat terbuka untuk pengembangan lebih lanjut.



# CodeIgniter 4 Docker Setup

## Cara Memperbaiki Error "You don't have permission to access this resource"

### Solusi 1: Rebuild Container dengan Dockerfile Baru

1. Stop dan hapus container yang lama:
```bash
docker-compose down
```

2. Rebuild image:
```bash
docker-compose build --no-cache
```

3. Start ulang:
```bash
docker-compose up -d
```

### Solusi 2: Copy file .htaccess ke folder public

Pastikan file `.htaccess` ada di folder `public/` project CodeIgniter kamu.

Jika belum ada, copy file `.htaccess` yang sudah saya buatkan ke folder `public/`

### Solusi 3: Fix Permission secara Manual

Jalankan command ini:
```bash
docker-compose exec app chown -R www-data:www-data /var/www/html
docker-compose exec app chmod -R 755 /var/www/html
docker-compose exec app chmod -R 777 /var/www/html/writable
```

### Solusi 4: Cek Apache Configuration

Masuk ke container dan cek config:
```bash
docker-compose exec app bash
```

Di dalam container, cek:
```bash
# Cek DocumentRoot
cat /etc/apache2/sites-enabled/000-default.conf

# Cek apakah mod_rewrite aktif
apache2ctl -M | grep rewrite

# Restart Apache
service apache2 restart
```

### Struktur Folder yang Benar

Pastikan struktur folder kamu seperti ini:
```
your-ci4-project/
├── app/
├── public/
│   ├── index.php
│   └── .htaccess  ← PENTING! File ini harus ada
├── writable/
├── Dockerfile
├── docker-compose.yml
├── .env
└── ...
```

### Testing

Setelah rebuild, coba akses:
- http://localhost:8080 (harus tampil welcome page CodeIgniter)

Jika masih error, cek logs:
```bash
docker-compose logs -f app
```

### Tips Debugging

1. Pastikan port 8080 tidak dipakai aplikasi lain
2. Pastikan Docker Desktop sudah running
3. Pastikan file `.env` sudah dikonfigurasi dengan benar
4. Cek apakah folder `writable/` memiliki permission yang benar

## Konfigurasi Database

Jangan lupa update file `.env`:
```
database.default.hostname = db
database.default.database = ci4_db
database.default.username = ci4_user
database.default.password = ci4_pass
database.default.DBDriver = MySQLi
database.default.port = 3306
```

## Akses Services

- **CodeIgniter App**: http://localhost:8080
- **PHPMyAdmin**: http://localhost:8081
  - Server: db
  - Username: ci4_user
  - Password: ci4_pass
- **MySQL**: localhost:3306

## Command Berguna

```bash
# Start containers
docker-compose up -d

# Stop containers
docker-compose down

# View logs
docker-compose logs -f

# Restart containers
docker-compose restart

# Run migrations
docker-compose exec app php spark migrate

# Access container shell
docker-compose exec app bash

# View running containers
docker-compose ps
```
