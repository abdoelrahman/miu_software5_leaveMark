<?php

function validateProduct($post) {

    $errors = array();

if(empty($post['title'])) {
    array_push($errors, "العنوان  مطلوب");
}

if(empty($post['description'])) {
    array_push($errors, "الوسف مطلوب");
}
if(empty($post['section_id'])) {
    array_push($errors, "القسم مطلوب");
}

    $existingPost = selectOne('products',['title' => $post['title']]);
    if($existingPost) {
      if (isset($post['update-post']) && $existingPost['id'!= $post['id']] ) {
        array_push($errors, "العنوان نوجود بلفعل");      }

    // if (isset($post['add-product'])){
    //   array_push($errors, "العنوان موجود بلفعل");
    // }
    }
    return $errors;
}
















?>
