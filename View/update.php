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

// Verifica se o ID do registro a ser atualizado foi fornecido
if (!isset($_GET['id'])) {
  header('Location: index.php');
  exit();
}

// ID do registro a ser atualizado
$id = $_GET['id'];

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtém os dados do formulário
  $name = $_POST['name'];
  $email = $_POST['email'];

  // Prepara a consulta SQL
  $stmt = $conn->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':id', $id);

  // Executa a consulta SQL
  $stmt->execute();

  // Redireciona para a página inicial
  header('Location: MainView.php');
  exit();
}

// Consulta SQL para obter os dados do registro a ser atualizado
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch();

// Verifica se o registro existe
if (!$row) {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <title>CRUD Example - Update</title>
</head>
<body>
  <div class="container">
    <h1>CRUD Example - Update</h1>

    <!-- Formulário de atualização -->
    <h2>Update</h2>
    <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</body>
</html>
