# REST API V3
## Bahan
- XAMPP V5 keatas [Disini](https://www.apachefriends.org/download.html) 
- Codeigniter V3 [Disini](https://codeigniter.com/en/download)
- Text Editor sublime [Disini](https://www.sublimetext.com/3)


## Cara Menggunakan
  1. Jalankan XAMPP
  2. Clone Repository Ini ke dalam htdocs anda
  3. Trus buka folder praktikum4 di text editor
  4. Masukan http://localhost/praktikum4/ pada web address browser anda, jika muncul form REST server test maka instalasi berhasil.
  5. Buat database **kontak**, lalu import `kontak.sql`
  6. configurasi dataabase di CInya, buka `application/config/database.php` samakan seperti ini :
 ``` php
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'kontak',
```
  ## Cara Mencobanya
  1. Anda bisa menggunakan Aplikasi [Postman](https://www.postman.com/downloads/) untuk melakukan GET, POST, PUT, DELETE, dan OPTION
  2. Buka Postman, tambahkan tab baru dengan menekan tombol + dan berinama mencoba
  3. Masukkan link berikut http://localhost/praktikum4/index.php/kontak dan silahkan anda coba
  4. Jika kurang jelas bisa mengikuti tutorial ini http://mivtahurrohman.blogspot.com/2018/10/tutorial-melakukan-request-rest.html
  
    
