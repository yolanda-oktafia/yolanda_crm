# yolanda_crm
# Simple CRM untuk PT. Smart
Proyek ini adalah sebuah aplikasi web CRM (Customer Relationship Management) sederhana yang saya buat untuk membantu divisi sales di PT. Smart — sebuah perusahaan penyedia layanan internet (ISP). Tujuan utamanya adalah menggantikan proses manual yang selama ini dilakukan oleh tim sales, terutama dalam mencatat data calon pelanggan, pelanggan aktif, produk layanan, hingga pengelolaan proyek penjualan.

# Persoalan
PT. Smart saat ini masih menjalankan sebagian besar proses bisnisnya secara semi-konvensional. Divisi sales, misalnya, masih mencatat data calon pelanggan (lead), produk, dan proses penjualan secara manual. Hal ini cukup menyulitkan dalam hal pencarian data, efisiensi waktu, hingga pelaporan. Sebagai solusi awal, saya membangun aplikasi CRM ini dengan fitur-fitur dasar yang bisa mulai digunakan untuk kebutuhan pencatatan dan pengelolaan data oleh tim sales.

# Teknologi yang Digunakan
1. Laravel 11
2. PostgreSQL untuk database
3. Blade sebagai template engine
4. PHP (dijalankan dengan [php artisan serve])

# Login Default
Untuk mengakses aplikasi, berikut data login yang bisa digunakan:

Email: yolanda@example.com

Password: password

# Fitur yang Sudah Selesai
Selama proses pengerjaan, saya berhasil menyelesaikan beberapa halaman utama yang dibutuhkan oleh divisi sales:
1. Halaman Login
Halaman ini digunakan sebagai pintu masuk ke sistem CRM.
2. Leads (Calon Pelanggan)
Berisi daftar calon pelanggan yang bisa diproses lebih lanjut menjadi pelanggan tetap.
3. Customers (Pelanggan Aktif)
Menampilkan data pelanggan yang sudah berlangganan layanan ISP, lengkap dengan layanan apa saja yang mereka gunakan.
4. Products (Layanan Internet)
Halaman untuk mencatat dan mengelola produk layanan internet yang ditawarkan oleh perusahaan.
5. Projects (Pengelolaan Lead)
Halaman ini berfungsi untuk memproses calon pelanggan (lead) menjadi proyek penjualan, termasuk pengajuan approval oleh manager (fitur dasar sudah tersedia).

# Waktu Pengerjaan
Aplikasi ini saya kerjakan sendiri dalam waktu dua hari, dengan rincian waktu sebagai berikut:

Tanggal 31 Juli 2025: Pukul 18.00 – 23.00 WIB

Tanggal 1 Agustus 2025: Pukul 14.00 – 17.00 WIB

# Cara Menjalankan Aplikasi
1. Pastikan sudah meng-install PHP dan Composer.
2. Clone repository atau salin file project ke lokal.
3. Jalankan perintah berikut:

bash
composer install
php artisan key:generate
php artisan migrate
php artisan serve
Buka browser dan akses http://127.0.0.1:8000

Untuk konfigurasi database, gunakan PostgreSQL dan sesuaikan data pada file .env.
Saya menyadari aplikasi ini masih jauh dari sempurna. Beberapa fitur seperti approval manager pada project masih dasar dan belum kompleks. Namun, saya harap pengerjaan saya pada tes ini menjadi pertimbangan Bapak/Ibu untuk menerima saya sebagai Internship di PT Dutakom Wibawa Putra.
Mohon untuk memberikan feedback terkait hasil pengerjaan saya untuk bahan evaluasi saya kedepannya.

Terima kasih.
– Yolanda Oktafia
