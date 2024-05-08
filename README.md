# LP11DPBO2024C2

# Janji
Saya Ratu Syahirah Khairunnisa [2200978] 
mengerjakan Latihan Praktikum 11
dalam mata kuliah DPBO
untuk keberkahanNya maka saya tidak melakukan kecurangan 
seperti yang telah dispesifikasikan. 
Aamiin

# Desain Program
Program ini merupakan program MVP (Model, View, Presenter) yang bertemakan data pasien.

Database yang dirancang hanya terdiri dari 1 tabel/kelas, yaitu pasien. Pada tabel pasien terdapat NIK, Nama, Tempat, Tanggal Lahir, Gender, Email, Telp.

Arsitektur project tersebut terdiri dari beberapa folder yang di dalamnya ada file dan file di root. 

<img width="128" alt="image" src="https://github.com/queenxhr/LP11DPBO2024C2/assets/135084798/319e5efa-54ff-43c7-8729-0a8bccb3b8be">

- model :
  
  a. DB.class.php : untuk melakukan koneksi ke basis data dan menjalankan query SQL. Ini berfungsi sebagai lapisan antarmuka antara aplikasi dan basis data.
  
  b. Pasien.class.php : untuk memodelkan entitas pasien dan menyediakan metode untuk berinteraksi dengan data pasien, get set.
  
  c. TabelPasien.class.php : untuk memodelkan entitas pasien dan menyediakan metode query sql untuk proses CRUD data pasien.
  
  d. Template.class.php : untuk mengelola template HTML, seperti mengganti variabel placeholder dengan nilai yang sesuai.
  
- view :
  
  a. KontrakView.php : Interface atau kontrak yang mendefinisikan metode yang harus ada dalam setiap kelas tampilan (view) dalam aplikasi

  b. TampilPasien.php : implementasi dari KontrakView.php dan bertanggung jawab untuk proses CRUD data pasien ke pengguna dalam bentuk yang sesuai.
  
- presenter :
  
  a. KontrakPresenter.php : Interface atau kontrak yang mendefinisikan metode yang harus ada dalam setiap kelas presenter dalam aplikasi.

  b. ProsePasien.php : implementasi dari KontrakPresenter.php dan bertanggung jawab untuk mengatur logika bisnis terkait dengan entitas pasien, seperti pemrosesan data pasien, validasi, dan manipulasi data.

- templates :
  
  a. form.html : Template HTML untuk formulir tambah atau ubah data pasien.
  
  b. skin.html : Template HTML utama yang  digunakan untuk merangkai halaman web dengan elemen-elemen seperti header, footer, dan navigasi.
  
- index.php : untuk menginisialisasi aplikasi, melakukan routing, dan mengatur interaksi antara model, view, dan presenter.

# Penjelasan Alur
Proses CRUD (Create, Read, Update, Delete) :
Semua proses CRUD dijalankan menggunakan query sql dan metode get set yang terdapat pada file di folder model.
Tentu, saya akan menjelaskan proses CRUD (Create, Read, Update, Delete) dalam konteks aplikasi yang menggunakan struktur model-view-presenter (MVP) seperti yang telah dijelaskan sebelumnya:

### 1. Create (Tambah Data):
- Pengguna mengakses halaman tambah data pasien.
- TampilPasien.php (view) menampilkan formulir tambah data pasien.
- Pengguna mengisi formulir dan mengirimkan data.
- TampilPasien.php (view) menerima data yang dikirimkan.
- TampilPasien.php (presenter) memproses data yang diterima dan memanggil metode `tambahDataPasien()` dari ProsesPasien.php (presenter).
- ProsesPasien.php (presenter) memanggil metode `add()` dari TabelPasien.class.php (model) untuk menambahkan data pasien baru ke basis data.
- TabelPasien.class.php (model) mengeksekusi query SQL untuk menyimpan data pasien baru ke dalam tabel pasien di basis data.

### 2. Read (Tampilkan Data):
- Pengguna mengakses halaman tampil data pasien.
- TampilPasien.php (view) memanggil metode `tampil()` dari ProsesPasien.php (presenter).
- ProsesPasien.php (presenter) memproses data pasien dengan memanggil metode `prosesDataPasien()` dari TabelPasien.class.php (model).
- TabelPasien.class.php (model) mengeksekusi query SQL untuk mengambil data pasien dari tabel pasien di basis data.
- Data pasien yang diambil ditampilkan oleh TampilPasien.php (view).

### 3. Update (Ubah Data):
- Pengguna mengakses halaman ubah data pasien.
- TampilPasien.php (view) menampilkan formulir ubah data pasien yang sudah diisi dengan data pasien yang akan diubah.
- Pengguna mengubah data pada formulir dan mengirimkan perubahan.
- TampilPasien.php (view) menerima data yang dikirimkan.
- TampilPasien.php (presenter) memproses data yang diterima dan memanggil metode `editDataPasien()` dari ProsesPasien.php (presenter).
- ProsesPasien.php (presenter) memanggil metode `edit()` dari TabelPasien.class.php (model) untuk mengubah data pasien di basis data sesuai dengan perubahan yang diberikan.

### 4. Delete (Hapus Data):
- Pengguna memilih opsi hapus pada halaman tampil data pasien.
- TampilPasien.php (view) menerima permintaan untuk menghapus data pasien dan meneruskannya ke presenter.
- TampilPasien.php (presenter) memproses permintaan dan memanggil metode `deleteDataPasien()` dari ProsesPasien.php (presenter).
- ProsesPasien.php (presenter) memanggil metode `delete()` dari TabelPasien.class.php (model) untuk menghapus data pasien dari basis data.

# Screenshots
## 1. Create
   <img width="959" alt="tambah" src="https://github.com/queenxhr/LP11DPBO2024C2/assets/135084798/5dd6f6b1-71b5-44bc-b3b9-e5650d9c8afa">

## 2. Read
   <img width="959" alt="read_tampil" src="https://github.com/queenxhr/LP11DPBO2024C2/assets/135084798/cb99340e-6dca-4dd0-9114-741f20f72184">
   
## 3. Update
   <img width="959" alt="update_ubah" src="https://github.com/queenxhr/LP11DPBO2024C2/assets/135084798/95b3210b-89a7-4c49-91cd-1d8f86a33695">

# Video Preview
https://github.com/queenxhr/LP11DPBO2024C2/assets/135084798/1b72ba6e-3a2c-4c33-9e6f-f608daf11247

