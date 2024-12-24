<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn = new mysqli("localhost", "root", "", "crud_db");
    if ($conn->connect_error) {
        die("koneksi gagal: ". $conn->connect_error);
    }

    $sql = "DELETE FROM pendaftar WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: daftar.php");
    }else{
        echo"Error". $conn->error;
    }

    $conn->close();
}
?>