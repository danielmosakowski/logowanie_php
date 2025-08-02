<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Panel uzytkownika</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        p { margin-bottom: 10px; }
    </style>
</head>

<body>
    <?php
        if(!isset($_SESSION['email'])){
            header("LocationL index.php");
            exit;
        }

        echo "<h2>Witaj, ". htmlspecialchars($_SESSION["imie"]) ."</h2>";
        
        echo "<p><strong>Email: </strong> " .htmlspecialchars($_SESSION["email"]) . "</p>";
        echo "<p><strong>Wiek: </strong> " .htmlspecialchars($_SESSION["wiek"]) . "</p>";
        echo "<p><strong>Adres IP: </strong> " .$_SERVER['REMOTE_ADDR'] ."</p>";
        echo "<p><strong>Przeglądarka: </strong> " .$_SERVER['HTTP_USER_AGENT'] ."</p>";

        $visits= $_COOKIE['visits'] ?? 1;
        echo "<p><strong>Liczba odwiedzin: </strong> $visits </p>";

        $users = [];
        $plik ="data/users.txt";

        /*
        if(file_exists($plik)){
            $linie = file($plik, FILE_IGNORE_NEW_LINES);
            foreach ($linie as $linia){
                $czesci = explode(";", $linia);
                $users[] = $czesci;
            }
        }
        */

        $linie = file($plik, FILE_IGNORE_NEW_LINES);
        foreach($linie as $linia){
            list($imie, $nazwisko, $email, $haslo, $wiek)= explode(";", $linia);
            $users[]=[
                "imie" => $imie,
                "nazwisko" => $nazwisko,
                "email" => $email,
                "haslo" => $haslo,
                "wiek" => $wiek

            ];
        }

        echo "<h3>Lista zarejestrowanych uzystkownikow: </h3>";
        foreach ($users as $user){
            echo "<p>" .htmlspecialchars($user["imie"]) ." " .htmlspecialchars($user["nazwisko"]) ."</p>";
        }
    ?>

</body>















</html>