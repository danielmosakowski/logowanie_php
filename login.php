<!DOCTYPE html>
<html lang="pl";
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>

<body>
    <form method="POST" action="process_login.php">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Hasło:</label>
        <input type="password" name="haslo" required>

        <input type="submit" value="Zaloguj">

    </form>
</body>
</html>

