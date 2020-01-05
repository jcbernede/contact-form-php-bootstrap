<?php
require '_inc.php';

$errors = [];
$dest_email = "email de destination";
//tableau $emails a utiliser pour utiliser une liste déroulante de contact
// il faut aussi modifier la ligne mail plus bas et activer $validator->check(service)
//$emails = ['contact@local.dev', 'info@local.dev'];


$validator = new Validator($_POST);
$validator->check('name', 'required');
$validator->check('email', 'required');
$validator->check('email', 'email');
$validator->check('email', 'email');
$validator->check('message', 'required');
//$validator->check('service', 'in', array_keys($emails));
$errors = $validator->errors();

// var_dump($errors);

if (!empty($errors)) {	
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
	header('location: ../index.php');
}else{
    $_SESSION['success'] = 1;
    $message = $_POST["message"];
    $headers = 'FROM: ' .$_POST['email'];  
    mail($dest_email, 'Message de '.$_POST['name'], $_POST["message"], $headers);
    //ligne mail contact à activer pour utiliser une liste déroulante de contact  
    //mail($emails[$_post['service']], 'Message de '.$_POST['name'], $_POST["message"], $headers);
    header('location: ../index.php');
}


?>