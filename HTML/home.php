<?php 
session_start();
$_SESSION['page'] = "Accueil";
require_once '../COMPONENTS/navbar.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require '../COMPONENTS/links.php'; ?>
    <title>BibliotheKa | <?= $_SESSION['page'] ?></title>
</head>
<body>
<div class="container col-xxl-8 px-4 py-5 mt-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="../img/1.jpg" class="d-block mx-lg-auto img-fluid fade_home" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">BibliotheKa</h1>
        <p class="lead">Où les mondes prennent vie entre les pages et les rêves prennent forme.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <?php if (!isset($_SESSION['login'])) { 
          echo '<button type="button" class="btn btn-warning btn-lg px-4 me-md-2"><a class="a_link" href="./connexion.php">Connexion</a></button>';
            }
          ?>
          <button type="button" class="btn btn-outline-warning btn-lg px-4"><a class="a_link" href="./books.php">Voir les livres</a></button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>