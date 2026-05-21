# Aplikasi MVC Mahasiswa

## Kelompok 8

| Nama | NPM | Peran |
|------|------|------|
| Muhammad Hafidz Dharmawan | 2310010147 | Back-End Developer |
| Muhammad Hendryan Raffi | 2310010571 | Front-End Developer |
| Mutmainatul Zulfa | 2310010387 | Documentation & Deployment Officer |

---

## Arsitektur MVC

Project ini menggunakan konsep MVC (Model View Controller):

- Model → mengelola database dan query
- View → menampilkan tampilan/interface
- Controller → penghubung antara model dan view

---

## Fitur Aplikasi

- CRUD Mahasiswa
- Search Data Mahasiswa
- Filter Jurusan
- Export CSV
- Export PDF
- Flash Message
- Layout Bootstrap 5 Responsive
- Routing MVC Sederhana
- Sistem Login Multi Role (Admin & User)
- Session Authentication
- Chatbot AI Gemini
---

## Teknologi yang Digunakan

- PHP Native
- MySQL
- Bootstrap 5
- PDO
- Dompdf
- XAMPP

---

---

## Sistem Login & Hak Akses

Aplikasi memiliki sistem autentikasi menggunakan session PHP dengan dua role:

### Admin
Admin memiliki akses penuh:
- Melihat data mahasiswa
- Menambah data mahasiswa
- Mengedit data mahasiswa
- Menghapus data mahasiswa
- Export CSV & PDF
- Mengakses Chatbot AI

### User
User hanya dapat:
- Melihat data mahasiswa
- Melakukan pencarian & filter
- Export CSV & PDF
- Mengakses Chatbot AI

Sistem login menggunakan:
- Session PHP
- Password Hashing (`password_hash`)
- Validasi Login (`password_verify`)

---

## Fitur Chatbot AI Gemini

Project ini juga dilengkapi fitur Chatbot AI menggunakan Google Gemini API.

Fitur chatbot:
- Tanya jawab seputar perkuliahan
- Penjelasan materi pemrograman
- Bantuan konsep MVC dan CRUD
- AI Assistant sederhana berbasis web

Teknologi yang digunakan:
- Google Gemini API
- Fetch API JavaScript
- Bootstrap Chat Interface

Endpoint model AI:
- Gemini 2.5 Flash

Akses chatbot:

```text
http://localhost/mvc_mahasiswa_kel8/public/chatbot
```

## Cara Menjalankan Project

## Cara Menjalankan Project

1. Clone repository GitHub
2. Simpan project di folder:
   C:/xampp/htdocs/

3. Jalankan Apache dan MySQL di XAMPP

4. Import database:
   uniska_latihan_mvc_2026.sql

5. Akses project:
   http://localhost/mvc_mahasiswa_kel8/public

---

## Screenshot Tiap Sesi

### Sesi 1
![Sesi 1](screenshots/sesi%201/sesi%201.jpeg)

### Sesi 2
![Sesi 2](screenshots/sesi%202/Screenshot%202026-05-10%20230056.png)
![Sesi 2](screenshots/sesi%202/Screenshot%202026-05-10%20230250.png)
![Sesi 2](screenshots/sesi%202/Screenshot%202026-05-10%20230308.png)

### Sesi 3
![Sesi 3](screenshots/sesi%203/Screenshot%202026-05-11%20014702.png)

### Sesi 4
![Sesi 4](screenshots/sesi%204/Screenshot%202026-05-11%20020441.png)
![Sesi 4](screenshots/sesi%204/Screenshot%202026-05-11%20020729.png)

### Sesi 5
![Sesi 5](screenshots/sesi%205/Screenshot%202026-05-11%20023945.png)
![Sesi 5](screenshots/sesi%205/Screenshot%202026-05-11%20024028.png)
![Sesi 5](screenshots/sesi%205/Screenshot%202026-05-11%20024042.png)

### Sesi 6
![Sesi 6](screenshots/sesi%206/Screenshot%202026-05-11%20031129.png)
![Sesi 6](screenshots/sesi%206/Screenshot%202026-05-11%20031141.png)

### Sesi 7
![Sesi 7](screenshots/sesi%207/Screenshot%202026-05-21%20105033.png)
![Sesi 7](screenshots/sesi%207/Screenshot%202026-05-21%20105100.png)

### Sesi 8
![Sesi 8](screenshots/sesi%208/Screenshot%202026-05-21%20115449.png)
![Sesi 8](screenshots/sesi%208/Screenshot%202026-05-21%20115526.png)
![Sesi 8    ](screenshots/sesi%208/Screenshot%202026-05-21%20120255.png)

### Tugas Akhir
![Tugas Akhir](screenshots/Tugas%20Akhir/Screenshot%202026-05-21%20124234.png)
![Tugas Akhir](screenshots/Tugas%20Akhir/Screenshot%202026-05-21%20124248.png)
![Tugas Akhir](screenshots/Tugas%20Akhir/Screenshot%202026-05-21%20124437.png)
---

## Repository GitHub
https://github.com/seolars/mvc_mahasiswa_kel8
