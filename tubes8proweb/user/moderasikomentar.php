<?php 
include 'header.php';
include 'adminbody.php';
?>
<?php 
if(isset($_GET['p'])){
    $id = $_GET['p'];
    mysqli_query($koneksi, "SELECT * FROM komentar WHERE id_komentar='$id'");
    $status = '1';
    mysqli_query($koneksi, "UPDATE komentar SET status_komentar='$status' WHERE id_komentar='$id'");
}else if(isset ($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM komentar where id_komentar='$id'");
}
?>
<div class="container">
<br>
<br>
            <h2>Moderasi Komentar</h2>
            <hr>
 
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
							<th>No</th>
							<th>Nama</th>
                            <th>Komentar</th>
                            <th>Status</th>
							<th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
				include "../Configurasi/koneksi.php";
				$no = 1;
				$data = mysqli_query($koneksi,"select * from komentar");
				while($moderasi = mysqli_fetch_array($data)){
					?>
                    <tr>
				
						<td><?php echo $no++; ?></td>
						<td><?php echo $moderasi['nama']; ?></td>
                		<td><?php echo $moderasi['isi_komentar']; ?></td>
                		<td><?php echo $moderasi['status_komentar']; ?></td>
						<td>
						<a href="moderasikomentar.php?p=<?php echo $moderasi['id_komentar'];?>" class="btn btn-primary" name="ya"><i class="fa fa-check"></i></a>
                        <a href="moderasikomentar.php?hapus=<?php echo $moderasi['id_komentar'];?>" class="btn btn-danger" name="hapus"><i class="fa fa-close"></i></a>
						</td>                      
                      <?php }  ?>

                    </tbody>
   				 </table>						
                    <?php  {?>				
                    <?php } ?>
                  </ul>
                </nav>
            </div>
</body>
</html>
<br><br><br><br><br>

<?php include ('footer.php'); ?>
