<?php
// auteur: Azad
function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "je bent verbonden met de database";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "De verbinding is helaas mislukt: " . $e->getMessage();
        return null;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // hier gaan de wachtwoord en gebruikersnaam naar de database
    
    echo "Gebruikersnaam:" . $username . "<br>";
    echo "Wachtwoord:" . $password;
}

// Gegevens
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // SQL insert om het in de database te krijgen
    $sql = "SELECT INTO users (username, password) VALUES ('$username', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "De gegevens zijn succesvol naar de database verstuurd.";
    } else {
        echo "Er is een fout bij het versturen van de gegevens naar de database: " . $conn->error;
    }
}
?>

<html>
<title> Inlog pagina</title>
</head>
<body>
    <br>
    <h2>inloggen via hier</h2>
    <form action="index_.php" method="POST">
        <label for="username"> De gebruikersnaam:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">De Wachtwoord:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="login">
    </form>
    <br>
   
    <a href="registratie.php">registreer hier</a> <br>
    <a href="log_out.php">log uit</a>
</body>
</html>