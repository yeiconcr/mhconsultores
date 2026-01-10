<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Mostrar formulario de contacto
     */
    public function index()
    {
        return view('pages.contact.index');
    }

    /**
     * Procesar y guardar mensaje de contacto
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ], [
            'name.required' => 'El nombre es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe ser válido',
            'subject.required' => 'El asunto es obligatorio',
            'message.required' => 'El mensaje es obligatorio',
            'message.min' => 'El mensaje debe tener al menos 10 caracteres',
        ]);

        // Guardar mensaje en la base de datos
        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['company'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'is_read' => false,
        ]);

        return redirect()->back()->with('success', '¡Gracias por contactarnos! Tu mensaje ha sido enviado correctamente. Te responderemos pronto.');
    }
}
