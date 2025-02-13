<?php
include 'db.php'; 


$query = "SELECT * FROM absensi ORDER BY jam_masuk DESC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
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

       
    </style>
</head>

<body>
  
    <header>
        <img src="gambar/putih.png" alt="logo sims">
        <h1 style = "font-size: 30px; margin-top : 10px;">PT. SIasdM</h1>
    </header>

 
    <nav>
        <ul>
        <li><a href="dashboard.php">Profil</a></li>
            <li><a href="absen_kehadiran.php">Absen Kehadiran</a></li>
            <li><a href="laporan_kehadiran.php">Laporan Kehadiran</a></li>
            <li><a href="Album.php">Album</a></li>
            <li><a href="logout.php">logout</a></li>
      

            <li><a href="#">Kontak</a></li>
          
        </ul>
    </nav>


<div class="main-content">
<figure class="text-center" style = "margin-top : 80px;   margin-left : 20px; font-weight: bold; font-size : 20px;">
  <blockquote class="blockquote">
    <p>Laporan Kehadiran Peserta Praktek Kerja Lapangan</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    Praktek Kerja <cite title="Source Title">Lapangan</cite>
  </figcaption>
</figure>

        <div class="container mt-5">
    <table class="table table-bordered table-striped mt-3">
        <thead class=" text-center" style = "background-color :#4532b3; color : white;">
            <tr>
            
                <th>Nama</th>
                <th>Departemen</th>
                <th>Jam Masuk</th>
                <th>Tanggal</th>

                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
           
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
               
                
                echo "<td class='text-center'>{$row['nama']}</td>";
                echo "<td  class='text-center'>{$row['dept']}</td>";
                echo "<td class='text-center'>{$row['jam_masuk']}</td>";
                echo "<td class='text-center'>{$row['tanggal']}</td>";
                echo "<td  class='text-center'>{$row['keterangan']}</td>";
                echo "</tr>";
                
            }
            ?>
        </tbody>
    </table>
</div>
</div>
   
    </body>
</html>


