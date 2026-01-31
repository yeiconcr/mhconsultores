<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Solo crea las categorías si no existen (idempotente)
        $consultoria = ServiceCategory::firstOrCreate(
            ['slug' => 'consultoria'],
            [
                'name' => 'Consultoría',
                'description' => 'Servicios de consultoría especializada',
                'order' => 1,
                'active' => true,
            ]
        );

        $capacitacion = ServiceCategory::firstOrCreate(
            ['slug' => 'capacitacion'],
            [
                'name' => 'Capacitación',
                'description' => 'Formación y desarrollo de competencias',
                'order' => 2,
                'active' => true,
            ]
        );

        Service::updateOrCreate(
            ['slug' => 'implementacion-iso-9001'],
            [
                'category_id' => $consultoria->id,
                'title' => 'Implementación ISO 9001',
                'short_description' => 'Implementación y certificación de sistemas de gestión de calidad según ISO 9001.',
                'description' => '<p>Acompañamiento integral en el diseño, implementación y certificación de sistemas de gestión de calidad bajo la norma ISO 9001:2015.</p>',
                'icon' => 'fas fa-clipboard-check',
                'is_featured' => true,
                'order' => 1,
                'active' => true,
                'benefits' => json_encode([
                    'Mejora en la calidad de productos y servicios',
                    'Aumento de la satisfacción del cliente',
                    'Reducción de costos operativos',
                ]),
                'deliverables' => json_encode([
                    'Manual de calidad',
                    'Procedimientos documentados',
                    'Formación del personal',
                ]),
                'duration' => '3-6 meses',
            ]
        );

        Service::updateOrCreate(
            ['slug' => 'lean-manufacturing'],
            [
                'category_id' => $consultoria->id,
                'title' => 'Lean Manufacturing',
                'short_description' => 'Optimización de procesos mediante eliminación de desperdicios y mejora continua.',
                'description' => '<p>Implementación de metodología Lean para optimizar procesos productivos.</p>',
                'icon' => 'fas fa-chart-line',
                'is_featured' => true,
                'order' => 2,
                'active' => true,
                'benefits' => json_encode([
                    'Reducción de tiempos de ciclo hasta 40%',
                    'Disminución de inventarios',
                    'Mejora en productividad',
                ]),
                'deliverables' => json_encode([
                    'Diagnóstico inicial',
                    'Value Stream Mapping',
                    'Plan de implementación',
                ]),
                'duration' => '4-8 meses',
            ]
        );

        Service::updateOrCreate(
            ['slug' => 'six-sigma-dmaic'],
            [
                'category_id' => $consultoria->id,
                'title' => 'Six Sigma & DMAIC',
                'short_description' => 'Reducción de variabilidad y defectos mediante metodología estadística.',
                'description' => '<p>Proyectos Six Sigma enfocados en la reducción de defectos.</p>',
                'icon' => 'fas fa-chart-bar',
                'is_featured' => true,
                'order' => 3,
                'active' => true,
                'benefits' => json_encode([
                    'Reducción de defectos hasta 99.99%',
                    'Mejora en capacidad de procesos',
                    'Decisiones basadas en datos',
                ]),
                'deliverables' => json_encode([
                    'Charter del proyecto',
                    'Análisis estadístico completo',
                    'Plan de mejoras',
                ]),
                'duration' => '3-5 meses por proyecto',
            ]
        );

        Service::updateOrCreate(
            ['slug' => 'auditorias-de-calidad'],
            [
                'category_id' => $consultoria->id,
                'title' => 'Auditorías de Calidad',
                'short_description' => 'Auditorías internas y evaluación de sistemas de gestión.',
                'description' => '<p>Auditorías internas de calidad y evaluaciones de conformidad.</p>',
                'icon' => 'fas fa-search',
                'is_featured' => false,
                'order' => 4,
                'active' => true,
                'duration' => '1-2 semanas',
            ]
        );

        Service::updateOrCreate(
            ['slug' => 'capacitacion-herramientas-calidad'],
            [
                'category_id' => $capacitacion->id,
                'title' => 'Capacitación en Herramientas de Calidad',
                'short_description' => 'Formación en herramientas y metodologías de mejora continua.',
                'description' => '<p>Talleres y capacitaciones en herramientas de calidad.</p>',
                'icon' => 'fas fa-chalkboard-teacher',
                'is_featured' => false,
                'order' => 5,
                'active' => true,
                'duration' => '8-24 horas según módulo',
            ]
        );

        Service::updateOrCreate(
            ['slug' => 'gestion-proyectos-mejora'],
            [
                'category_id' => $consultoria->id,
                'title' => 'Gestión de Proyectos de Mejora',
                'short_description' => 'Planificación y gestión integral de proyectos de mejora continua.',
                'description' => '<p>Gestión profesional de proyectos de mejora.</p>',
                'icon' => 'fas fa-tasks',
                'is_featured' => false,
                'order' => 6,
                'active' => true,
                'duration' => 'Variable según proyecto',
            ]
        );
    }
}