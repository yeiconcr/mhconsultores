<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        // Obtener todos los servicios activos ordenados
        $services = Service::active()->ordered()->with('category')->get();

        return view('pages.services.index', compact('services'));
    }

    // Método show eliminado ya que no usamos páginas de detalle
}
