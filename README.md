## Tentang Project

Website yang saya buat adalah website untuk manajemen film yang sederhana. Admin bisa melakukan CRUD pada data film dan genrenya dimana 2 data itu sudah berelasi. Jadi, sebelum menginputkan film admin harus menginputkan genrenya terlebih dahulu jika genre untuk film yang akan diinputkan belum ada didalam database. Website ini dilengkapi dengan sistem login menggunakan middleware dari laravel sehingga ketika user belum melakukan login, user tidak bisa mengakses dashboard. Selain itu website ini juga menyediakan api. Api bisa diakses melalui beberapa cara. disini, saya menggunakan postman.

## Desain Database

<img src="/public/dokumentasi/erd.png" width="400">

## Screenshoot Aplikasi

<img src="/public/dokumentasi/Screenshot1.png" width="400">
<img src="/public/dokumentasi/Screenshot2.png" width="400">

### Dependency

-   **Composer 2.6.5**
-   **Laravel 8**
-   **Bootstrap 5.3**
-   **10.4.28-MariaDB**

## Informasi Cara Menjalankan

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

1. **Install Composer**
2. **Clone project dari github**

```
git clone https://github.com/Pacifista00/challenge_backend.git
```

3. **Copy file .env.example ke .env**

```
cp .env.example .env
```

4. **Generate key**

```
php artisan key:generate
```

5. **Jalankan project laravel**

```
php artisan serve
```
