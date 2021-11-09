<?php
    $sqlHalaman = "SELECT
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
    WHERE kategori.id_kategori = '39'
    ORDER BY
    berita.tgl_posting DESC
    LIMIT 0,4";

    $qryHal = $koneksi->query($sqlHalaman);

    $sqlOlahraga = "SELECT
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
    WHERE kategori.id_kategori = '44'
    ORDER BY
    berita.tgl_posting DESC
    LIMIT 0,2";

    $qryOlahraga = $koneksi->query($sqlOlahraga);

    $sqlKesehatan = "SELECT
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
    WHERE kategori.id_kategori = '35'
    ORDER BY
    berita.tgl_posting DESC
    LIMIT 0,1";

    $qryKesehatan = $koneksi->query($sqlKesehatan);

    $sqlEkonomi = "SELECT
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
    WHERE kategori.id_kategori = '34'
    ORDER BY
    berita.tgl_posting DESC
    LIMIT 0,4";

    $qryEkonomi = $koneksi->query($sqlEkonomi);
?>


            <div class="row" data-aos="fade-up">
              <div class="col-sm-12 grid-margin">
                <div class="card">
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6">
                        <div class="card-title">
                          Random
                        </div>
                        <div class="row">
                        <?php while ($kes = $qryKesehatan -> fetch_assoc()){?>
                          <div class="col-xl-6 col-lg-8 col-sm-6">
                            <div class="rotate-img">
                              <img
                                src="assets/images/<?php echo $kes['gambar'];?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </div>
                            <h2 class="mt-3 text-primary mb-2">
                              <?php echo $kes['judul'];?>
                            </h2>
                            <p class="fs-13 mb-1 text-muted">
                              <span class="mr-2"><?php echo $kes['nama'];?></span><?php echo $kes['tgl_posting'];?>
                            </p>
                            <p class="my-3 fs-15">
                            <?php echo substr($kes['isi_berita'], 0,200); ?>...
                            </p>
                            <a href="detail.php?p=<?php echo $kes['id_berita'];?>" class="font-weight-600 fs-16 text-dark"
                              >Read more</a>
                          </div>
                          <?php } ?>
                          <div class="col-xl-6 col-lg-4 col-sm-6">
                          <?php while ($eko = $qryEkonomi-> fetch_assoc()){?>
                            <div class="border-bottom pb-3 mb-3">
                            <a href="detail.php?p=<?php echo $eko['id_berita'];?>">
                              <h3 class="font-weight-600 mb-0">
                                <?php echo $eko['judul'];?>
                              </h3>
                              </a>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?php echo $eko['nama'];?></span><?php echo $eko['tgl_posting'];?>
                              </p>
                            </div>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="card-title">
                              Olahraga
                            </div>
                            <?php while ($olahraga = $qryOlahraga -> fetch_assoc()){?>
                            <div class="pt-3 pb-3">
                              <div class="rotate-img">
                                <img
                                  src="assets/images/<?php echo $olahraga['gambar'];?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                              <a href="detail.php?p=<?php echo $olahraga['id_berita'];?>">
                              <p class="fs-16 font-weight-600 mb-0 mt-3">
                                <?php echo $olahraga['judul'];?>
                              </p>
                              </a>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?php echo $olahraga['nama'];?></span><?php echo $olahraga['tgl_posting'];?>
                              </p>
                            </div>
                            <?php } ?>

                          </div>
                          <div class="col-sm-6">
                            <div class="card-title">
                              Berita Selebritas
                            </div>
                            <?php while($selebriti = $qryHal->fetch_assoc()){?>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="border-bottom pb-3">
                                  <div class="row">
                                    <div class="col-sm-5 pr-2">
                                      <div class="rotate-img">
                                        <img
                                          src="assets/images/<?php echo $selebriti['gambar'];?>"
                                          alt="thumb"
                                          class="img-fluid w-100"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-sm-7 pl-2">
                                    <a href="detail.php?p=<?php echo $selebriti['id_berita'];?>">
                                      <p class="fs-16 font-weight-600 mb-0">
                                       <?php echo $selebriti['judul'];?>
                                      </p>
                                      </a>
                                      <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2"><?php echo $selebriti['nama'];?> </span><?php echo $selebriti['tgl_posting'];?>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                            </div>