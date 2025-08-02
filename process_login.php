<?php

session_start();

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];

    $users = [];
    $plik ="data/users.txt";


    $linie = file($plik, FILE_IGNORE_NEW_LINES);
    foreach($linie as $linia){
        list($imie, $nazwisko, $mail, $hash, $wiek)= explode(";", $linia);
        if ($mail === $email && password_verify($haslo, $hash)){
            $_SESSION['email'] = $email;
            $_SESSION['imie'] = $imie;
        }

        setcookie('visits', ($_COOKIE['visits'] ?? 0)+1, time()+3600);
        header("Location: panel.php");
        exit;
    }

}