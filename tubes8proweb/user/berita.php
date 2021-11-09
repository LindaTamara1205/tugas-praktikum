<?php
include 'header.php';
include 'body.php';
?>
<?php
	$limit = 5;
	$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
	$halaman_awal = ($halaman>1) ? ($halaman * $limit) - $limit : 0;	

	$previous = $halaman - 1;
  $next = $halaman + 1;
  $no_hal = $halaman_awal + 1;

$sql = "SELECT
berita.id_berita,
berita.judul,
user.id_user,
berita.gambar,
berita.tgl_posting,
user.nama,
kategori.kategori
FROM
berita
INNER JOIN user ON berita.id_user = user.id_user
INNER JOIN kategori ON kategori.id_kategori = berita.id_kategori
ORDER BY berita.tgl_posting DESC
LIMIT ".$halaman_awal.",". $limit;
$qry = $koneksi->query($sql);

$sql_rec = "SELECT id_berita FROM berita";

$total_rec = $koneksi->query($sql_rec);

$total_rec_num = $total_rec->num_rows;

$total_halaman = ceil($total_rec_num/$limit);

?>
      <!--Masukkan berita-->
        <div class="container">
            <h2>Berita</h2>
            <hr>
            <div class="row">
                <a href="tambah_berita.php" class="button"><i class="fa fa-plus-circle">&nbspTambah Berita</i></a>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="30%">Judul</th>
                            <th width="5%">Gambar</th>
                            <th width="15%">Kategori</th>
                            <th width="15%">Tanggal Posting</th>
                            <th width="10%">Penulis</th>
                            <th width="25">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($news_list = $qry->fetch_assoc()){
                      ?>
                    <tr>
                    <td><strong><?php echo $news_list['judul'];?></strong></td>
                    <td>
                      <img src="../assets/images/<?php echo $news_list['gambar'];?>" height="75" width="75">
                    </td>
                    <td><?php echo $news_list['kategori'];?></td>
                    <td><?php echo $news_list['tgl_posting'];?></td>
                    <td>
                    <?php echo $news_list['nama'] ?>
                    </td>
                    <td>
                    <?php if ($news_list['id_user'] == $_SESSION['id_user'] or $_SESSION['level']=='admin') { ?>
                    <a class="btn  btn-primary"  href="../detail.php?p=<?php echo $news_list['id_berita'];?>">
												<i class="fa fa-eye"></i></a>
											<a href="edit-berita.php?id=<?=$news_list['id_berita']?>" class="btn btn-success">
												<i class="fa fa-edit"></i></a>
											<a onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?');" href="hapus-berita.php?id=<?=$news_list['id_berita']?>" class="btn btn-danger">
												<i class="fa fa-trash"></i></a>
                      <?php } else { ?>
											<a class="btn btn-sm btn-primary" target="_blank" href="../detail.php?p=<?php echo $news_list['id_berita'];?>">
												<i class="fa fa-eye"></i></a>
											<?php } ?>

                      </td>
                    </tr>
                      <?php 
                         $no_hal++;
                      } 
                      ?>

                    </tbody>
                </table>
                <nav>
                  <ul class="pagination justify-content-center">
                  <?php if($halaman > 1){ ?>
                    <li class="page-item">
                      <a class="page-link" <?php echo "href='?halaman=$previous'";  ?>><b>Previous</b></a>
                   <?php }  else{ ?>
                    </li>
                      <li class="page-item disabled">
                    </li>
                   <?php } ?>
                    <?php 
                    for($x=1;$x<=$total_halaman;$x++){
                      ?> 
                      <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                      <?php
                    }
                    ?>
                    <?php if($halaman == $total_halaman) {?>				
                    <li class="page-item disabled">
                    <?php } else{?>
                    <li class="page-item">
                      <a  class="page-link" <?php echo "href='?halaman=$next'"; ?>><b>Next</b></a>
                    </li>
                    <?php } ?>
                  </ul>
                </nav>
            </div>

                    <!--footer-->
<?php include ('footer.php'); ?>

 