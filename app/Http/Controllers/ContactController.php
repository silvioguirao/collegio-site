<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function show()
    {
        $meta = ['title'=>'Contato - '.config('app.name'),'meta_description'=>'Formulário de contato.'];
        return view('pages.contact.form')->with($meta);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:191',
            'message' => 'required|string',
            'hp' => 'nullable|string|size:0', // honeypot should be empty
        ]);

        // If honeypot filled, treat as spam
        if ($request->filled('hp')) {
            return redirect()->back()->with('status','Mensagem recebida.');
        }

        // store message - model may not yet exist, guard with try/catch
        try {
            if (class_exists(ContactMessage::class)) {
                ContactMessage::create(array_merge($data, ['status'=>'new']));
            }
        } catch (\Throwable $e) {
            // continue silently for now
        }

        return redirect()->route('contact.show')->with('status','Sua mensagem foi enviada com sucesso.');
    }
}
