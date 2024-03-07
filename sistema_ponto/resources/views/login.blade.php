<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .login-container {
      max-width: 400px;
      margin: auto;
      margin-top: 100px;
    }
  </style>
</head>
<body>

<div class="container login-container">
  <h2 class="text-center mb-4">Login</h2>
  <form action="{{route('login')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="login">Email</label>
      <input type="text" name="email" class="form-control" id="login" placeholder="Enter login">
    </div>
    <div class="form-group">
      <label for="password">Senha</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Login</button>
  </form>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
