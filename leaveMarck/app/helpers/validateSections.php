<?php

function validateSection($section) {

    $errors = array();

if(empty($section['name'])) {
    array_push($errors, "name of topic is requierd.");
}



    $existingTopic = selectOne('sections',['name' => $section['name']]);
    // if($existingUsers) {
    // array_push($errors, "name Already Exists");
    // }

    if($existingTopic) {
      if (isset($post['update-sections']) && $existingTopic['id'!= $post['id']] ) {
        array_push($errors, " nmae Already Exists");      }
    }
    if (isset($post['add-topic'])){
      array_push($errors, "name Already Exists");
    }

    return $errors;
}














?>
