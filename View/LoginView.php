<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <!-- Adicione os links para os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url(https://source.unsplash.com/random/1920×1080/?nature,water);
            background-size: cover;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-container .form-control {
            border-radius: 0;
        }

        .login-container .btn {
            border-radius: 0;
            background-color: #007bff;
            border-color: #007bff;
        }

        .login-container .btn:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <h1>Tela de Login</h1>
                        <div class="form-group">
                            <label for="username">Usuário</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Digite seu usuário">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha">
                        </div>
                        <div class="text-center">
                            <button onclick="window.location.href = 'MainView.php'" class="btn btn-primary btn-block">Entrar</button>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Adicione os links para os arquivos JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>