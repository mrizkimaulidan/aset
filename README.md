# ASET

Aplikasi inventaris aset dibuat dengan Framework Laravel 8. Aplikasi ini cocok untuk digunakan untuk disekolah atau umum. Aplikasi ini memiliki 3 role, yaitu _Administrator_, _Staff TU_, dan _Kepala Sekolah_. Setiap role memiliki menu yang berbeda sesuai dengan jabatannya. <br>

Beberapa CRUD menggunakan modal dan AJAX untuk pengambilan data agar mengurangi penggunaan pindah halaman.

### Prasyarat

Berikut beberapa hal yang perlu diinstal terlebih dahulu:

-   Composer (https://getcomposer.org/)
-   PHP 7.4.x
-   MySQL 14.5.x
-   XAMPP

Jika Anda menggunakan XAMPP, untuk PHP dan MySQL sudah menjadi 1 (bundle) didalam aplikasi XAMPP.

### Fitur

-   CRUD Data Pengguna
-   CRUD Data Jenis Aset
-   CRUD Data Ruangan
-   CRUD Data Aset
-   Laporan

### Preview Gambar

_Tampilan Login_
![Image 1](https://i.imgur.com/FtYenbR.png)

_Dashboard_
![Image 2](https://i.imgur.com/2wbKkr9.png)

_Daftar Pengguna_
![Image 3](https://i.imgur.com/9C2tMli.png)

_Daftar Jenis Aset_
![Image 4](https://i.imgur.com/dUZmPFz.png)

_Daftar Ruangan_
![Image 5](https://i.imgur.com/YIV9OWQ.png)

_Daftar Aset_
![Image 5](https://i.imgur.com/SDHiXuU.png)

_Halaman Laporan_
![Image 5](https://i.imgur.com/HZfnhEA.png)

_Halaman Print_
![Image 5](https://i.imgur.com/VfFhUXZ.png)

### Langkah-langkah instalasi

-   Clone repository ini

HTTPS

```
https://github.com/mrizkimaulidan/aset.git
```

SSH

```
git@github.com:mrizkimaulidan/aset.git
```

-   Install seluruh packages yang dibutuhkan

```
composer install
```

-   Siapkan database dan atur file .env sesuai dengan konfigurasi Anda
-   Ubah value APP_NAME= pada file .env menjadi nama aplikasi yang anda inginkan
-   Jika sudah, migrate seluruh migrasi dan seeding data

```
php artisan migrate --seed
```

-   Jalankan local server

```
php artisan serve
```

-   Ketik perintah dibawah ini untuk membuat cache baru dari beberapa konfigurasi yang telah diubah

```
php artisan optimize
```

---

-   User default aplikasi untuk login

##### Administrator

```
Email       : admin@mail.com
Password    : secret
```

##### Staff TU

```
Email       : stafftu@mail.com
Password    : secret
```

##### Kepala Sekolah

```
Email       : kepalasekolah@mail.com
Password    : secret
```

### Dibuat dengan

-   [Laravel](https://laravel.com) - Web Framework
