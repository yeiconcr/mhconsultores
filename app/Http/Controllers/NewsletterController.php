<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ], [
            'email.required' => 'El correo es obligatorio.',
            'email.email' => 'El formato del correo no es válido.',
            'email.unique' => 'Este correo ya está suscrito.',
        ]);

        \App\Models\Subscriber::create([
            'email' => $request->email,
        ]);

        return back()->with('success', '¡Gracias por suscribirte! Recibirás nuestras novedades pronto.');
    }
}
