<?php
session_start();

$users = [
    "admin" => "admin",
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (array_key_exists($username, $users) && $users[$username] == $password) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            height: 100vh; /* Membuat tinggi penuh layar */
        }

        .container {
            display: flex;
            width: 100%;
        }

        .image-section {
            flex: 1;
            background-image: url('alamindonesia.jpg'); /* Ganti dengan URL gambar Anda */
            background-size: cover;
            background-position: center;
        }

        .form-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: white; /* Warna latar belakang form */
        }

        form {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: black;
            color: white;
            border: none;
            cursor: pointer;
        }

        h2 {
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
        }

        /* Pesan error */
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Bagian Gambar -->
        <div class="image-section"></div>

        <!-- Bagian Form -->
        <div class="form-section">
            <form method="POST" action="">
                <h2>Login</h2>
                <!-- Tampilkan pesan error jika ada -->
                <?php if (isset($error)): ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
                
                <p><input type="text" name="username" placeholder="Username" required></p>
                <p><input type="password" name="password" placeholder="Password" required></p>
                <p><input type="submit" name="login" value="Login" /></p>
            </form>
        </div>
    </div>
</body>
</html>
