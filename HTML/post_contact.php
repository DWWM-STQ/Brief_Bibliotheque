<?php
session_start();
$errors = [];
$emails = ['contatct@gmail.com', 'commercial@gmail.com', 'administrateur@gmail.com'];
if (!array_key_exists('name', $_POST) || $_POST['name'] === '') {
    $errors['name'] = "Vous n'avez pas renseigné votre nom";
}

if (!array_key_exists('email', $_POST) || $_POST['email'] === '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Vous n'avez pas renseigné un email valide";
}

if (!array_key_exists('message', $_POST) || $_POST['message'] === '') {
    $errors['message'] = "Vous n'avez pas renseigné votre message";
}

    


if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    header('Location: ./contact.php');
    exit(); 
} else {
    $_SESSION['success'] = 1;
    $message = $_POST['message'];
    $headers = 'From: site@local.dev' . $_POST['email'];
    header('Location: ./contact.php');
    exit();
    mail($emails[$_POST ['service']],'formulaire de contact' . $_POST['name'], $message, $headers);
}

?>
