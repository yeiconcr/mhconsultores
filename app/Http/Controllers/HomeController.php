<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredServices = Service::active()
            ->featured()
            ->ordered()
            ->limit(3)
            ->get();

        // Modelos eliminados temporalmente para simplificar
        $featuredProjects = collect([]); 
        $testimonials = collect([]);
        $latestPosts = collect([]);

        return view('pages.home.index', compact(
            'featuredServices',
            'featuredProjects',
            'testimonials',
            'latestPosts'
        ));
    }

    public function about()
    {
        $stats = [
            'experience_years' => 10,
            'companies_helped' => 50,
            'successful_projects' => 100,
            'satisfaction_rate' => 95,
        ];

        $certifications = [
            [
                'name' => 'Six Sigma Black Belt',
                'organization' => 'ASQ (American Society for Quality)',
                'year' => '2018',
                'icon' => 'fa-medal'
            ],
            [
                'name' => 'Auditora Líder ISO 9001:2015',
                'organization' => 'IRCA',
                'year' => '2017',
                'icon' => 'fa-certificate'
            ],
            [
                'name' => 'Lean Manufacturing Practitioner',
                'organization' => 'Lean Enterprise Institute',
                'year' => '2016',
                'icon' => 'fa-chart-line'
            ],
            [
                'name' => 'Project Management Professional (PMP)',
                'organization' => 'PMI',
                'year' => '2019',
                'icon' => 'fa-tasks'
            ],
        ];

        $timeline = [
            [
                'year' => '2023 - Presente',
                'title' => 'Consultora Independiente',
                'company' => 'Ingeniería y Calidad Industrial',
                'description' => 'Consultoría especializada en sistemas de gestión de calidad y mejora continua para empresas del Valle del Cauca.',
            ],
            [
                'year' => '2019 - 2023',
                'title' => 'Gerente de Calidad',
                'company' => 'Empresa Manufacturera Nacional',
                'description' => 'Liderazgo del departamento de calidad, implementación de ISO 9001 y proyectos Six Sigma.',
            ],
            [
                'year' => '2015 - 2019',
                'title' => 'Coordinadora de Mejora Continua',
                'company' => 'Industria Alimenticia',
                'description' => 'Implementación de Lean Manufacturing y reducción de desperdicios en líneas de producción.',
            ],
            [
                'year' => '2013 - 2015',
                'title' => 'Ingeniera de Procesos',
                'company' => 'Sector Farmacéutico',
                'description' => 'Optimización de procesos productivos y control estadístico de calidad.',
            ],
        ];

        return view('pages.about.index', compact('stats', 'certifications', 'timeline'));
    }
}