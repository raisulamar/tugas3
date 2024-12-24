<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = substr(preg_replace('/[^0-9]/', '', $_POST["phone"]), 0, 13);

    $conn = new mysqli("localhost","root","","crud_db");
    if ($conn->connect_error) {
        die("koneksi gagal: ". $conn->connect_error);
    }

$sql = "INSERT INTO pendaftar (name, email, phone) VALUES ('$name', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    header("Location: daftar.php");
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form pengguna</title>
<style>
    body{
        font-family: poppins;
        font-weight: bold;
        background-color: #f4f4f4;

    padding: 5rem;
    }

    form{
    max-width: 450px;
    margin: 0 auto;
    padding: 30px;
    background-color: white;
    border-radius: 15px;
    box-shadow: -2px 0 10px rgba(0, 0, 0, 0.3);
        

    }

    input[type="text"],
    input[type="phone"],
    input[type="email"],
    select,
    textarea {
        width: 95%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        gap: 10px;
}

    form button{
        width: 100%;
        padding: 10px;
        background-color: black;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        margin-top: 10px;
        font-size: 16px;
    }

    form button:hover{
        background-color: gray;
    }
    form label{
        font-weight: bold;
    }


</style>
</head>
<body>

<form method="POST" action="">
    Nama: <input type="text" name="name" required>
    Email: <input type="email" name="email" required>
    Telepon: <input type="phone" name="phone" required>
    <button type="submit">kirim</button>
</form>
</body>
</html>