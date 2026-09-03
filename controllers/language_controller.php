<?php
session_start();
if ($_SERVER["REQUEST_METHOD"]=='GET') {
    if (isset($_GET['lang'])) {
        $lang=$_GET['lang'];
        $redirect=$_GET['redirect'];
        $_SESSION['LANG_APP']=$lang;
        header("Location: ../views/" . $redirect);

    }

}

?>