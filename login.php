<?php
session_start();
if(isset($_SESSION['email'])) {
    header("Location: panel.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl";
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>

<body>
    <h2>Logowanie</h2>
    <?php
        if (isset($_GET['error'])) {
           echo '<p style="color:red;">Nieprawidłowy email lub hasło.</p>';
        }
        ?>


    <form method="POST" action="process_login.php">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Hasło:</label>
        <input type="password" name="haslo" required>

        <input type="submit" value="Zaloguj">

    </form>
    <a href="index.php" class="back-link">Powrót do strony głównej</a>
</body>
</html>

