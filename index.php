<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Formularz rejestracyjny</title>
</head>

<body>


</body>

<h2>Formularz rejestracyjny</h2>

<?php
    if ($blad){
        echo htmlspecialchars($blad);
    }
?>

<form method="POST" action="processs.php">
    <label>Imię:</label>
    <input type="text" name="imie" required>

    <label>Nazwisko:</label>
    <input type="text" name="nazwisko" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Hasło:</label>
    <input type="password" name="haslo" required>

    <label>Wiek:</label>
    <input type="number" name="wiek" required>

    <input type="submit" value="Zarejestruj">

</form>

</body>

</html>