<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horário Oficial</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .time-container {
      text-align: center;
      padding: 20px;
      background-color: #f8f9fa;
    }
    .button-container {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<div class="container">
<a href="{{ route('ver-horarios') }}" class="btn btn-primary">VER</a>
<a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
  <div class="time-container">
    <h3>Horário Oficial:</h3>
    <p id="official-time"></p>
  </div>
  <div class="button-container">
  <button type="button" class="btn btn-primary" onclick="marcarPonto({{ Auth::user()->id }})">Ponto</button>
  </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  // Função para obter e exibir o horário oficial
  function displayOfficialTime() {
    var now = new Date();
    var options = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: false };
    var formattedTime = now.toLocaleTimeString('en-US', options);
    document.getElementById('official-time').innerText = formattedTime;
  }

  // Atualize o horário oficial a cada segundo
  setInterval(displayOfficialTime, 1000);

  // Inicialize o horário oficial quando a página é carregada
  displayOfficialTime();
</script>
<script>
  function marcarPonto(userId) {
    $.ajax({
      url: '/marcar-ponto',
      method: 'POST',
      data: {
        userId: userId,
        _token: '{{ csrf_token() }}'
      },
      success: function(response) {
        alert(response.message); // Exibe a mensagem de sucesso retornada pelo controlador
      },
      error: function(xhr, status, error) {
        console.error(error); // Exibe erros no console, se houver
      }
    });
  }
</script>

</body>
</html>