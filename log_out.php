<?php
session_start();

if (isset($_POST['logout'])) {
    // Unset alle sessievariabelen
    $_SESSION = array();

    // Vernietig de sessie
    session_destroy();

    // Stuur door naar de homepage of een andere gewenste bestemming
    header("Location: index_.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>
    <form method="post" action="">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>

