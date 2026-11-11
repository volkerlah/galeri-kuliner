<?php
$koneksi = mysqli_connect("localhost", "root", "", "kuliner_nusantara");
if (!$koneksi) { die("Koneksi database gagal: " . mysqli_connect_error()); }

$pesan = "";

if (isset($_POST['submit'])) {
    $daerah_id    = $_POST['daerah_id'];
    $nama_makanan = $_POST['nama_makanan'];
    $deskripsi    = $_POST['deskripsi'];
    
    $file_gambar = $_FILES['gambar']['tmp_name'];
    $nama_file   = $_FILES['gambar']['name'];
    $ekstensi    = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

    if ($ekstensi != 'jpg' && $ekstensi != 'jpeg') {
        $pesan = "<p style='color:red; text-align:center;'>Gagal! Hanya file JPG atau JPEG yang diizinkan.</p>";
    } else {
        $data_gambar = file_get_contents($file_gambar);
        $stmt = mysqli_prepare($koneksi, "INSERT INTO makanan (daerah_id, nama_makanan, deskripsi, gambar) VALUES (?, ?, ?, ?)");
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "isss", $daerah_id, $nama_makanan, $deskripsi, $data_gambar);
            
            if (mysqli_stmt_execute($stmt)) {
                $pesan = "<p style='color:green; text-align:center;'>Data berhasil ditambahkan!</p>";
            } else {
                $pesan = "<p style='color:red; text-align:center;'>Gagal: " . mysqli_error($koneksi) . "</p>";
            }
            mysqli_stmt_close($stmt);
        } else {
            $pesan = "<p style='color:red; text-align:center;'>Query Error: " . mysqli_error($koneksi) . "</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Upload Makanan</title>
    <Style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
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
        form {
            background: #8a7474; 
            padding: 40px; 
            border-radius: 15px; 
            width: 350px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            margin-bottom: 300px;
        }
        h2 {
            text-align: center;
            margin-top: 0;
        }
        input[type="text"], 
        select, 
        textarea, 
        input[type="file"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box; 
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea {
            resize: vertical;
            height: 80px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #555;
        }
    </Style>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <h2>Upload Makanan</h2>
        <?php echo $pesan; ?>
        <select name="daerah_id" required>
            <option value="" disabled selected>-- Pilih Daerah --</option>
            <option value="1">Bali</option>
            <option value="2">Lombok</option>
            <option value="3">Kalimantan</option>
            <option value="4">Palembang</option>
            <option value="5">Yogyakarta</option>
        </select>
        <input type="text" name="nama_makanan" placeholder="Nama Makanan" required>
        <textarea name="deskripsi" placeholder="Deskripsi" required></textarea>
        <input type="file" name="gambar" accept=".jpg, .jpeg, image/jpeg" required>
        <button type="submit" name="submit">Upload Data</button>
    </form>
</body>
</html>