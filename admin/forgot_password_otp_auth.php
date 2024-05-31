<!-- Import Files -->
<?php
include ('config.php');
$notification_box = 'block';
?>
<!-- Login Back-End Code -->
<!-- Form Start -->
<?php
if (isset($_POST['verify'])) {
  session_start();
  $username = $_SESSION['otp_username'];
  $email = $_SESSION['otp_email'];
  $otp = mysqli_real_escape_string($conn, $_POST['otp']);
  $_SESSION['otp_auth'] = $otp;

  $otp_check = "SELECT * FROM user WHERE otp = '{$otp}' AND username = '{$username}'" or die("Query Failed!! --> otp_check");
  $otp_query_response = mysqli_query($conn, $otp_check);
  if (mysqli_num_rows($otp_query_response) > 0) {
    ?>
    <script>
      alert('OTP Verify.')
    </script>
    <?php
    echo "<script>window.location.href='$hostname/admin/forgot_password_update.php'</script>";
  } else {
    $notification_box = 'none !important';
    echo ("<div class='d-flex justify-content-center' style='padding-top:60px;'><p class='btn btn-danger'>Invalid OTP.</p></div>");
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="../css/bootstrap.minDJ.css" />
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/adminstyle_centerDJ.css"> -->
</head>

<body>
  <main>
    <div class="container">

      <section class="section register d-flex flex-column align-items-center justify-content-center pb-4"
        style='min-height: 85vh;'>
        <div class="container">
          <!-- top send message -->
          <div class='d-flex justify-content-center align-items-center w-full'
            style='padding-top:60px; display: <?php echo $notification_box ?>'>
            <p class='btn btn-success'>Email was send successfull to your registered email.</p>
          </div>
          <!-- top send message -->
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Forgot Password</h5>
                    <p class="text-center small">Enter OTP</p>
                  </div>
                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="row g-3 needs-validation" novalidate
                    autocomplete="off">

                    <div class="col-12">
                      <label for="otp" class="form-label">OTP</label>
                      <input type="text" name="otp" class="form-control" id="otp" maxlength="6">
                      <div class="invalid-feedback">Please enter your OTP.</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name='verify'>Verify OTP</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="../admin">login</a></p>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Import Copyright File -->
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>