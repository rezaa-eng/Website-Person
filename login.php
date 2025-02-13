<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     if (password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

       
        $query = "SELECT COUNT(*) as total FROM inputs WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['total'] > 0) {
            header("Location: dashboard.php");
        } else {
            header("Location: input.php");
        }
        exit();
    } else {
        echo "Login gagal! Periksa kembali username dan password.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Halaman Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background-image: url(logo.jpg);
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
         
        }

        .navbar {
            width: 100%;
            background-color: navy;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
            padding: 10px 0;
            text-align: center;
            color: white;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar img {
            margin-right: 10px;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 450px;
            margin-top: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            margin-top: 20px;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4532b3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #4532b3;
        }
    </style>
</head>
<body>



  <nav class="navbar navbar-light bg-light" style="background-color: #4532b3; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);">
                <div class="container-fluid" style="background-color:#4532b3; color: black;">
                    <a class="navbar-brand" href="#" style="color: white; margin-left: -10px;">
                        <img src="gambar/putih.png" alt="Avatar" width="90px" >
                        PT. asdas
                    </a>
                </div>
            </nav>


    <div class="login-container" style=" align-items: center; justify-content: center; width: 450px; justify-content: center;  margin-top: 50px;">
   
        <img src="gambar/sim.png" alt="Deskripsi Gambar" style="width: 300px; margin-left : 55px; margin-bottom : 40px;">
        <p style="text-align: center; font-weight: bold; font-size: 20px; margin-bottom: 30px;">Login</p>
        
        <form action="#" method="POST">

    <label for="username">Email :</label>
    <input type="text" id="username" name="username" placeholder="Masukkan username" required style="width : 100%; height: 45px;" >


    <label for="password">Password :</label>
    <input type="text" id="password" name="password" placeholder="Password" required>

    <button type="submit">Login</button>

    
</form>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
