<?php
if(!isset($_SESSION)){
   session_start();
   include '../Configurasi/koneksi.php';
   if(isset($_POST['submit'])){
      // menangkap data yang dikirim dari form
   $username = $_POST['username'];
   $password = md5($_POST['password']);
   
   // menyeleksi data admin dengan username dan password yang sesuai
   $login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
   $data = $login->fetch_assoc();

   
   // menghitung jumlah data yang ditemukan
   $cek = mysqli_num_rows($login);
   
   if($cek > 0){
      $_SESSION['username'] = $username;
      $_SESSION['status'] = "login";
      $_SESSION['id_user'] = $data['id_user'];
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['email'] = $data['email'];
      $_SESSION['level'] = $data['level'];
      if($data['level']=="admin"){
         header("location:admin.php");
      }else{
      header("location:user.php");
      }
      
   }
   else{
      header("location: login.php?pesan=gagal");
      }

   }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="shortcut icon" href="../assets/images/logo.png" />
   <link href="../assets/css/validate.css" rel="stylesheet" >
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javasript" src="assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
</head>
<body style="background-image: url(../assets/images/abstack-background-cartoon-style-bigbamm-sunlight_68708-513.jpg);background-size: cover; ">
	
<br/>
	
	<br/>
	<br/>



      <table class="table table-borderless table-light"  style="margin-left: 35%; max-width: 30% ; margin-top: 00px; ">
        <form action="" method="POST" id="login_form" >
          <tr>
               <td ><img src="../assets/images/user logo/LOGO1.png" alt="logomenit" width="200px"  style=" display: block;margin-left: auto;margin-right: auto;" ><br><h6>Log in dengan akunmu sekarang</br></h6></td>
          </tr>
          <tr>
              <th ><h3>Log In</h3></th>
          </tr>
          <tr>
          <td><?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
          echo"<h6 style='color:red'>Login gagal! username atau password salah! </h6>";
      
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}else if($_GET['pesan'] == "sukses"){
            echo"Berhasil, data telah disimpan, silahkan login!";
        }
	}
	?></td>
          </tr>
          <tr>
              <td ><input type="text" class="form-control" placeholder="Enter Username" id="form_username" name="username"><span class="error_form" id="uname_error_message"></span></td></td>
          </tr>
          <tr>
              <td > <input type="password" class="form-control" placeholder="Enter password" id="form_password" name="password"><span class="error_form" id="password_error_message"></span></td></td>
          </tr>
          <tr>
              <td ><a href="lupapassword.php">Lupa password? Click here</a></td>
          </tr>
          <tr>            
              <td><button type="submit" class="btn btn-primary" name="submit">Log In</button></td>          
          </tr>
          <tr>
              <td>Belum punya akun ?<a href="register.php">Buat akun</a></td>           
          </tr>
        </form>
      </table>
      <script type="text/javascript">
         $(function() {

         $("#uname_error_message").hide();
         $("#password_error_message").hide();
     

         var error_uname = false;      
         var error_password = false;
       

         $("#form_username").focusout(function(){
            check_uname();
         });
         $("#form_password").focusout(function() {
            check_password();
         });
    

         function check_uname() {
          
            var fname = $("#form_username").val();
            if ( fname !== '') {
               $("#uname_error_message").hide();
               $("#form_username").css("border-bottom","2px solid #34F458");
            } else {
               $("#uname_error_message").html("Masukkan Username Anda");
               $("#uname_error_message").show();
               $("#form_username").css("border-bottom","2px solid #F90A0A");
               error_uname = true;
            }
         }

       

         function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 8) {
               $("#password_error_message").html("Masukkan Password Anda");
               $("#password_error_message").show();
               $("#form_password").css("border-bottom","2px solid #F90A0A");
               error_password = true;
            } else {
               $("#password_error_message").hide();
               $("#form_password").css("border-bottom","2px solid #34F458");
            }
         }

       

         $("#login_form").submit(function() {
            error_uname = false;
           
            error_password = false;
        

            check_uname();
          
            check_password();
          

            if (error_uname == false  && error_password == false ) {
               
               return true;
            } else {
               swal("Maaf!", "Proses Login Gagal!", "error");
               return false;
            }


         });
      });
   </script>
</body>
</html>

