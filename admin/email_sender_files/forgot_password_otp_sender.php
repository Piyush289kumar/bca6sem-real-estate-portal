<?php
include ('smtp/PHPMailerAutoload.php');
include ('config.php');
session_start();
$end_user_email = $_SESSION['user_otp_email'];
$otp_username = $_SESSION['username_pwd'];
// Email Variables
$user_email = $_SESSION['user_otp_email'];
$user_otp = '';
$sql_otp_sender = "SELECT * FROM user WHERE username = '{$otp_username}'" or die("Query Failed!! --> sql_otp_sender");
$result_sql_otp_sender = mysqli_query($conn, $sql_otp_sender);
if (mysqli_num_rows($result_sql_otp_sender) > 0) {
  while ($row = mysqli_fetch_assoc($result_sql_otp_sender)) {
    $user_otp = $row['otp'];
    // Create Email Sesssion
    $_SESSION['otp_username'] = $row['username'];
    $_SESSION['otp_email'] = $end_user_email;
  }
} else { ?>
  <?php
  echo ("<div class='d-flex justify-content-center' style='margin-bottom:-120px; padding-top:60px;'><p class='btn btn-danger'>Email Not Send</p></div>");
}

// Email Send Code
$subject = "Account Password Reset Notification";
$body = "<!doctype html>
<html lang='en'>
<head>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
  <style media='all' type='text/css'>
    body {
      font-family: Helvetica, sans-serif;
      -webkit-font-smoothing: antialiased;
      font-size: 16px;
      line-height: 1.3;
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%;
    }
    table {
      border-collapse: separate;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      width: 100%;
    }
    table td {
      font-family: Helvetica, sans-serif;
      font-size: 16px;
      vertical-align: top;
    }
    body {
      background-color: #f4f5f6;
      margin: 0;
      padding: 0;
    }
    .body {
      background-color: #f4f5f6;
      width: 100%;
    }
    .container {
      margin: 0 auto !important;
      max-width: 600px;
      padding: 0;
      padding-top: 24px;
      width: 600px;
    }
    .content {
      box-sizing: border-box;
      display: block;
      margin: 0 auto;
      max-width: 600px;
      padding: 0;
    }
    .main {
      background: #ffffff;
      border: 1px solid #eaebed;
      border-radius: 16px;
      width: 100%;
    }
    .wrapper {
      box-sizing: border-box;
      padding: 24px;
    }
    .footer {
      clear: both;
      padding-top: 24px;
      text-align: center;
      width: 100%;
    }
    .footer td,
    .footer p,
    .footer span,
    .footer a {
      color: #9a9ea6;
      font-size: 16px;
      text-align: center;
    }
    p {
      font-family: Helvetica, sans-serif;
      font-size: 16px;
      font-weight: normal;
      margin: 0;
      margin-bottom: 16px;
    }
    a {
      color: #0867ec;
      text-decoration: underline;
    }
    .btn {
      box-sizing: border-box;
      min-width: 100% !important;
      width: 100%;
    }
    .btn>tbody>tr>td {
      padding-bottom: 16px;
    }
    .btn table {
      width: auto;
    }
    .btn table td {
      background-color: #ffffff;
      border-radius: 4px;
      text-align: center;
    }
    .btn a {
      background-color: #ffffff;
      border: solid 2px #0867ec;
      border-radius: 4px;
      box-sizing: border-box;
      color: #0867ec;
      cursor: pointer;
      display: inline-block;
      font-size: 16px;
      font-weight: bold;
      margin: 0;
      padding: 12px 24px;
      text-decoration: none;
      text-transform: capitalize;
    }
    .btn-primary table td {
      background-color: #0867ec;
    }
    .btn-primary a {
      background-color: #0867ec;
      border-color: #0867ec;
      color: #ffffff;
    }
    @media all {
      #MainContend {
        background: #4054F1 !important;
        color: #F6F6FE !important;
        padding: 12px 18px !important;
        width: 100% !important;
        font-size: 26px !important;
        font-weight: 800 !important;
        cursor: pointer;
        transition: all 0.3s ease-out;
      }
    }
    .last {
      margin-bottom: 0;
    }
    .first {
      margin-top: 0;
    }
    .align-center {
      text-align: center;
    }
    .align-right {
      text-align: right;
    }
    .align-left {
      text-align: left;
    }
    .text-link {
      color: #0867ec !important;
      text-decoration: underline !important;
    }
    .clear {
      clear: both;
    }
    .mt0 {
      margin-top: 0;
    }
    .mb0 {
      margin-bottom: 0;
    }
    .preheader {
      color: transparent;
      display: none;
      height: 0;
      max-height: 0;
      max-width: 0;
      opacity: 0;
      overflow: hidden;
      mso-hide: all;
      visibility: hidden;
      width: 0;
    }
    .powered-by a {
      text-decoration: none;
    }
    @media only screen and (max-width: 640px) {
      .main p,
      .main td,
      .main span {
        font-size: 16px !important;
      }
      .wrapper {
        padding: 8px !important;
      }
      .content {
        padding: 0 !important;
      }
      .container {
        padding: 0 !important;
        padding-top: 8px !important;
        width: 100% !important;
      }
      .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      .btn table {
        max-width: 100% !important;
        width: 100% !important;
      }
      .btn a {
        font-size: 16px !important;
        max-width: 100% !important;
        width: 100% !important;
      }
    }
    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
      .ExternalClass p,
      .ExternalClass span,
      .ExternalClass font,
      .ExternalClass td,
      .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
      }
    }
  </style>
</head>
<body style='background:#F4F5F6; height:100vh'>
  <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body'>
    <tr>
      <td>&nbsp;</td>
      <td class='container'>
        <div class='content'>
          <!-- START CENTERED WHITE CONTAINER -->
          <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='main'>
            <!-- START MAIN CONTENT AREA -->
            <tr>
              <td class='wrapper'>
               
                <h1 style='color: #212121ef;'>Forgot Password Code</h1>
                <p style='color: #212121ef;'>Here is your verification code to Reset Password:</p>
                <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary'>
                  <tbody>
                    <tr>
                      <td align='left'>
                        <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                          <tbody>
                            <tr>
                              <td>
                                <a id='MainContend'>" . $user_otp . "</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <p><b>Note:</b> Please make sure you never share this code with anyone.</p>
              </td>
              <tr>
                <td class='content-block'>                  
                </td>
              </tr>
            </tr>
            <!-- END MAIN CONTENT AREA -->
          </table>
        </div>
      </td>
      <td>&nbsp;</td>
    </tr>
  </table>
</body>
</html>";
smtp_mailer($user_email, $subject, $body);
function smtp_mailer($to, $subject, $msg)
{
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587;
  $mail->IsHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Username = "emailbot4all@gmail.com";
  $mail->Password = "siomkbvpakcldsoa";
  $mail->SetFrom("emailbot4all@gmail.com");
  $mail->Subject = $subject;
  $mail->Body = $msg;
  $mail->AddAddress($to);
  $mail->SMTPOptions = array(
    'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => false
    )
  );
  if (!$mail->Send()) {
    echo "<div style='background:red; color:#fff; font-size:24px;'>Plesase cheack Your Internet Connection !!</div>";
  } else {
    header("Location: http://localhost/rishabtiwariPortfolio/admin/forgot_password_otp_auth.php");
    exit(); // Always use exit after redirecting with header
  }
}