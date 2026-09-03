<?php
//SCript per gestionar el idioma de la pgaina
//Desem el nom de la pagina per fer el redirect de la pagina
$currentPage = basename($_SERVER['PHP_SELF']);
$text = [];
if ($_SESSION['LANG_APP'] == 'ca') {
  include("../language/ca.php");
}
if ($_SESSION['LANG_APP'] == 'an') {
  include("../language/an.php");
}

//nomes per mostrar productes sense passar per autenticació
$_SESSION['user'] = [
    "id" => 0,
    "name" => "Toni Fernandez",
    "username" => "admin",
    "password" => password_hash('123', PASSWORD_DEFAULT),
    "mail" => "toni.fernandez@cirvianum.cat",
    "rol" => "admin",
    "image" => 'default.png'
];


?>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../views/products.php">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
      class="bi bi-bag-check-fill" viewBox="0 0 16 16" style="margin-right:10px;">
        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
      </svg>
      <?= $text['welcome'] . $_SESSION['user']['name'] . " !" ?>
    </a>
    <ul class="nav align-items-center">

      <li class="nav-item">
        <a class="nav-link active" href="../views/cart.php">
          <?= $text['cart'] ?>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="../controllers/history_controller.php">
          <?= $text['historicCart'] ?>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">

        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"
          href="#"
          role="button"
          data-bs-toggle="dropdown"
          aria-expanded="false">

          <?= $text['language'] ?>

        </a>

        <ul class="dropdown-menu">
          <li>
            <a class="dropdown-item"
              href="../controllers/language_controller.php?lang=ca&redirect=<?= $currentPage ?>">
              <?= $text['lang_ca'] ?>
            </a>
          </li>

          <li>
            <a class="dropdown-item"
              href="../controllers/language_controller.php?lang=an&redirect=<?= $currentPage ?>">
              <?= $text['lang_an'] ?>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown ms-2">

        <a
          class="nav-link dropdown-toggle p-0"
          href="#"
          role="button"
          data-bs-toggle="dropdown"
          aria-expanded="false">

          <img
            src="../public/images/profile/<?= $_SESSION['user']['image']; ?>"
            alt="Profile image"
            class="rounded-circle"
            width="40"
            height="40"
            style="object-fit: cover;">

        </a>

        <ul class="dropdown-menu dropdown-menu-end">

          <li>
            <a class="dropdown-item" href="../views/profile.php">
              <?= $text['profile'] ?>
            </a>
          </li>

          <li>
            <a class="dropdown-item" href="../controllers/logout_controller.php">
              <?= $text['logout'] ?>
            </a>
          </li>

        </ul>

      </li>

    </ul>


  </div>
</nav>