<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorizeAction();
        $users = User::orderBy('name')->get();
        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorizeAction();

        $data = $request->validate([
            'role' => 'required|string|in:administrador,publicador,aluno,publico',
        ]);

        $user->update(['role' => $data['role']]);

        return redirect()->back()->with('status', 'Perfil atualizado.');
    }

    public function create()
    {
        $this->authorizeAdmin();

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:administrador,publicador,aluno,publico',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);

        return redirect()->route('admin.users.index')->with('status', 'Usuário criado com sucesso.');
    }

    protected function authorizeAdmin()
    {
        /** @var \App\Models\User|null $me */
        $me = Auth::user();

        if (! $me || ! $me->isAdmin()) {
            $isAjax = request()->expectsJson() || strtolower(request()->header('X-Requested-With') ?? '') === 'xmlhttprequest';
            if ($isAjax) {
                abort(403);
            }

            // Redirect to friendly forbidden page with message
            $response = redirect()->route('admin.forbidden')->with('error', 'Acesso negado: requer administrador.');
            throw new \Illuminate\Http\Exceptions\HttpResponseException($response);
        }
    }

    protected function authorizeAction()
    {
        /** @var \App\Models\User|null $me */
        $me = Auth::user();

        \Illuminate\Support\Facades\Log::info('authorizeAction check', ['id' => $me->id ?? null, 'role' => $me->role ?? null]);

        if (! $me || ! ($me->isAdmin() || $me->isPublisher())) {
            abort(403);
        }
    }
}
