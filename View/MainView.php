<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <title>Topicos Especiais</title>
</head>
<body>
  <div class="container">
    <h1>Prova 3</h1>

    <form action="create.php" method="POST">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php include 'read.php'; ?>
      </tbody>
    </table>
    <button onclick="window.location.href = 'LoginView.php'" class="btn btn-primary btn-block">Logout</button>
  </div>
</body>
</html>
