<?php
// Configurações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'myapp';
$username = 'bruno';
$password = 'bpds';

// Conexão com o banco de dados
try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die('Error: ' . $e->getMessage());
}

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtém os dados do formulário
  $name = $_POST['name'];
  $email = $_POST['email'];

  // Prepara a consulta SQL
  $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);

  // Executa a consulta SQL
  $stmt->execute();

  // Redireciona para a página inicial
  header('Location: MainView.php');
  exit();
}
?>
