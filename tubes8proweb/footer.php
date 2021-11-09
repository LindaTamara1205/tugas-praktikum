<?php
$kategori_list = 'SELECT
kategori.kategori,
Count(berita.id_berita) AS jumlah,
kategori.id_kategori
FROM
berita
INNER JOIN kategori ON berita.id_kategori = kategori.id_kategori
GROUP BY
kategori.kategori,
kategori.id_kategori';
$list_kategori = $koneksi->query($kategori_list) or die($koneksi->error);

$latest = 'SELECT
berita.id_berita,
berita.judul,
berita.gambar,
berita.tgl_posting,
berita.id_user,
user.nama
FROM
berita
INNER JOIN user ON berita.id_user = user.id_user
ORDER BY
berita.tgl_posting DESC
LIMIT 0, 3
';

$list_latest = $koneksi->query($latest) or die ($koneksi->error);
?>

<footer>
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-5">
            <img src="assets/images/LOGO1.png" class="footer-logo" alt="" />
            <h5 class="font-weight-normal mt-4 mb-5">
              Menit.com adalah website berita terbaik untukmu yang tertarik membuat berita.
              Kami percaya semua orang punya kemampuan untuk menulis, oleh karena itu, kami 
              menyediakan website yang dapat menampung aspirasi setiap orang. Karenanya,
              tunggu apa lagi? <i>Write your own news.</i>     
              </h5>
            <ul class="social-media mb-3">
              <li>
                <a href="https://web.facebook.com/ahmad.yurino.3/">
                  <i class="mdi mdi-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-youtube"></i>
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/menit.com_/?igshid=1s39oggar2l9k">
                  <i class="mdi mdi-instagram"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-sm-4">
            <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
            <?php while ($lat = $list_latest -> fetch_assoc()){?>
            <div class="row">
              <div class="col-sm-12">
                <div class="footer-border-bottom pb-2">
                  <div class="row">
                    <div class="col-3">
                      <img
                        src="assets/images/<?php echo $lat['gambar'];?>"
                        alt="thumb"
                        class="img-fluid"
                      />
                    </div>
                    <div class="col-9">
                      <a href="detail.php?p=<?php echo $lat['id_berita'];?>" class="link4"><h5 class="font-weight-600">
                        <?php echo $lat['judul'];?></a>
                      </h5>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <?php } ?>
            </div>
          <div class="col-sm-3">
            <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
            <?php while ($kategori = $list_kategori -> fetch_assoc()){?>
            <div class="footer-border-bottom pb-2">
              <div class="d-flex justify-content-between align-items-center">
                <a href="pages/halaman.php?p=<?php echo $kategori['id_kategori'];?>" class="link4"><h5 class="mb-0 font-weight-600"><?php echo $kategori['kategori'];?></h5>
            </a>
                <div class="count"><?php echo $kategori['jumlah'];?></div>
              </div>
            </div>
            <?php } ?>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="d-sm-flex justify-content-between align-items-center">
              <div class="fs-14 font-weight-600">
                © 2020 @ Kelompok 8. All rights reserved.
              </div>
              <div class="fs-14 font-weight-600">
                Handcrafted by Kelompok 8
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>