<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateSections.php");
$errors=array();
$id='';
$name='';
$description='';
$table = 'sections';
$sections = selectAll($table);




if(isset($_POST['add-section'])) {
  //
  $errors=validateSection($_POST);
  if (!empty($_FILES['image_section'])) {
    // dd($_FILES);
    $image_name = time().'_'. $_FILES['image_section']['name'];

    $destination = ROOT_PATH."/assets/img/".$image_name;
    $result =move_uploaded_file($_FILES['image_section']['tmp_name'],$destination);
    if ($result) {
      $_POST['image_section']=$image_name;
      // dd($_post['image']);
      // dd($_POST);
    }else {
        array_push($errors,'فشل قي التحميل');
    }
  }else {
    array_push($errors,'الصوره مطلوبه');
  }
  if (count($errors) ===0) {
     unset($_POST['add-section']);
     $topic_id = create('sections', $_POST);
     $_SESSION['message'] = 'تم انشاء القسم بنجاح.';
     $_SESSION['type'] = 'success';
     header('location: ' . BASE_URL . '/admin/sections/index.php');
     exit();
  }else {
    $name=$_POST['name'];
    $description=$_POST['description'];

  }

}

if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $section= selectOne($table,['id'=>$id]);
  $id = $section['id'];
  $name =$section['name'];
  $description =$section['description'];
  $image_section =$section['image_section'];
}
if (isset($_GET['del_id']) ){
  $id =$_GET['del_id'];
  $count=delete($table,$id);
}
if(isset($_POST['update-section'])){

  $errors=validateSection($_POST);
  if (!empty($_FILES['image_section'])) {
    $image_name = time().'_'. $_FILES['image_section']['name'];

    $destination = ROOT_PATH."/assets/img/".$image_name;
    $result =move_uploaded_file($_FILES['image_section']['tmp_name'],$destination);
    if ($result) {
      $_POST['image_section']=$image_name;
      // dd($_post['image']);
      // dd($_POST);
    }else {
        array_push($errors,'فشل قي التحميل');
    }
  }else {
    array_push($errors,'الصوره مطلوبه');
  }
  if (count($errors) ===0) {
    $id=$_POST['id'];
    unset($_POST['update-section'],$_POST['id']);
    $topic_id= Update($table,$id,$_POST);
    $_SESSION['message'] = 'تم تعديل القسم بنجاح';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/sections/index.php');
    exit();
  }else {
    // $id=$_POST['id'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $image_section=$_POST['image_section'];
  }

}
