<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Horários</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Horários de todas as pessoas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Horário</th>
                    <th>Entrada</th>
                    <th>Saída</th>
                    <th>Saldo (Horas)</th>
                    <th>Saldo (Segundos)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horarios as $horario)
                <tr>
                    <td>{{ $horario->user->name }}</td>
                    <td>{{ $horario->ponto_time }}</td>
                    <td>{{ $horario->entrada }}</td>
                    <td>{{ $horario->saida }}</td>
                    <td>
                        @if($horario->saida)
                            {{ \Carbon\Carbon::parse($horario->saida)->diffInHours($horario->entrada) }} horas
                        @else
                            Ainda trabalhando
                        @endif
                    </td>
                    <td>
                        @if($horario->saida)
                            {{ \Carbon\Carbon::parse($horario->saida)->diffInSeconds($horario->entrada) }} segundos
                        @else
                            -
                        @endif
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('inicio') }}" class="btn btn-primary">Voltar</a>
    </div>
</body>
</html>
