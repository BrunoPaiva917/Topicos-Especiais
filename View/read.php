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

// Consulta SQL para obter todos os registros da tabela users
$stmt = $conn->query('SELECT * FROM users');

// Exibe os registros na tabela
while ($row = $stmt->fetch()) {
  echo '<tr>';
  echo '<td>' . $row['name'] . '</td>';
  echo '<td>' . $row['email'] . '</td>';
  echo '<td>';
  echo '<a href="update.php?id=' . $row['id'] . '">Edit</a>';
  echo ' | ';
  echo '<a href="delete.php?id=' . $row['id'] . '">Delete</a>';
  echo '</td>';
  echo '</tr>';
}
?>
