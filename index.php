<?php
session_start();

// Jika sudah login sebagai admin, langsung arahkan ke dashboard admin (sementara kita buat redirect dulu)
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    header("Location: admin.php");
    exit;
}

// Jika sudah login sebagai guest, arahkan ke guest.php
if (isset($_SESSION['role']) && $_SESSION['role'] == 'guest') {
    header("Location: guest.php");
    exit;
}

// Jika ada perintah logout
if (isset($_GET['p']) && $_GET['p'] == 'logout') {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Jika belum login sama sekali, tampilkan halaman pilihan
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pilih Akses</title>
    
    <style>
        
body::before {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url("img/background.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  filter: blur(5px);
  z-index: -1;
  transform: scale(1.1);
}
        body { background: #333; color: white; font-family: sans-serif; text-align: center; padding-top: 20vh; }
        .card { background: #8a7474; padding: 40px; border-radius: 15px; display: inline-block; }
        a { display: block; margin: 15px; padding: 15px 30px; background: #643333; color: white; text-decoration: none; border-radius: 8px; font-size: 1.2em; transition: 0.3s; }
        a:hover { background: #4a2525; transform: scale(1.05); }
    </style>
    
</head>
<body>
    <div class="card">
        <h1>Selamat Datang</h1>
        <p>Silakan pilih akses Anda:</p>
        
        <!-- Link ke Guest -->
        <a href="guest.php">Masuk sebagai Guest (Pengunjung)</a>
        
        <!-- Link ke Login Admin -->
        <a href="login.php">Masuk sebagai Admin</a>
    </div>
</body>
</html>