<?php
//SCript per gestionar el idioma de la pgaina
//Desem el nom de la pagina per fer el redirect de la pagina
$currentPage = basename($_SERVER['PHP_SELF']);
$text=[];
if ($_SESSION['LANG_APP']=='ca') {
  include("../language/ca.php");
} 
if ($_SESSION['LANG_APP']=='an') {
  include("../language/an.php");
} 


?>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../views/home.php">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-people-fill" viewBox="0 0 16 16" style="margin-right:10px;">
        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
      </svg>
      <?= $text['title_index'] ?>
    </a>
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link active" href="../views/login.php"><?= $text['login'] ?> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../views/register.php"><?= $text['register'] ?></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?= $text['language'] ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="../controllers/language_controller.php?lang=ca&redirect=<?= $currentPage ?>"><?= $text['lang_ca'] ?></a></li>
          <li><a class="dropdown-item" href="../controllers/language_controller.php?lang=an&redirect=<?= $currentPage ?>"><?= $text['lang_an'] ?></a></li>
        </ul>
      </li>


    </ul>

  </div>
</nav>