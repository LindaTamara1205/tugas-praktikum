<?php
include 'header.php';
include 'adminbody.php';
?>


<br>
<br>
<br>
<br>
        <!---Tampilan beranda -->
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="page">Selamat datang, <b><?php echo $_SESSION['nama']?></b></h2>
            </div>
            </div>
            <br>
            <br>
            <div class="row">
              <div class="col big-icon">
                <a href="berita.php">
                  <img class="newspaper" src="../assets/images/newspaper.svg">
                  <h4>Berita</h4>
                </a>
              </div>
              <div class="col big-icon">
                <a href="kategori.php">
                  <img class="kategori" src="../assets/images/personal-information.svg">
                  <h4>Kategori</h4>
                </a>
              </div>
              <div class="col big-icon">
                <a href="moderasikomentar.php">
                  <img class="profil" src="../assets/images/comment.png">
                  <h4>Moderasi Komentar</h4>
                </a>
              </div>
              <div class="col big-icon">
                <a href="crud.php">
                  <img class="profil" src="../assets/images/profile.svg">
                  <h4>Pengguna</h4>
                </a>
              </div>
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!--footer-->
        <?php
        include 'footer.php';
        ?>