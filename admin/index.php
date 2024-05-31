<?php
include("config.php");
session_start();
if (isset($_SESSION['username'])) {
    echo "<script>window.location.href='$hostname/admin/post-read.php'</script>";
    // header("Location:{$hostname}/admin/post.php");
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/music.png" />
    <title>ADMIN | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.minDJ.css" />
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/adminstyle_centerDJ.css">
</head>

<body>
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <!-- logo -->
                    <h3 class="heading text-center" style="font-weight:700; background:#00B98E; padding:12px 24px; border-radius:8px; color:#fff;">Housing Web Portal</h3>
                    <!-- logo -->
                    <!-- <img class=" logo" src="images/news.jpg"> -->
                    <h3 class="heading text-center" style="font-weight:700">Login</h3>
                    <!-- Form Start -->
                    <?php
                    if (isset($_POST['login'])) {
                        include("config.php");
                        $username = mysqli_real_escape_string($conn, $_POST['username']);
                        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
                        $sql_user_pass_cheack = "SELECT * FROM user WHERE username = '{$username}' AND password = '{$pass}'" or die("Query Failed!! --> sql_user_pass_cheack");
                        $result_sql_user_pass_cheack = mysqli_query($conn, $sql_user_pass_cheack);
                        if (mysqli_num_rows($result_sql_user_pass_cheack) > 0) {
                            while ($row = mysqli_fetch_assoc($result_sql_user_pass_cheack)) {
                                $_SESSION['user_id'] = $row['user_id'];
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['user_role'] = $row['role'];
                                // Log File Record
                                $user_id = $_SESSION['user_id'];
                                $username = $_SESSION['username'];
                                $_SESSION['user_role'];
                                $userRole;
                                if ($_SESSION['user_role'] == 1) {
                                    $userRole = "Admin";
                                } else {
                                    $userRole = "Local";
                                }
                                $log_time = date("h:i:s A");
                                $log_date = date("d-m-Y");
                                $post_author = $_SESSION['user_id'];
                                $sql_log = "INSERT INTO user_log (user_id, username, user_role, log_date, log_time)
                                VALUES ('{$user_id}','{$username}','{$userRole}','{$log_date}','{$log_time}')";
                                if (mysqli_query($conn, $sql_log)) {
                                    echo "<script>window.location.href='$hostname/admin/post-read.php'</script>";
                                }
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Invalid username and password!!</div>";
                        }
                    }
                    ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="" required>
                        </div>
                        Forgot Password?<a href="forgot_password.php"> Reset Password</a>
                        <br>
                        <br>
                        <input type="submit" name="login" class="btn btn-primary" value="&nbsp;&nbsp;login&nbsp;&nbsp;" />
                        <button class="btn btn-secondary"><a href="<?php echo $hostname ?>">&nbsp;&nbsp;Back&nbsp;&nbsp;</a></button>
                    </form>
                    <!-- /Form  End -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>