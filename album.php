<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
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
        <h1 style = "font-size: 30px; margin-top : 10px;">PT. SIMasdsaIM</h1>
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


    <figure style = "margin-top : 100px; text-align : center; font-size : 20px;">
  <blockquote class="blockquote" >
    <p>Album Praktek Kerja Lapangan (PKL)</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    PT. <cite title="Source Title">Sasdasdltim</cite>
  </figcaption>
</figure>

    <div class="row row-cols-4 g-4 justify-content-center" style="margin-top: 30px; width: 80%; margin-left: auto; margin-right: auto;">
  <div class="col">
    <div class="card">
      <img src="gambar/10.jpg" class="card-img-top" alt="...">
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="gambar/album2.jpg" class="card-img-top" alt="...">
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="gambar/5.jpg" class="card-img-top" alt="...">
    </div>
  </div>
  <div class="col" style = "margin-bottom : 30px;">
    <div class="card">
      <img src="gambar/6.jpg" class="card-img-top" alt="...">
    </div>
  </div>
</div>

<div class="video-container" style= "margin-left : 170px; margin-bottom : 100px;
      margin-top: 5px;
      width: 50%;">
    <video controls style= "width: 80%;
      max-width: 800px;
      height: auto;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        <source src="gambar/pkl.MP4" type="video/mp4">
    </video>
</div>

</head>
<body>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

