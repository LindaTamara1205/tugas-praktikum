<?php
include '../Configurasi/koneksi.php';
?>
<body>
    <div class="container-scroller">
      <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
        <header id="header">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                  <ul class="navbar-top-left-menu">
                    <li class="nav-item">
                    <a class="navbar-brand" href="#"
                  ><img src="../assets/images/LOGO1.png" alt=""
                /></a>
                </li>
              </ul>
                  <ul class="navbar-top-right-menu">
                  <?php if($_SESSION['level'] == "admin"){?>
                   <li class="nav-item">
                      <a href="admin.php" class="nav-link"><?php  echo $_SESSION['nama'];?></a>
                    </li>
                    <li class="nav-item">
                      <a href="logout.php?p=<?php echo $_SESSION['id_user'];?>" class="nav-link">Log Out</a>
                    </li>
                    <?php }else{?>
                    <li class="nav-item">
                    <a href="user.php" class="nav-link"><?php echo $_SESSION['nama'];?></a></li>
                    <li class="nav-item">
                    <a href="logout.php?p=<?php echo $_SESSION['id_user'];?>" class="nav-link">Log Out</a>
                    </li>
                    <?php }?>

                </div>
              </div>
              
          </header>

        <br>
        <br>
