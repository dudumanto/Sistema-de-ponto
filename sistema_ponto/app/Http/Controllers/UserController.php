<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserTimeLog; // Importe o modelo UserTimeLog
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return view('inicio');
        }else{
            return view('login');
        }
    }

    public function inicio(){
        return view('inicio');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/'); // Redireciona para a página inicial após o logout
    }

    public function marcarPonto(Request $request)
{
    $userId = $request->userId;

    // Verifica se já existe um registro de entrada para o usuário na data atual
    $userTimeLog = UserTimeLog::where('user_id', $userId)
                                ->whereDate('ponto_time', now()->toDateString())
                                ->first();

    if ($userTimeLog) {
        // Se já existe um registro de entrada, atualize o horário de saída
        $userTimeLog->saida = now();
        $userTimeLog->save();

        // Calcular o tempo total trabalhado em segundos
        $entrada = strtotime($userTimeLog->entrada);
        $saida = strtotime($userTimeLog->saida);
        $tempoTrabalhado = $saida - $entrada;

        // Horas esperadas de trabalho em segundos (8 horas = 28800 segundos)
        $horasEsperadas = 8 * 3600;

        // Calcular o saldo de horas em segundos
        $saldo = $tempoTrabalhado - $horasEsperadas;

        return response()->json([
            'message' => 'Ponto de saída marcado com sucesso!',
            'saldo' => $saldo // Retorna o saldo de horas em segundos
        ]);
    } else {
        // Se não existe um registro de entrada, crie um novo registro de entrada
        $userTimeLog = new UserTimeLog();
        $userTimeLog->user_id = $userId;
        $userTimeLog->ponto_time = now(); // Marca o horário atual como entrada
        $userTimeLog->entrada = now();
        $userTimeLog->save();
        return response()->json(['message' => 'Ponto de entrada marcado com sucesso!']);
    }
}

public function verHorarios()
{
    // Recuperar o ID do usuário autenticado
    $userId = Auth::id();

    // Verificar se o usuário autenticado é um administrador
    if (Auth::user()->is_admin) {
        // Se for um administrador, recuperar todos os horários
        $horarios = UserTimeLog::all();
    } else {
        // Se não for um administrador, recuperar apenas os horários do usuário atual
        $horarios = UserTimeLog::where('user_id', $userId)->get();
    }

    // Passar os horários para a view
    return view('ver_horarios', ['horarios' => $horarios]);
}
public function showRegistrationForm()
{
    return view('cadastro');
}

public function register(Request $request)
{
    // Validação dos dados do formulário
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8',
    ]);

    // Criação do novo usuário
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    // Autenticação do novo usuário
    Auth::login($user);

    // Redirecionamento após o cadastro
    return redirect('/inicio')->with('success', 'Cadastro realizado com sucesso!');
}public function iniciar()
{
    //verifica se é admin, se for vai aparecer o botão de cadastras novos users
    $isAdmin = false;

    if (Auth::check() && Auth::user()->is_admin) {
        $isAdmin = true;
    }

    return view('inicio', ['isAdmin' => $isAdmin]);
}
    
}
