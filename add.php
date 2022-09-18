<?php
 require_once('user_validator.php');
 require_once("Database.php") ;
 require_once('student.php');

$errors = [];

if(isset($_POST['submit'])){
    // validate entries
    // session_start() ;
    $validation = new UserValidator($_POST);
    $errors = $validation->validateForm();
    
    // if errors is empty --> save data to db
    if(count($errors) == 0){
        $data = $validation->getData();
        $student = new Student($data);
        $student->signUp() ;
    }
}
?>