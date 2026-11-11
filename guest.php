<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aneka Masakan Daerah</title>
    <link rel="stylesheet" href="style.css" />
    <script src="jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
  </head>
  <body>
    <div class="navbar">
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#about">About</a></li>
      </ul>
    </div>

    <div id="home">
      <h1>Aneka Masakan Daerah</h1>
      <p>Berbagai Pilihan Daerah</p>
      <div class="menu">
        <div id="slide">
          <img class="gambar miring-kanan" src="" alt="" />
          <img class="gambar ubahtinggi" src="" alt="" />
          <img class="gambar miring-kiri" src="" alt="" />
          <img class="gambar hilang" src="" alt="" />
        </div>
      </div>
      <a class="btn" href="#menu">Bali</a>
    </div>

    <div id="menu">
      <?php
      $koneksi = mysqli_connect("localhost", "root", "", "kuliner_nusantara");
      if (!$koneksi) { die("Koneksi database gagal."); }
      
      $daftar_daerah = ['bali', 'lombok', 'kalimantan', 'palembang', 'yogyakarta'];

      foreach ($daftar_daerah as $slug) {
          echo '<div id="'.$slug.'">';
          
          // Ambil ID daerah dari tabel `daerah`
          $q_daerah = mysqli_query($koneksi, "SELECT * FROM daerah WHERE slug = '$slug'");
          $d_daerah = mysqli_fetch_assoc($q_daerah);
          
          if ($d_daerah) {
              $daerah_id = $d_daerah['id'];
              $nama_daerah = $d_daerah['nama_daerah'];
              
              // --- BAGIAN GAMBAR ---
              echo '<div class="makanan">';
              $q_gambar = mysqli_query($koneksi, "SELECT id, nama_makanan, gambar FROM makanan WHERE daerah_id = '$daerah_id'");
              
              while ($r = mysqli_fetch_assoc($q_gambar)) {
                  if (!empty($r['gambar']) && strlen($r['gambar']) > 100) { 
                      $base64 = base64_encode($r['gambar']);
                      echo '<img class="gambar-id-'.$r['id'].'" src="data:image/jpeg;base64,'.$base64.'" alt="'.$r['nama_makanan'].'" />';
                  }
              }
              echo '</div>';

              // --- BAGIAN DESKRIPSI ---
              $q_desc = mysqli_query($koneksi, "SELECT * FROM makanan WHERE daerah_id = '$daerah_id'");
              while ($r = mysqli_fetch_assoc($q_desc)) {
                  echo '<div class="desc-id-'.$r['id'].'">';
                  echo '  <h2>'.$r['nama_makanan'].'</h2>';
                  echo '  <p class="asal">'.$nama_daerah.'</p>';
                  echo '  <p class="desc">'.$r['deskripsi'].'</p>';
                  echo '</div>';
              }
          }
          echo '</div>';
      }
      ?>
    </div>

    <div id="about">
      <h1>Tentang Kami</h1>
      <p class="about-sub">Aneka Masakan Daerah Nusantara</p>
      <p class="about-desc">
        Aneka Masakan Daerah adalah sebuah galeri kuliner digital yang
        memperkenalkan keanekaragaman masakan tradisional Indonesia dari
        berbagai daerah, mulai dari Bali, Lombok, Kalimantan, Palembang, hingga
        Yogyakarta. Setiap hidangan disajikan lengkap dengan gambar, asal
        daerah, dan deskripsi singkat yang menggambarkan cita rasa serta
        filosofi di baliknya.
      </p>
      <p class="about-desc">
        Tujuan kami adalah melestarikan warisan kuliner Nusantara agar tetap
        dikenal oleh generasi muda dan wisatawan. Melalui tampilan yang
        sederhana namun menarik, kami berharap dapat menjadi jendela bagi siapa
        saja yang ingin menjelajahi kekayaan rasa Indonesia.
      </p>

      <div class="about-info">
        <div class="about-item">
          <h3>5</h3>
          <p>Daerah</p>
        </div>
        <div class="about-item">
          <h3>20</h3>
          <p>Hidangan</p>
        </div>
        <div class="about-item">
          <h3>100%</h3>
          <p>Kuliner Lokal</p>
        </div>
      </div>
    </div>
  </body>
</html>