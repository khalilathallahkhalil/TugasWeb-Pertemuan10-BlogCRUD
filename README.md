# Tugas Web Pertemuan 10 - Blog CRUD (Create, Read, Update, Delete)

Proyek ini merupakan kelanjutan dari materi Pemrograman Web yang berfokus pada implementasi operasional dasar database yaitu **CRUD (Create, Read, Update, Delete)** pada aplikasi Blog berbasis **Laravel**. 

Aplikasi ini memungkinkan pengguna untuk membuat, membaca, mengedit, dan menghapus artikel/posting blog, serta dilengkapi dengan pengelolaan migrasi database, model Eloquent, controller, dan tampilan antarmuka interaktif menggunakan Blade.

---

## 🛠️ Teknologi & Tools

Proyek ini dibangun menggunakan teknologi dan pustaka berikut:

- **[PHP](https://www.php.net/)** (v8.1 atau lebih baru)
- **[Laravel Framework](https://laravel.com/)** (v10.x / v11.x)
- **[Composer](https://getcomposer.org/)** - Dependency Manager untuk PHP
- **[MySQL / MariaDB](https://www.mysql.com/)** - Database Relasional
- **[Eloquent ORM](https://laravel.com/docs/eloquent)** - Object-Relational Mapping bawaan Laravel
- **[Blade Engine](https://laravel.com/docs/blade)** - Template engine untuk tampilan antarmuka
- **[Bootstrap / Tailwind CSS](https://getbootstrap.com/)** - Styling UI dan formulir responsive

---

## ✨ Fitur Utama

- **Read (Tampilkan Blog)**: Menampilkan daftar postingan blog lengkap beserta detail setiap artikel.
- **Create (Tambah Blog)**: Form interaktif untuk menambah artikel blog baru ke dalam database.
- **Update (Edit Blog)**: Fitur pembaruan data artikel blog yang sudah ada.
- **Delete (Hapus Blog)**: Fitur konfirmasi dan penghapusan artikel dari database.
- **Form Validation**: Validasi input formulir (misal: judul dan konten wajib diisi).
- **Flash Messages**: Notifikasi respon berhasil/gagal saat melakukan operasi data.

---

## 📸 Screenshots

*(Unggah gambar screenshot aplikasi Anda ke folder `public/img/` atau repositori GitHub, lalu sesuaikan path gambar di bawah ini)*

| Daftar Blog (Index) | Tambah/Edit Blog (Form) |
| :---: | :---: |
| ![Screenshot Index](public/img/screenshot-index.png) | ![Screenshot Form](public/img/screenshot-form.png) |

---

## 📁 Struktur Folder Utama

Berikut adalah gambaran ringkas struktur folder utama pada proyek ini:

```text
TugasWeb-Pertemuan10-BlogCRUD/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── PostController.php   # Controller penanganan logika CRUD
│   │   └── Middleware/
│   └── Models/
│       └── Post.php                 # Model Eloquent untuk postingan blog
├── database/
│   ├── migrations/                  # Skema migrasi tabel posts
│   └── seeders/                     # Seeder data awal blog
├── public/                          # File publik (CSS, JS, Gambar)
├── resources/
│   └── views/
│       └── posts/                   # File Blade view (index, create, edit, show)
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── show.blade.php
├── routes/
│   └── web.php                      # Definisi rute CRUD (Route::resource)
├── .env.example                     # Template variabel lingkungan
├── composer.json                    # Dependensi PHP & package Laravel
└── README.md                        # Dokumentasi proyek
