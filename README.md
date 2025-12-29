# Toko Jatijajar
Aplikasi manajemen stok barang sederhana berbasis PHP Native dan Tailwind CSS.

## Fitur Singkat
* **Login Admin**: Autentikasi aman.
* **CRUD Produk**: Tambah, Edit, Hapus data barang & gambar.
* **Sorting**: Filter barang berdasarkan nama atau harga.
* **UI Modern**: Tampilan responsif dengan Tailwind CSS.

## Cara Instalasi
1. **Clone Repo**: Simpan folder ini di `htdocs` (XAMPP) atau `www` (Laragon).
2. **Database**:
   * Buat database baru: `toko_jatijajar`.
   * Buat tabel `users` (`id`, `username`, `password`) dan `barang` (`id`, `nama_barang`, `harga`, `kategori`, `gambar`).
3. **Setup Admin**:
   * Buka browser: `http://localhost/toko-jatijajar/register_admin.php` untuk membuat akun.
   * Pastikan folder `uploads/` sudah ada.
4. **Login**:
   * Buka `login.php`.
   * Akun default: User: `admin`, Pass: `admin123`.

## Tech Stack
* PHP (Native)
* MySQL
* Tailwind CSS (CDN)
