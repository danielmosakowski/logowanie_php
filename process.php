<?php

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];
    $wiek = $_POST['wiek'];

    $blad = '';
    if(!is_numeric($wiek) || $wiek <18) {
        $blad = "Musisz mieć co najmniej 18 lat.";
    }

    $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);

    $dane = implode(";", [$imie,$nazwisko,$email,$haslo,$wiek]). "\n";
    file_put_contents("data/users.txt", $dane, FILE_APPEND);



}




?>