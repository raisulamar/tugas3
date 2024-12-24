<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<?php
$conn = new mysqli("localhost", "root", "", "crud_db");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM pendaftar WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        $sql = "UPDATE pendaftar SET name='$name', email='$email', phone='$phone' WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: daftar.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    $conn->close();
}
?>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Nama: <input type="text" name="name" value="<?php echo $name; ?>" required><br>
    Email: <input type="email" name="email" value="<?php echo $email; ?>" required><br>
    Telepon: <input type="text" name="phone" value="<?php echo $phone; ?>" required><br>
    <button type="submit">Update</button>
</form>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
<style>
    body{
        font-family: roboto;
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
        width: 100%;
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
</html>