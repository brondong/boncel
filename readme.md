## Boncel

Boncel merupakan aplikasi sederhana yang berguna untuk memperpendek URL.

## Instalasi

1.	Pindahkan folder `boncel` ke dalam folder htdocs anda

		C:\xampp\htdocs\boncel

2.	Buka command prompt dan arahkan ke direktori `boncel`

		cd c:\xampp\htdocs\boncel

3.	Install library yang dibutuhkan menggunakan `Composer`

		composer install

4.	Buat database `boncel` pada MySQL menggunakan PHPMyAdmin atau Query

		CREATE DATABASE boncel;

5.	Import tabel

	1.	Menggunakan menu `Import` PHPMyAdmin
			
			Klik menu Import kemudian pilih file boncel.sql lalu klik Go

	2.	Menggunakan `perintah` artisan berikut pada command prompt

			php artisan migrate

6.	Unggah semua file yang sudah anda install ke hosting

>	Pastikan hanya file yang berada pada folder `public` saja yang anda unggah ke direktori public\_html pada hosting sedangkan folder lainnya anda unggah di luar folder public\_html.