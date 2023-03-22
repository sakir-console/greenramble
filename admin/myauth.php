<?php require_once('../core/dbcon.php'); ?>
<?php 

 if(isset($_COOKIE['log'])){
     if($_COOKIE['log']==2134){
    header("location:dashboard.php");
}
 }
$invalid="";


if(isset($_REQUEST['submit'])){
 $uname=$_REQUEST['username'];
 $pass=$_REQUEST['password'];
 $a1="myadmin";
 $p1="!@#dg!@#";

  if($uname==$a1 && $pass==$p1){
    setcookie('log','2134',time() + (86400 * 30));  
    header("location:dashboard.php");

  }else {
      $invalid="Invalid UserName or Password";
  }

}

?>

<!DOCTYPE html>
<html>

<?php require_once('includes/insert_css_headers.php'); ?>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Greenramble.com</a>
            <small>Admin Panel - Greenramble.com</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="msg"><?php echo $invalid;?></div>
                </form>
            </div>
        </div>
    </div>

   <?php require_once('includes/insert_js_links.php'); ?>

    <script src="assets/js/pages/examples/sign-in.js"></script>
</body>

</html>