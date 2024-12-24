<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> -->
    <title>CRUD System</title>
    <link rel="stylesheet" href="lpstyle.css"/>
</head>
<body>
<nav>
<div class="brand">LOMBA FOTOGRAFI</div>
<ul>
    <li><a href="index.php">HOME</a></li>
    <li><a href="#">ABOUT US</a></li>
    <li><a href="logout.php">LOGOUT</a></li>
</ul>
    </nav>
    <div class="container">
        <h2>DAFTAR PESERTA LOMBA</h2>
        
        <a href="create.php" class="btn btn-primary mb-3">Daftar</a>
        <form action="daftar.php" method="GET" class="d-flex mb-3 search-form">
            <input class="form-control me-2" type="text" name="search" placeholder="cari peserta" required>
            <button class="btn btn-outline-success" type="submit">Cari</button>
        </form>
        

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        
                    <?php
                    $conn = new mysqli("localhost", "root", "", "crud_db");

                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    if (isset($_GET['search'])) {
                        $search = $conn->real_escape_string($_GET['search']);
                        $sql = "SELECT * FROM pendaftar WHERE name LIKE '%$search%'";
                    } else {
                        $sql = "SELECT * FROM pendaftar";
                    }

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>" . htmlspecialchars($row["id"]) . "</td>
                                <td>" . htmlspecialchars($row["name"]) . "</td>
                                <td>" . htmlspecialchars($row["email"]) . "</td>
                                <td>" . htmlspecialchars($row["phone"]) . "</td>
                                <td>
                                    <a href='update.php?id=" . $row["id"] . "' class='btn btn-edit'> Edit</a>
                                    <a href='delete.php?id=" . $row["id"] . "' class='btn btn-delete'> Hapus</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada hasil ditemukan.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <p>Author: <a href="https://www.instagram.com/raisulamrrr/">@raisulamrr</a></p>
        <p><a href="email:raisulamar1108@gmail.com">raisulamar1108@gmail.com</a></p>
    </footer>
</body>
</html>
