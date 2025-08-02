<?php

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];
    $wiek = $_POST['wiek'];


    if(!is_numeric($wiek) || $wiek <18) {
        $_SESSION['blad']= "Musisz mieć co najmniej 18 lat.";
        header("Location: index.php");
        exit;
    }

    $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);

    $dane = implode(";", [$imie,$nazwisko,$email,$haslo_hash,$wiek]). "\n";
    file_put_contents("data/users.txt", $dane, FILE_APPEND);

    $_SESSION['imie']=$imie;
    $_SESSION['nazwisko']= $nazwisko;
    $_SESSION['email']= $email;
    $_SESSION['wiek']= $wiek;

    if(!isset($_COOKIE['visits'])){
        setcookie('visits',1,time()+3600);
    } else {
        $visits = $_COOKIE['visits']+1;
        setcookie('visits', $visits, time()+3600);
    }

    header("Location: panel.php");
    exit;
} else {
    echo "Błąd: nieprawidlowe żądanie.";
}



?>