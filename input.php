<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Cek apakah user sudah menginput data
$query = "SELECT COUNT(*) as total FROM inputs WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['total'] > 0) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $tempat = $_POST['tempat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telpon = $_POST['no_telpon'];
    $email = $_POST['email'];
    $pendidikan = $_POST['pendidikan'];
    $jurusan = $_POST['jurusan'];
    $nama_instansi = $_POST['nama_instansi'];
    $no_darurat = $_POST['no_darurat'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $jurusan_sekolah = $_POST['jurusan_sekolah'];
    $tahun_lulus = $_POST['tahun_lulus'];

    
    $foto = $_FILES['foto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check === false) {
        die("File bukan gambar.");
    }

    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        die("Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.");
    }

    if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        die("Gagal mengupload file.");
    }

    // Simpan ke database
    $query = "INSERT INTO inputs (user_id, nama, nik, tempat, jenis_kelamin, no_telpon, email, pendidikan, jurusan, nama_instansi, no_darurat, asal_sekolah, nama_sekolah, jurusan_sekolah, tahun_lulus, foto, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issssssssssssssss", $user_id, $nama, $nik, $tempat, $jenis_kelamin, $no_telpon, $email, $pendidikan, $jurusan, $nama_instansi, $no_darurat, $asal_sekolah, $nama_sekolah, $jurusan_sekolah, $tahun_lulus, $foto, $created_at);
    $stmt->execute();

    header("Location: dashboard.php");
    exit();
}
?>





<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda</title>
    <style> 
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #333;
            padding-top: 80px; 
        }

        header {
            background-color: #4532b3;
            color: white;
            padding: 15px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: left;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000; 
        }

        header img {
            width: 50px;
            margin-right: 15px;
        }

        h1 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 40px;
            font-weight: bold;
        }

        nav {
            background-color: #ffffff;
            padding: 10px 0;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
            position: fixed;
            top: 78px; 
            left: 0;
            width: 100%;
            z-index: 999; 
        }

        nav ul {
            list-style-type: none;
            text-align: left;
            margin-left: 70px;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: rgb(0, 0, 0);
            text-decoration: none;
            font-size: 16px;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .main-content {
            padding: 40px 20px;
            margin-top: 1px;
            text-align: center;
        }

        .main-content h2 {
            margin-bottom: 20px;
            margin-top:20px;
            font-size: 28px;
            color: #333;
        }

        .main-content p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .profile {
            margin-top: 30px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            text-align: left;
            width: 80%;
            max-width: 800px;
        }

        .profile h3 {
            color: #4532b3;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            font-size: 16px;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #4532b3;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #3a27a1;
        }

        footer {
            background-color: #454545;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <header>
        <img src="logo4.jpg" alt="logo sims">
        <h1>sdfsdfdA</h1>
    </header>


    <nav>
        <ul>
            <li><a href="dashboard.php">Profil</a></li>
            <li><a href="absen_kehadiran.php">Absen Kehadiran</a></li>
            <li><a href="laporan_kehadiran.php">Laporan Kehadiran</a></li>
            <li><a href="logout.php">logout</a></li>
            <li><a href="#">Kontak</a></li>
        </ul>
    </nav>

 
    <div class="main-content">
        <h2 >Selamat datang di sdfsdf</h2> 
        <div class="profile" style="margin-top: 10px;">
    <h3>Form Data Praktek Kerja Lapangan</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama"> Nama:</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
        </div>
        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" id="nik" name="nik" placeholder="Masukkan nik" required>
        </div>
        <div class="form-group">
            <label for="tempat">Tempat Tanggal Lahir:</label>
            <input type="text" id="tempat" name="tempat" placeholder="Masukkan Tempay tanggal lahir" required>
        </div>
        <div class="form-group">
            <label for="divisi">Jenis Kelamin:</label>
            <input type="text" id="jenis_kelamin" name="jenis_kelamin" placeholder="masukkan jenis kelamin" required>
        </div>
        <div class="form-group"> 
            <label for="ttl">No Telepon:</label>
            <input type="text" id="no_telpon" name="no_telpon" placeholder="Masukkan No Telepon" required>
        </div>
        <div class="form-group">
            <label for="alamat">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Pendidikan Terakhir:</label>
            <input type="text" id="pendidikan" name="pendidikan" placeholder="Masukkan pendidikan terakhir" required>
        </div>
        <div class="form-group">
            <label for="no_telp">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" placeholder="Masukkan Jurusan" required>
        </div>
        <div class="form-group">
            <label for="email">Nama Instansi:</label>
            <input type="text" id="nama_instansi" name="nama_instansi" placeholder="Masukkan Nama Instansi" required>
        </div>
        
        <div class="form-group">
            <label for="pengalaman">No Darurat:</label>
            <input type="text" id="no_darurat" name="no_darurat" placeholder="Masukkan No Darurat" required>
        </div>
        <div class="form-group">
            <label for="pengalaman">Asal Sekolah :</label>
            <input type="text" id="asal_sekolah" name="asal_sekolah" placeholder="Masukkan Asal Sekolah" required>
        </div>
        <div class="form-group">
            <label for="pengalaman">Nama Asal Sekolah:</label>
            <input type="text" id="nama_sekolalh" name="nama_sekolah" placeholder="Masukkan Nama Sekolah" required>
        </div>
        <div class="form-group">
            <label for="pengalaman">Jurusan Sekolah :</label>
            <input type="text" id="jurusan_sekolah" name="jurusan_sekolah" placeholder="Masukkan Jurusan Sekolah" required>
        </div>
        <div class="form-group">
            <label for="pengalaman">Tahun Lulus</label>
            <input type="text" id="tahun_lulus" name="tahun_lulus" placeholder="Masukkan Tahun Lulus" required>
        </div>
        <div class="form-group">
            <label for="foto">Upload Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>
        </div>
        <button type="submit">Kirim</button>
    </form>
</div>


    <!-- Footer -->
    <footer>
        <p>&copy; PT SIMS JAYA KALTIM. Semua hak cipta dilindungi.</p>
    </footer>
</body>

</html>
