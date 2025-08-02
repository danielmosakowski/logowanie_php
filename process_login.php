<?php
session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];

    $plik = "data/users.txt";
    
    if (!file_exists($plik) || filesize($plik) == 0) {
        header("Location: login.php?error=1");
        exit;
    }

    $linie = file($plik, FILE_IGNORE_NEW_LINES);
    $zalogowano = false;
    
    foreach($linie as $linia) {
        if (empty(trim($linia))) continue;
        
        $dane = explode(";", $linia);
        if (count($dane) < 5) continue;
        
        list($imie, $nazwisko, $mail, $hash, $wiek) = $dane;
        
        if ($mail === $email && password_verify($haslo, $hash)) {
            $_SESSION['email'] = $email;
            $_SESSION['imie'] = $imie;
            $_SESSION['wiek'] = $wiek;
            
            $visits = ($_COOKIE['visits'] ?? 0) + 1;
            setcookie('visits', $visits, time() + 3600);
            
            header("Location: panel.php");
            exit;
        }
    }
    
    
    header("Location: login.php?error=1");
    exit;
} else {
    header("Location: index.php");
    exit;
}