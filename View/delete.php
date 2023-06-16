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

// Verifica se o ID do registro a ser excluído foi fornecido
if (!isset($_GET['id'])) {
  header('Location: MainView.php');
  exit();
}

// ID do registro a ser excluído
$id = $_GET['id'];

// Prepara a consulta SQL para excluir o registro
$stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
$stmt->bindParam(':id', $id);

// Executa a consulta SQL
$stmt->execute();

// Redireciona para a página inicial
header('Location: MainView.php');
exit();
?>
