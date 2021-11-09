<?php
include 'Configurasi/koneksi.php';

$sqlKat = 'SELECT
kategori.id_kategori,
kategori.kategori
FROM
kategori
INNER JOIN berita ON kategori.id_kategori = berita.id_kategori
GROUP BY
kategori.kategori
ORDER BY
kategori.id_kategori ASC
LIMIT 0, 5';
$qryKat = $koneksi->query($sqlKat) or die($koneksi->error);

$sqlBreaking = 'SELECT berita.id_berita, berita.judul, berita.tgl_posting FROM berita ORDER BY berita.tgl_posting DESC LIMIT 0, 5';
$qryBreaking = $koneksi->query($sqlBreaking);

$url = $_SERVER['REQUEST_URI'];
$explode_url = explode("/", $url);
?>

<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Menit.com</title>
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="./assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="assets/vendors/aos/dist/aos.css/aos.css" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="assets/images/logo.png" />

    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
  </head>

  <header id="header">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-top">
          <div class="d-flex justify-content-between align-items-center">
            <ul class="navbar-top-left-menu">
              <li class="nav-item">
              </li>
              <li class="nav-item">
              </li>
              <li class="nav-item">
              </li>
              <li class="nav-item">
              </li>
              <li class="nav-item">
              </li>
            </ul>
            <ul class="navbar-top-right-menu">
            <form action="cari.php" method="POST">
              <li class="nav-item">
              <input type="text"  autocomplete="off" name="nt" placeholder="Search for">
              <input type="submit" class="btn-primary" name="submit" value="cari">
              </li>
              </form>
              <?php 
              session_start();
              if(isset($_SESSION['username'])):?>
                <?php if($_SESSION['level'] == "admin"):?>
                <li class="nav-item">
                <a href="user/admin.php" class="nav-link"><?php echo $_SESSION['nama'];?></a>
                </li>
                <li class="nav-item"><a href="user/logout.php" class="nav-link">Log Out</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                <a href="user/user.php" class="nav-link"><?php echo $_SESSION['nama'];?></a>
                <li class="nav-item">
                <a href="user/logout.php" class="nav-link">Log Out </a>
                </li>
                <?php endif; ?>
              <?php else:?>
              <li class="nav-item">
                <a href="user/login.php" class="nav-link">Login</a>
              </li>
              <li class="nav-item">
                <a href="user/register.php" class="nav-link">Sign in</a>
              </li>
              <?php endif;?>
            </ul>
          </div>
        </div>
        <div class="navbar-bottom">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <a class="navbar-brand" href="#"
                ><img src="assets/images/LOGO1.png" alt=""
              /></a>
            </div>
            <div>
              <button
                class="navbar-toggler"
                type="button"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div
                class="navbar-collapse justify-content-center collapse"
                id="navbarSupportedContent"
              >
                <ul
                  class="navbar-nav d-lg-flex justify-content-between align-items-center"
                >
                  <li>
                    <button class="navbar-close">
                      <i class="mdi mdi-close"></i>
                    </button>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/halaman.php?p=41">Bisnis</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/halaman.php?p=34">Ekonomi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/halaman.php?p=35">Kesehatan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/halaman.php?p=33">Politik</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/halaman.php?p=44">Olahraga</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/halaman.php?p=39">Selebritas</a>
                  </li>
                </ul>
              </div>
            </div>
            <ul class="social-media">
              <li>
                <a href="https://web.facebook.com/ahmad.yurino.3/">
                  <i class="mdi mdi-facebook"></i>
                </a>
              </li>
              <li>
                <a href="https://www.youtube.com/channel/UCXs656LCadWbWzassRP79_A/about">
                  <i class="mdi mdi-youtube"></i>
                </a>
              </li>
              <li>
                <a href="https://instagram.com/menit.com_?igshid=1s39oggar2l9k">
                  <i class="mdi mdi-instagram"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>