<?php
print_r ($_ENV);

echo "<br>";

$hostname = $_ENV["HOSTNAME"];

echo "<br>";

$host = 'db';
$port = "3306";
$dbname = 'mydatabase';
$username = 'root';
$password = '123456';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM amigos";
    $stmt = $pdo->query($query);
    $contador = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $nome = $row['nome'];
        $integer_parse_string = strval($contador);

        echo("Registro: $integer_parse_string Nome: $nome <br>");
        $contador +=1;
    }

    $pdo = null;
} catch (PDOException $e) {
    echo "Erro de conexao: " . $e->getMessage();
}
?>
