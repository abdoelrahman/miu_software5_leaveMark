<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH . "/app/controllers/emailController.php");
// require_once 'emailController.php';
$table = 'users';
$admin_users =selectAll($table,['admin'=> 1]);
$errors = array();
$username = '';
$admin="";
$email = '';
$password = '';
$id='';
$passwordConf = '';
$phone_num ='';
$sections = selectAll('sections');



function loginUser($user) {
    $email =$user['email'];
    $token =$user['token'];
    sendVerificationEmail($email, $token);
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['phone_num'] = $user['phone_num'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['admin'] = $user['admin'];

    $_SESSION['message'] = '...........اهلا بك.........................';
    $_SESSION['type'] = 'success';


    if ($user['verified'] ==1) {
      if($_SESSION['admin']) {
          header('location: ' . BASE_URL . '/admin/dashboard.php');
      }else{
          header('location: ' . BASE_URL . '/index.php');
      }
    }else {
      header('location: ' . BASE_URL . '/verifie.php');
    }

exit();
}

if(isset($_POST['register-btn']) || isset($_POST['create-admin'])) {
$errors = validateUser($_POST);
if(count($errors)===0) {
  unset($_POST['register-btn'], $_POST['passwordConf'],$_POST['create-admin']);
  $token = bin2hex(random_bytes(50));
  $_POST['token'] = $token;
  $_POST['user_image'] = 'man.png';
  $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
  if (isset($_POST['admin'])) {
    $_POST['admin'] = 1;
    $_SESSION['verified'] = true;
    $user_id = create($table, $_POST);
    $_SESSION['message']='تم انشاء مستخدم بنجاح';
    $_SESSION['type']='success';
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
  }else {
    $_POST['admin'] = 0;
    $_SESSION['verified'] = false;
    $user_id = create($table, $_POST);
    $user = selectOne($table,['id' => $user_id]);
    loginUser($user);
  }

 }else{

        $username = $_POST['username'];
        $admin = isset($_POST['admin'])?1:0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone_num   = $_POST['phone_num'];
        $passwordConf = $_POST['passwordConf'];
 }

}
/////////////////////////////

if (isset($_GET['id'])) {

  $user= selectOne($table,['id' => $_GET['id']]);
  $id = $user['id'];
  $username = $user['username'];
  $phone_num=$user['phone_num'];
  $user_image =$user['user_image'];
  $admin = isset($user['admin'])?1:0;
  $email = $user['email'];
  $token=$user['token'];
  $verified=$user['verified'];

}
if (isset($_POST['update_user'])) {
  $errors = validateUser($_POST);
  if (!empty($_FILES['user_image'])) {
    $image_name = time().'_'. $_FILES['user_image']['name'];
    $destination = ROOT_PATH."/assets/img/".$image_name;
    $result =move_uploaded_file($_FILES['user_image']['tmp_name'],$destination);
    if ($result) {
      $_POST['user_image']=$image_name;
      // dd($_post['image']);
    }else {
        array_push($errors,'فشل في التحميل.');
    }
  }else {
    array_push($errors,'الصوره مطلوبه.');
  }
  if(count($errors)===0) {
    $id= $_POST['id'];

    unset( $_POST['passwordConf'],$_POST['update_user'],$_POST['id']);
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $_POST['admin'] = isset($_POST['admin'])?1:0;
    $_POST['token']='22';
    $_POST['verified']=1;
    // dd($_POST);
    $count= update($table,$id, $_POST);
    $_SESSION['message']='تم تحديث المعلومات بنجاح';
    $_SESSION['type']='success';

   if ($admin == 1){
      header('location: ' . BASE_URL . '/admin/users/index.php?id='.$_SESSION['id'] );
    }else {
        header('location: ' . BASE_URL . '/users/profile/index.php?id='.$_SESSION['id']);
      }

    exit();


   }else{

          $username = $_POST['username'];
          $admin = isset($_POST['admin'])?1:0;
          $email = $_POST['email'];
          $password = $_POST['password'];
          $phone_num   = $_POST['phone_num'];
          $passwordConf = $_POST['passwordConf'];
   }

}

if(isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if(count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if($user && password_verify($_POST['password'], $user['password'])) {
            loginUser($user);
        }else{
            array_push($errors, "الرقم السري خطأ.!");
        }
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
}
if (isset($_GET['delete_id'])) {
  $count =delete($table,$_GET['delete_id']);
  $_SESSION['message']='admin user deleted successfully';
  $_SESSION['type']='success';
  header('location: ' . BASE_URL . '/admin/users/index.php');
  exit();
}



if(isset($_POST['forget-password'])){
  $email=$_POST['email'];
  if (empty($_POST['email'])) {
      $errors['email'] = 'الايميل مطلوب تتستعد الركم السري.';
  }
  if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email address";
  }
  if (count($errors) ===0) {
    $sql ="SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result=mysqli_query($conn,$sql);
    $user=mysqli_fetch_assoc($result);
    // $user =selectOne($table,['email'=>$email]);
    $token =$user['token'];
    sendPasswordRestLink($email,$token);
    header('location: password_message.php');
    exit(0);
  }

}
if (isset($_POST['reset-password-btn'])) {

  $email =$_SESSION['email'];
  $password=$_POST['password'];
  $passwordConf=$_POST['passwordConf'];
  if (empty($_POST['password'] || empty($passwordConf))) {
      array_push($errors, "الرقم السري مطلوب");
  }

  if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
      array_push($errors, "الرقمين السرين غير متطابقان");
  }
  $password = password_hash($password,PASSWORD_DEFAULT);
  $email=$_SESSION['email'];
  if (count($errors)==0) {
    $sql="UPDATE users SET password='$password'WHERE email='$email'";
    $result =mysqli_query($conn,$sql);
    if ($result) {
      header('location: login.php');
      exit(0);
    }
  }
}
////////////////////

function resetPassword($token){
  global $conn;
  $sql="SELECT * FROM users WHERE token='$token' LIMIT 1";
  $result =mysqli_query($conn,$sql);
  $user= mysqli_fetch_assoc($result);

  // $user =selectOne('users',['token'=>$token]);
  $_SESSION['email']=$user['email'];
  header('location: reset_password.php');
  exit(0);
}
