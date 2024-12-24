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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="lpstyle.css"/>
</head>
<body>

<!-- navbar -->
    <nav>
<div class="brand">LOMBA FOTOGRAFI</div>
<ul>
    <!-- <li><a href="#">HOME</a></li> -->
    <li><a href="#">ABOUT US</a></li>
    <li><a href="daftar.php">DAFTAR</a></li>
    <li><a href="logout.php">LOGOUT</a></li>
</ul>
    </nav>
<!-- navbar end -->

<!-- isi -->
    <main>

<article class="artikel1">
    <p><h3>Deskripsi Lomba</h3></p>
    <p>Lomba fotografi "Pesona Alam Indonesia" adalah kompetisi terbuka untuk semua kalangan yang mengajak peserta untuk menangkap keindahan alam Indonesia melalui lensa kamera. Kami mengundang fotografer dari berbagai latar belakang untuk menunjukkan kreativitas dan perspektif unik mereka terhadap keindahan alam, budaya, dan kekayaan hayati Indonesia.</p>
    <p>Tujuan Lomba: Meningkatkan kesadaran akan keindahan alam Indonesia dan mempromosikan konservasi lingkungan melalui seni fotografi.</p>
</article>

<article class="artikel2">
<p><h3>Ketentuan Lomba</h3></p>
<p>1. Terbuka untuk umum.</p>
<p>2. Tema: "Pesona Alam Indonesia," mencakup lanskap, flora, fauna, dan budaya lokal.</p>
<p>3. Maksimal 3 foto per peserta, format JPEG/PNG, resolusi minimum 300 DPI, karya harus asli.</p>
<p>4. Kirim karya melalui formulir pendaftaran online, sertakan judul dan deskripsi singkat.</p>
<p>5. Pendaftaran dibuka dari 1 Oktober hingga 20 Oktober.</p>
<p>6. Berdasarkan kreativitas, teknik, dan kesesuaian tema oleh dewan juri profesional.</p>
<p>7. Juara satu 2 juta rupiah, Juara dua 1,5 juta rupiah, Juara tiga 1 juta rupiah.</p>
<p>8. Karya harus asli dan belum dipublikasikan.</p>
<p>9. Peserta tetap memiliki hak cipta, panitia berhak menggunakan foto untuk promosi.</p>
<p>10. Informasi lebih lanjut: raisulamar1108@gmail.com</p>
</article>
    </main>
<!-- isi end -->

<!-- aside -->
    <aside>
        <p><h3>Keindahan Alam Indonesia</h3></p>
        <img src="alamindonesia.jpg" width="30%" height="30%"/>
        <p><a href="https://unsplash.com/photos/person-standing-on-green-grass-field-B04Xpnu5JQ4">source gambar</a></p>
    </aside>
<!-- aside end -->

<!-- footer -->
    <footer>
        <p>Author: <a href="https://www.instagram.com/raisulamrrr/">@raisulamrr</a></p>
        <p><a href="email:raisulamar1108@gmail.com">raisulamar1108@gmail.com</a></p>
    </footer>
<!-- footer end -->

</body>
</html>