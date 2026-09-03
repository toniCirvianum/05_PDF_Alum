<?php
function regex_username($username)
{
    $regex = '/^[a-z0-9]{1,10}$/';
    if (preg_match($regex, $username)) {
        return true;
        // return 1;
    }
    return false;
    // return 0;
}

function regex_password($password)
{
    $regex = '/^[a-z0-9]{1,10}$/';
    if (preg_match($regex, $password)) {
        return true;
        // return 1;
    }
    return false;
    // return 0;
}

function checkUser($username, $password, $users)
{
    foreach ($users as $user) {
        if ($username == $user['username']) {
            if (password_verify($password,$user['password'])) {
                return $user;
            }
        }
    }
    return false;
}

function userLogged()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['user'])) {
        header('Location: ../views/home.php');
        exit;
    }
    return true;
}

function checkSamePassword($pass1, $pass2)
{
    $r = ($pass1 === $pass2) ? true : false;
    return $r;
}

function userExist($users, $username)
{
    // echo $username;
    // prettyEcho($users);
    foreach ($users as $user) {
        if ($user['username'] == $username) {
            // echo "<br> usuari trobat! <br>";
            return true;
        }
    }
    return false;
}

function mailCorrect($mail)
{
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        return 1;
    }
    return 0;
}
