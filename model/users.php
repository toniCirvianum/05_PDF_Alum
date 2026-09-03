<?php
$users = [
    [
        "id" => 0,
        "name" => "Toni Fernandez",
        "username" => "admin",
        "password" => password_hash('123', PASSWORD_DEFAULT),
        "mail" => "toni.fernandez@cirvianum.cat",
        "rol" => "admin",
        "image" => 'default.png'
    ],
    [
        "id" => 1,
        "name" => "Raquel Boronat",
        "username" => "raquel",
        "password" => password_hash('123', PASSWORD_DEFAULT),
        "mail" => "raquel.boronat@cirvianum.cat",
        "rol" => "user",
        "image" => 'default.png'
    ]
];
$_SESSION['users'] = $users;
