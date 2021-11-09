<?php 
include 'header.php';
include 'body.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM kategori where id_kategori='$id'");

while ($d = mysqli_fetch_array($data)){
    ?>
    
    <div class="container">
    <h1>Kategori</h1>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <form method="POST" action="update_kategori.php">
                    <div class="form-group">
                        <label><b>Edit Kategori</b></label>
                        <input type="hidden" name="id_kategori" value="<?php echo $d['id_kategori']; ?>">
                        <input type="text" class="form-control" name="kategori" id="kategori" value="<?php echo $d['kategori'];?>">
                    </div>
                    <div class="form-group">
                        <button  class="button1"><i class="fa fa-plus-circle">Simpan</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>
</body>
</html>

