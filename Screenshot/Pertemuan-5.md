# Dokumentasi Pertemuan 5 - Laravel Authorization (Role, Gate, Policy)

Pada pertemuan 5 ini, diimplementasikan mekanisme otorisasi yang memisahkan hak akses antara **Admin** dengan **User Biasa**. Fitur ini memanfaatkan fungsionalitas mendarah daging dari Laravel berupa *Gate* dan *Policy*.

Berikut adalah hasil cuplikan (*screenshot*) implementasi dari hasil penugasan:

## 1. Product List (Daftar Produk)
Pada halaman daftar produk, pengguna dengan peran **Admin** dapat melihat seluruh tombol, termasuk "Add Product" dan "Export", serta "Edit / Delete" di semua produk.
Sementara itu, **User Biasa** tidak dapat melihat kotak navigasi tambahan untuk Export, dan aksi Edit/Delete dibatasi hanya untuk produk yang dia miliki.

- **Tampilan Admin:**
  ![Product List Admin](ss5/product%20list%20admin.png)

- **Tampilan User Biasa:**
  ![Product List User](ss5/product%20list%20user.png)

---

## 2. Proses Tambah Produk (Add Product)
Semua user terdaftar berhak mengakses halaman "Add Product". Otorisasi dirancang cerdas di mana form memilih "Owner" (*Dropdown*) otomatis disembunyikan untuk User Biasa dan sistem akan serta-merta mengaitkan produk yang dibuat menjadi kepunyaan user yang *login* tersebut.

- **Form Tambah Produk:**
  ![Add Product](ss5/add%20produk.png)

---

## 3. Product Details (Rincian Produk)
Pemisahan hak akses (*Policy*) diimplementasikan juga di dalam bagian halaman "Details" atau "View".
Jika **Owner Asli (Pemilik)** membuka halaman detail produk miliknya, tombol *Edit* dan *Delete* akan terlihat. 
Namun apabila suatu produk dilihat oleh User lain (Non-Owner), maka tidak akan ada tombol yang tersaji, karena mereka tak berhak mengulak-alik data tersebut.

- **Dilihat Oleh Si Pemilik Asli (Terdapat Tombol Action):**
  ![Produk Detail Owner](ss5/produk%20detail%20owner.png)

- **Dilihat Oleh User Lain (Tidak Tersedia Tombol Karena Akses Dibatasi):**
  ![Product Detail User](ss5/product%20detail%20user.png)

---

## 4. Edit dan Delete Produk
Fitur edit dan delete ini dikunci menggunakan `ProductPolicy`. Segala hal percobaan mem-bypass (membuka jalur url /edit secara paksa untuk data orang lain) akan menerima layar error 403 (Status Akses Dilarang). Hanya Admin dan Pemilik yang bisa membuka halaman ini.

- **Tampilan Form Update/Edit:**
  ![Edit Product](ss5/edit%20product.png)

- **Sistem Konfirmasi / Dialog Menghapus (Delete):**
  ![Delete Product](ss5/detele%20product.png)
