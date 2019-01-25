# Project Artificial Intelligence : Sistem Pakar Diagnosa Penyakit Tanaman

Di Indonesia tanaman bawang dan cabai adalah salah satu jenis tanaman hortikultura yang secara luas dibudidayakan. Akan tetapi, jika dilihat dari hasil panen yang dihasilkan masih belum memuaskan. Hal ini disebabkan oleh berbagai faktor, diantaranya yaitu teknik budidaya, kondisi lingkungan dan hama penyakit. Dari ketiga faktor, faktor yang paling bermasalah sampai saat ini adalah hama dan penyakit.Masalahnya sering ditemui bahwa petani yang minim akan pengetahuaan mengenai penyakit yang menyerang tanaman mereka, ditambah lagi keterbatasan seorang ahli kadang-kadang menjadi kendala bagi petani yang akan melakukan konsultasi untuk menyelesaikan masalah dan mendapatkan solusi terbaik. Diharapka sistem pakar simulasi diagnosa hama dan penyakit tanaman bawang dan cabai dibuat bertujuan untuk sebagai sarana konsultasi, sarana belajar di suatu instansi dan dapat digunakan sebagai alat yang digunakan untuk mendiagnosa dan mensosialisasikan jenis hama dan penyakit.

## Sebelum Memulai

- Lakukan git clone pada repository ini jika melakukan clone pada git.
- Jalankan perintah composer install untuk menginstall aplikasi ini.
- Lakukan konfigurasi aplikasi seperti file yang terdapat pada .env.example dan simpan dengan nama file .env
- Jalankan perintah composer dump-autoload untuk melakukan indexing file.
- Jalankan perintah php artisan migrate --seed untuk membuat tabel baru pada database yang telah anda masukkan pada konfigurasi file .env
- Import db_rev1.sql untuk melihat contoh data yang sudah disediakan.
- Untuk mencoba menggunakan aplikasi ini dengan menggunakan webserver yang disediakan laravel ketik php artisan serve pada command line dan alamat url akan ditampilkan pada command line.
- Untuk mencoba menggunakan aplikasi ini dengan menggunakan webserver yang anda miliki, ketik http://localhost/public atau http://localhost/nama_project/public.
