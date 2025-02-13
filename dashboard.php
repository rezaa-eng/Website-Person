<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT nama, nik, tempat, jenis_kelamin, no_telpon, email, pendidikan, jurusan, nama_instansi, no_darurat, asal_sekolah, nama_sekolah, jurusan_sekolah, tahun_lulus, foto,created_at FROM inputs WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>












<!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
        <title>Halaman Beranda</title>
        <style>
            *  {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #ffffff;
                color: #333;
                padding-top: 80px; /* Memberi ruang untuk header yang tetap */
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
                  margin-top : -13px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
                position: fixed;
                top: 95px;
                left: 0;
                width: 100%;
                height : 52px;
                z-index: 999; 
            }

            nav ul {
                list-style-type: none;
                text-align: left;
                margin-left: 70px;
                margin-top: 1px;
                margin-bottom: 1px;
                
                
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
                margin-top: 5px;
                text-align: center;
            }

            .underline-title {
                font-weight: bold; 
                text-decoration: underline; 
                display: inline-block; 
            }

            .underline {
                display: inline-block;
                width: 100%;
                text-decoration: none; 
    }


            .container {

                margin-top : 30px;
                margin-left : 100px;
            }

            .main-content h2 {
            
                margin-top: 1px;
                font-size: 28px;
                color: #333;
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
                height: 30px;
                position: fixed;
                bottom: 0;
                width: 100%;
            }
        </style>
    </head>

    <body>
    
    <header>
        <img src="gambar/putih.png" alt="logo sims">
        <h1 style = "font-size: 30px; margin-top : 10px;">PT. sadasdIM</h1>
    </header>


        <nav>
        <ul style = "margin-right: 100px;">
            <li><a href="dashboard.php">Profil</a></li>
            <li><a href="absen_kehadiran.php">Absen Kehadiran</a></li>
            <li><a href="laporan_kehadiran.php">Laporan Kehadiran</a></li>
                 <li><a href="Album.php">Album</a></li>
            <li><a href="logout.php">logout</a></li>
      

            <li><a href="#">Kontak</a></li>
          
            </ul>
        </nav>

        <div class="main-content">
     

        <div class="container">
            <div class="row">   

                <div class="col-md-12">
                    <div class="card border-dark p-3">
                        
                        
                        <p style="border-bottom:2px solid black; text-align: left; color : black; font-size:15px; font-weight: bold;">Data Praktek Kerja Lapangan</p>

                        <div class="row">
                        <?php while ($row = $result->fetch_assoc()): ?>

                            <div class="col-md-2  align-items-center">
                                <img src="uploads/<?php echo htmlspecialchars($row['foto']) ?> " class="img-fluid rounded" 
                                    alt="Foto Prol" style="max-width: 150px; border: 2px solid black;">
                            </div>

                        
                            <div class="col-md-10">
                                <div class="text" style="text-align: left;font-weight : bold;">
                                    <p style= "margin-bottom : 5px; margin-left : 230px; font-weight: bold; border-bottom:2px solid black;  ">Identitas Diri</p>
                                    
                                    
                           

                                    <div class="row mb-1">
                                        <label for="nama" class="col-sm-3 col-form-label col-form-label-sm">Nama:</label>
                                        <div class="col-sm-9" >
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="nama" placeholder="<?php echo htmlspecialchars($row['nama']) ?> " >
                                        </div>
                                    </div>

                                    <div class="row mb-1" >
                                        <label for="nik" class="col-sm-3 col-form-label col-form-label-sm">NIK:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="nik" placeholder="<?php echo htmlspecialchars($row['nik']) ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="tempat" class="col-sm-3 col-form-label col-form-label-sm">Tempat Tanggal Lahir:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="tempat" placeholder="<?php echo htmlspecialchars($row['tempat']) ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="jenis_kelamin" class="col-sm-3 col-form-label col-form-label-sm">Jenis Kelamin:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="jenis_kelamin" placeholder="<?php echo htmlspecialchars($row['jenis_kelamin']) ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="no_telpon" class="col-sm-3 col-form-label col-form-label-sm">No Telepon:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="no_telpon" placeholder="<?php echo htmlspecialchars($row['no_telpon']) ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="email" class="col-sm-3 col-form-label col-form-label-sm">Email:</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control form-control-sm border-dark" 
                                                id="email" placeholder="<?php echo htmlspecialchars($row['email']) ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="pendidikan" class="col-sm-3 col-form-label col-form-label-sm">Pendidikan:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="pendidikan" placeholder="<?php echo htmlspecialchars($row['pendidikan']) ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="jurusan" class="col-sm-3 col-form-label col-form-label-sm">Jurusan:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="jurusan" placeholder="<?php echo htmlspecialchars($row['jurusan']) ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="nama_instansi" class="col-sm-3 col-form-label col-form-label-sm">Nama Instansi:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="nama_instansi" placeholder="<?php echo htmlspecialchars($row['nama_instansi']) ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label for="no_darurat" class="col-sm-3 col-form-label col-form-label-sm">No Darurat:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="no_darurat" placeholder="<?php echo htmlspecialchars($row['no_darurat']) ?>">
                                                <p style= "margin-bottom : 5px; margin-left : 0px; font-weight: bold; border-bottom:2px solid black; margin-top : 40px;  ">Identitas Asal Sekolah </p>
                                               
                                        </div>
                                        
                                    </div>
                                    <div class="row mb-1">
                                        <label for="no_darurat" class="col-sm-3 col-form-label col-form-label-sm">Asal Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="asal_sekolah" placeholder="<?php echo htmlspecialchars($row['asal_sekolah']) ?>">
                                        </div>
                                        </div>
                                    <div class="row mb-1">
                                        <label for="no_darurat" class="col-sm-3 col-form-label col-form-label-sm">Nama Asal Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="nama_sekolah" placeholder="<?php echo htmlspecialchars($row['nama_sekolah']) ?>">
                                        </div>
                                        </div>
                                    <div class="row mb-1">
                                        <label for="no_darurat" class="col-sm-3 col-form-label col-form-label-sm">Jurusan Asal Sekolah :</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="jurusan_sekolah" placeholder="<?php echo htmlspecialchars($row['jurusan_sekolah']) ?>">
                                        </div>
                                        </div>
                                    <div class="row mb-1">
                                        <label for="no_darurat" class="col-sm-3 col-form-label col-form-label-sm">Tahun Lulus</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm border-dark" 
                                                id="tahun_lulus" placeholder="<?php echo htmlspecialchars($row['tahun_lulus']) ?>">
                                        </div>
                                        </div>
                                        <?php endwhile; ?>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>

            
            <p class="mt-3 text-center" style="width: 100%;">
                ___________________________________________________________________________________________________________________________________________________
            </p>

        </div>
    </div>

        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    </body>

    </html>