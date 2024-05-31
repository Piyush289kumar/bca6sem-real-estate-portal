<!-- Import Files -->
<?php
include ('config.php'); ?>
<!-- Login Back-End Code -->
<!-- Form Start -->
<?php
if (isset($_POST['login'])) {
  session_start();
  $username = $_SESSION['otp_username'];
  $email = $_SESSION['otp_email'];
  $top_auth = $_SESSION['otp_auth'];
  $password1 = mysqli_real_escape_string($conn, md5($_POST['password1']));
  $password2 = mysqli_real_escape_string($conn, md5($_POST['password2']));
  $password1_unsafe = mysqli_real_escape_string($conn, $_POST['password1']);
  $password2_unsafe = mysqli_real_escape_string($conn, $_POST['password2']);
  if ($password1_unsafe == $password2_unsafe) {
    $sql_user_pass_cheack = "UPDATE user SET password ='{$password1}' WHERE username = '{$username}' AND otp = '{$top_auth}'" or die("Query Failed!! --> sql_user_pass_cheack");
    $result_sql_user_pass_cheack = mysqli_query($conn, $sql_user_pass_cheack);
    if (mysqli_query($conn, $sql_user_pass_cheack)) {
      ?>
      <script>
        alert('Password is reset successfull.')
      </script>
      <?php
      echo "<script>window.location.href='$hostname/admin'</script>";
    } else {
      echo ("<div class='d-flex justify-content-center' style='padding-top:60px;'><p class='btn btn-danger'>OTP Not Match.</p></div>");
    }
  } else {
    echo ("<div class='d-flex justify-content-center' style='padding-top:60px;'><p class='btn btn-danger'>Password not match.</p></div>");
  }
}
?>
<!-- Login Back-End Code -->
<?php ?>


<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="../img/music.png" />
  <title>ADMIN | Login</title>
  <!-- <link rel="stylesheet" href="../css/bootstrap.minDJ.css" /> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="../css/font-awesome.css"> -->
  <!-- <link rel="stylesheet" href="../css/adminstyle_centerDJ.css"> -->
</head>

<body>
  <main>
    <div class="container">
      <section class="section register d-flex flex-column align-items-center justify-content-center pb-4"
        style='min-height: 85vh;'>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 ">              
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-1">Reset Password</h5>
                    <p class="text-center">Create a new password</p>
                  </div>


                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">

                    <label for="password1" class="form-label">Enter Your Password</label>
                      <input type="password" name="password1" class="form-control" id="password1" required>
                    </div>

                    <div class="form-group">
                    <label for="password1" class="form-label">Enter Your Password</label>
                      <input type="password" name="password2" class="form-control" id="password2">
                      <div class="invalid-feedback">Please enter your password.</div>
                      
                      <div class="col-12">
                      <button class="btn btn-primary w-100 mt-2" type="submit" name='login'>Reset Password</button>
                    </div>
                    <div class="col-12 mt-3">
                      <p class="small mb-0">Already have an account? <a href="../">login</a></p>
                    </div>                    
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>