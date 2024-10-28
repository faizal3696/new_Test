# Proyek Bracket dan Palindrome

## Deskripsi

Proyek ini berisi solusi untuk masalah pemrograman yang berkaitan dengan pemeriksaan keseimbangan bracket dan pencarian palindrome tertinggi. 

## Analisis Kompleksitas

### Kompleksitas Waktu: \( O(n) \)

Algoritma memproses setiap karakter dari string satu kali, sehingga kompleksitas waktu adalah \( O(n) \), di mana \( n \) adalah jumlah karakter dalam input. Operasi untuk setiap karakter—menambah dan menghapus dari stack—adalah operasi waktu tetap.

### Kompleksitas Ruang: \( O(n) \)

Dalam skenario terburuk, jika semua karakter adalah bracket pembuka, stack bisa menyimpan hingga \( n \) karakter, sehingga kompleksitas ruang adalah \( O(n) \). Jika string input berisi bracket yang seimbang, ukuran stack akan bervariasi tetapi tidak akan melebihi jumlah bracket pembuka pada waktu tertentu.

## Penggunaan

Untuk menggunakan aplikasi ini, Anda dapat mengakses endpoint API yang telah disediakan:

- **Endpoint untuk Memeriksa Keseimbangan Bracket**:
  - URL: `http://127.0.0.1:8000/balanced-brackets`
  - Metode: `POST`
  - Data: `{"input": "{ [ ( ) ] }"}`

- **Endpoint untuk Mencari Palindrome Tertinggi**:
  - URL: `http://127.0.0.1:8000/highest-palindrome`
  - Metode: `POST`
  - Data: `{"s": "3943", "k": 1}`

## Contoh Permintaan Menggunakan cURL

### Memeriksa Keseimbangan Bracket

```bash
curl -X POST http://127.0.0.1:8000/balanced-brackets -H "Content-Type: application/json" -d '{"input": "{ [ ( ) ] }"}'
