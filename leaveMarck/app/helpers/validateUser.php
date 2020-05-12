<?php

function validateUser($user) {

    $errors = array();

if(empty($user['username'])) {
    array_push($errors, "الاسم مطلوب");
}

if(empty($user['email'])) {
    array_push($errors, "البريد الالكتروني مطلوب");
}

if(empty($user['password'])) {
    array_push($errors, "الرقم السري مطلوب");
}

if(($user['passwordConf'])!== $user['password']) {
    array_push($errors, "الرقمين السرين غير متطابقان");
}

    $existingUser = selectOne('users',['email' => $user['email']]);

    if($existingUser) {
      if (isset($post['update_user']) && $existingUser['id'!= $post['id']] ) {
        array_push($errors, "البريد الالكتروني يوجد بلفعل لدينا");      }
    }
    if (isset($_POST['register-btn'])||isset($post['create-admin'] )){
      array_push($errors, "البريد الالكتروني يوجد بلفعل لدينا");
    }

    return $errors;
}

function validateLogin($user) {

    $errors = array();

if(empty($user['username'])) {
    array_push($errors, "الاسم مطلوب");
}

if(empty($user['password'])) {
    array_push($errors, "الرقم السري مطلوب ");
}

    return $errors;
}
















?>
