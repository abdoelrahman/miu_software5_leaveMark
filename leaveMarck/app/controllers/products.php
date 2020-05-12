<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateProduct.php");
$table='products';
$sections =selectAll('sections');
$products=selectAll($table);

$errors=array();
$title="";
$section_id="";
$description="";
$published="";
$sections = selectAll('sections');

if(isset($_GET['id'])){
   $product= selectOne($table,['id'=>$_GET['id']]);

   $id=$product['id'];
   $title=$product['title'];
   $section_id = $product['section_id'];
   $image =$product['image'];
   $description=$product['description'];
   $published=$product['published'];

}
if (isset($_GET['published']) && isset($_GET['p_id'])) {
  $published=$_GET['published'];
  $p_id=$_GET['p_id'];
  //update
  $count = Update($table,$p_id,['published'=> $published]);
  $_SESSION['message']='تم تغير حالة النشر بنجاح.';
  $_SESSION['type'] = 'success';
  if ($_SESSION['admin']) {
    header('location: ' . BASE_URL . '/admin/products/index.php');
  }else {
    header('location: ' . BASE_URL . '/users/product/index.php');
  }
  exit();

}


if(isset($_POST['add-product'])){
  $errors=validateProduct($_POST);
    if (!empty($_FILES['image'])) {
      $image_name = time().'_'. $_FILES['image']['name'];
      $destination = ROOT_PATH."/assets/img/".$image_name;
      $result =move_uploaded_file($_FILES['image']['tmp_name'],$destination);
      if ($result) {
        $_POST['image']=$image_name;

      }else {
          array_push($errors,'فشل في التحميل.');
      }
      
    }else {
      array_push($errors,'الصوره مطلوبه.');
    }

   if (count($errors) ===0) {
     unset($_POST['add-product']);
     // dd($_POST['image']);
     $_POST['user_id']=$_SESSION['id'];
     $_POST['published']=isset($_POST['published'])? 1 : 0;
     $_POST['description']=$_POST['description'];
     $product_id = create($table, $_POST);
     $_SESSION['message']='تم انشاء المعروض بنجاح.';
     $_SESSION['type'] = 'success';
     if ($_SESSION['admin']) {
       header('location: ' . BASE_URL . '/admin/products/index.php');
     }else {
       header('location: ' . BASE_URL . '/users/product/index.php');
     }
   }else {

     $title=$_POST['title'];
     $destination=$_POST['description'];
     $section_id =$_POST['section_id'];
     $published =isset($_POST['published'])? 1 : 0;
   }

}
if (isset($_GET['delete_id'])) {
  $count =delete($table,$_GET['delete_id']);
  $_SESSION['message']='تم مسح المنشور بنجاح';
  $_SESSION['type'] = 'success';
  if ($_SESSION['admin']) {
    header('location: ' . BASE_URL . '/admin/products/index.php');
  }else {
    header('location: ' . BASE_URL . '/users/product/index.php');
  }



}
if (isset($_POST['update-product'])) {
  $t=  $_FILES['image']['name'];
  $image_name = time().'_'. $t;
  // dd($image_name);
  $errors=validateProduct($_POST);
  if (!empty($_FILES['image'])) {
    $destination = ROOT_PATH."/assets/img/".$image_name;
    $result =move_uploaded_file($_FILES['image']['tmp_name'],$destination);
    if ($result) {
      $_POST['image']=$image_name;
    }else {
        array_push($errors,'فشل في التحميل.');
    }
  }else {
    array_push($errors,'الصوره مطلوبه');
  }



  if (count($errors) ===0) {
    $id=$_POST['id'];
    unset($_POST['update-product'],$_POST['id']);

    $_POST['user_id']=$_SESSION['id'];
    $_POST['published']=isset($_POST['published'])? 1 : 0;
    //
    $post_id = Update($table,$id,$_POST);
    $_SESSION['message']='تم تحديت المعروض بنجاح';
    $_SESSION['type'] = 'success';
    if ($_SESSION['admin']) {
      header('location: ' . BASE_URL . '/admin/products/index.php?p_id='.$_SESSION['id']);
    }else {
      header('location: ' . BASE_URL . '/users/product/index.php?p_id='.$_SESSION['id']);
    }
  }else {

    $title=$_POST['title'];
    $description=$_POST['description'];
    $section_id =$_POST['section_id'];
    $published =isset($_POST['published'])? 1 : 0;
  }

}
