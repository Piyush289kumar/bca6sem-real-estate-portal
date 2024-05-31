<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="../img/music.png" />
  <title>ADMIN | Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


<!-- Import Files -->
<?php
include ('config.php'); ?>
<!-- Login Back-End Code -->
<!-- Form Start -->
<?php
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  $sql_user_pass_cheack = "SELECT user_id, username FROM user WHERE username = '{$username}'" or die("Query Failed!! --> sql_user_pass_cheack");

  $result_sql_user_pass_cheack = mysqli_query($conn, $sql_user_pass_cheack);

  if (mysqli_num_rows($result_sql_user_pass_cheack) > 0) {
    // Create Session For OTP Auth
    session_start();
    $_SESSION['username_pwd'] = $username;
    $_SESSION['user_otp_email'] = $email;
    // OTP Generated 
    $otp = strtoupper(substr(md5(rand(11, 99)), 0, 6));
    // OTP Session for Send Email
    $_SESSION['otp_send_session'] = $otp;
    $sql_otp_create = "UPDATE user SET otp ='{$otp}' WHERE username = '{$username}'";
    if (mysqli_query($conn, $sql_otp_create)) {
      echo "<script>window.location.href='$hostname/admin/email_sender_files/forgot_password_otp_sender.php'</script>";
    } else {
      echo ("<div class='d-flex justify-content-center' style='padding-top:60px;'><p class='btn btn-danger'>Invalid Username and Email.</p></div>");
    }
  } else {
    echo ("<div class='d-flex justify-content-center' style='padding-top:60px;'><p class='btn btn-danger'>Invalid Username and Email.</p></div>");
  }
}
?>
<!-- Login Back-End Code -->
<?php ?>


<body>
  <div id="wrapper-admin" class="body-content">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-offset-4 col-md-4 card px-4 pb-5 pt-4 mt-5">
                   
          <!-- <img class=" logo" src="images/news.jpg"> -->
          <h3 class="heading text-center" style="font-weight:700">Reset Password</h3>
          <!-- Form Start -->
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group mb-3 mt-3">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="User Name" autocomplete="off"
                required>
            </div>
            <div class="form-group mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <p>Already have an account? <a href="index.php">login</a></p>
            <br>

            <input type="submit" name="login" class="btn btn-success" value="&nbsp;&nbsp;GET OTP&nbsp;&nbsp;" />
            <button class="btn btn-primary"><a class="text-white text-decoration-none"
                href="<?php echo $hostname ?>">&nbsp;&nbsp;Back&nbsp;&nbsp;</a></button>
          </form>
          <!-- /Form  End -->
        </div>
      </div>
    </div>
  </div>
</body>

</html>