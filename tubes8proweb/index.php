<?php
include('header.php');
$limit = 3;
if(isset($_GET['p']))
{
    $noPage = $_GET['p'];
}
else $noPage = 1;

$offset = ($noPage - 1) * $limit;

$kategori = 'SELECT
kategori,
id_kategori
FROM
kategori
ORDER BY
kategori ASC
LIMIT 0, 10';
$data_kategori = $koneksi->query($kategori) or die($koneksi->error);

$sqlIndex = "SELECT
berita.id_berita,
berita.judul,
berita.gambar,
berita.isi_berita,
berita.tgl_posting,
user.id_user,
user.nama,
kategori.id_kategori,
kategori.kategori
FROM
user
INNER JOIN berita ON user.id_user = berita.id_user
INNER JOIN kategori ON kategori.id_kategori = berita.id_kategori
ORDER BY
berita.tgl_posting DESC
LIMIT ".$koneksi->real_escape_string($offset).",". $limit;

$sql_rec = "SELECT id_berita from berita";

$total_rec = $koneksi->query($sql_rec);

//Menghitung data yang diambil
$total_rec_num = $total_rec->num_rows;
$qryIndex = $koneksi->query($sqlIndex);

//Total semua data
$total_page = ceil($total_rec_num/$limit);


?>


  <body>
            <!-- partial -->
            <div class="flash-news-banner">
          <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <br>
                <br>
            </div>
          </div>
        </div>

          <?php include 'news_slider.php';?>
           <div class="row" data-aos="fade-up">
              <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h2>Category</h2>
                    <ul class="vertical-menu">
                      <?php while ($kat=$data_kategori -> fetch_assoc()){?>
                      <li><a href="pages/halaman.php?p=<?php echo $kat['id_kategori'];?>"><?php echo $kat['kategori'];?></a></li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <?php while($index = $qryIndex -> fetch_array()){?>
                    <div class="row">
                      <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <img
                              src="assets/images/<?php echo $index['gambar'];?>"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
                              >Terkini</span
                            >
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin">
                        <br><br>
                        <a href="detail.php?p=<?php echo $index['id_berita'];?>">
                        <h2 class="mb-2 font-weight-600"><?php echo $index['judul'];?>
                        </h2>
                        </a>
                        <div class="fs-13 mb-2">
                           <span class="mr-2"><?php echo $index['nama'];?> 
                    </span><?php echo $index['tgl_posting'];?>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <?php include 'pilihan.php';?>

                
                            
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
        <?php include 'footer.php';?>
        <!-- partial -->
      </div>
    </div>
    <!-- inject:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="assets/vendors/aos/dist/aos.js/aos.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="./assets/js/demo.js"></script>
    <script src="./assets/js/jquery.easeScroll.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
