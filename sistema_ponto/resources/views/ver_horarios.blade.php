<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Horários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

</head>
<body>
    <div class="container">
        <h1>Horários de todas as pessoas</h1>
        <table class="table dataTable">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data</th>
                    
                    <th>Entrada</th>
                    <th>Saída</th>
                    <th>Saldo (Horas)</th>
                    <th>Saldo (Minutos)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horarios as $horario)
                <tr>
                    <td>{{ $horario->user->name }}</td>
                    <td>
                        {{ Carbon\Carbon::parse($horario->ponto_time)->format('d/m/Y') }}
                    </td>
                    <td>
                        {{ Carbon\Carbon::parse($horario->entrada)->format('H:i') }}
                    </td>
                    <td>
                        {{ Carbon\Carbon::parse($horario->saida)->format('H:i') }}
                    </td>
                    <td>
                        @if($horario->saida)
                            {{ \Carbon\Carbon::parse($horario->saida)->diffInHours($horario->entrada) }} horas
                        @else
                            Ainda trabalhando
                        @endif
                    </td>
                    <td>
                        @if($horario->saida)
                            {{-- Convert difference in seconds to minutes and round down --}}
                            {{ floor(\Carbon\Carbon::parse($horario->saida)->diffInSeconds($horario->entrada) / 60) }} minutos
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
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
</script>
</html>