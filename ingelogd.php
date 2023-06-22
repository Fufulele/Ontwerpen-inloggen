
<?php
// auteur: Azad
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // database connectie
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "login";

    try {
        // creer nieuwe PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // SQL code voor database
        $sql = "INSERT INTO inloggen (username, wachtwoord) VALUES (:username, :password)";
        
        // statement code
        $stmt = $conn->prepare($sql);
        
        // bind  code
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        
        // execute code
        $stmt->execute();
        
        echo "De gegevens zijn succesvol naar de database verstuurd.";
    } catch(PDOException $e) {
        echo "Er is een Fout opgetreden bij het versturen naar de database: " . $e->getMessage();
    }
}
?>
