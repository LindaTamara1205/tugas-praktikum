<?php
include 'header.php';
include 'body.php';
?>

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
                <a href="../index.php">
                  <img class="kategori" src="../assets/images/website.svg">
                  <h4>Kunjungi Website</h4>
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