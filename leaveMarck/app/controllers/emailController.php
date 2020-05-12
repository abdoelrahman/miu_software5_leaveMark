<?php
require_once ROOT_PATH .'/vendor/autoload.php';
require_once ROOT_PATH . "/app/helpers/validateUser.php";


// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername(EMAIL)
    ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token)
{
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>اهلا بك في اترك اثر</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>شكرا لتسجيلك في موقعنا .من فضلك اضغط علي اللينك التالي لتأكيد حسابك..</p>
        <a href="http://localhost/leaveMarck/verifie.php?token=' . $token . '">اكد الايميل</a>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Verify your email'))
        ->setFrom(EMAIL)
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

function verifyEmail($token)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE users SET verified=1 WHERE token='$token'";

        if (mysqli_query($conn, $query)) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = true;
            $_SESSION['message'] = "تم تفعيل الحساب ننجاح";
            $_SESSION['type'] = 'alert-success';
            header('location: '. BASE_URL . '/index.php');
            exit(0);
        }
    } else {
        echo "User not found!";
    }
}

function sendPasswordRestLink($userEmail,$token){
  global $mailer;
  $body = '<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Test mail</title>
    <style>
      .wrapper {
        padding: 20px;
        color: #444;
        font-size: 1.3em;
      }
      a {
        background: #592f80;
        text-decoration: none;
        padding: 8px 15px;
        border-radius: 5px;
        color: #fff;
      }
    </style>
  </head>

  <body>
    <div class="wrapper">
      <p>
        hallo there,
        من قضلك اضعط علي الرابط التالي لتستعيد الرقم السري خاصتك:
      </p>
      <a href="http://localhost/leaveMarck/verifie.php?password-token='. $token . '">!استعادت الرقم السري</a>
    </div>
  </body>

  </html>';

  // Create a message
  $message = (new Swift_Message('reset your password'))
      ->setFrom(EMAIL)
      ->setTo($userEmail)
      ->setBody($body, 'text/html');

  // Send the message
  $result = $mailer->send($message);

  if ($result > 0) {
      return true;
  } else {
      return false;
  }
}
