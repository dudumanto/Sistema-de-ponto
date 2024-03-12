<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa; /* Adicione uma cor de fundo mais clara */
    }

    .login-container {
      max-width: 400px;
      margin: auto;
      margin-top: 100px;
      background-color: #fff; /* Adicione uma cor de fundo branca */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Adicione uma sombra suave */
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
    }

    button {
      background-color: #007bff; /* Cor de fundo azul Bootstrap padrão */
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3; /* Cor de fundo azul escuro ao passar o mouse */
    }
  </style>
</head>
<body>

<div class="container login-container">
  <h2>Cadastro</h2>
  <form method="post" action="{{ route('user.register') }}">
    @csrf

    <div class="form-group">
      <label for="name">Nome:</label>
      <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
      <label for="password">Senha:</label>
      <input type="password" class="form-control" name="password" required>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
