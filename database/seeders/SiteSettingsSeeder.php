<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Hero Section
            [
                'key' => 'hero.title',
                'value' => 'Transformamos Procesos,',
                'type' => 'text',
                'group' => 'hero',
                'label' => 'Título Principal',
                'description' => 'Título principal en la sección hero de la página de inicio',
            ],
            [
                'key' => 'hero.subtitle',
                'value' => 'Garantizamos Calidad',
                'type' => 'text',
                'group' => 'hero',
                'label' => 'Subtítulo (Destacado)',
                'description' => 'Texto destacado en naranja debajo del título',
            ],
            [
                'key' => 'hero.description',
                'value' => 'Consultoría especializada en sistemas de gestión de calidad, mejora continua y optimización de procesos industriales en Colombia.',
                'type' => 'textarea',
                'group' => 'hero',
                'label' => 'Descripción',
                'description' => 'Texto descriptivo debajo del título',
            ],
            [
                'key' => 'hero.button_text',
                'value' => 'Agendar Consulta Gratis',
                'type' => 'text',
                'group' => 'hero',
                'label' => 'Texto del Botón',
                'description' => 'Texto del botón principal del hero',
            ],

            // Estadísticas
            [
                'key' => 'stats.years',
                'value' => '10+',
                'type' => 'text',
                'group' => 'stats',
                'label' => 'Años de Experiencia',
                'description' => 'Número de años de experiencia',
            ],
            [
                'key' => 'stats.companies',
                'value' => '50+',
                'type' => 'text',
                'group' => 'stats',
                'label' => 'Empresas Asesoradas',
                'description' => 'Número de empresas asesoradas',
            ],
            [
                'key' => 'stats.projects',
                'value' => '100+',
                'type' => 'text',
                'group' => 'stats',
                'label' => 'Proyectos Exitosos',
                'description' => 'Número de proyectos completados',
            ],
            [
                'key' => 'stats.satisfaction',
                'value' => '95%',
                'type' => 'text',
                'group' => 'stats',
                'label' => 'Satisfacción',
                'description' => 'Porcentaje de satisfacción de clientes',
            ],

            // Contacto
            [
                'key' => 'contact.whatsapp',
                'value' => '573001234567',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Número de WhatsApp',
                'description' => 'Número de WhatsApp con código de país (sin + ni espacios)',
            ],
            [
                'key' => 'contact.phone',
                'value' => '+57 300 123 4567',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Teléfono (Formato)',
                'description' => 'Número de teléfono formateado para mostrar',
            ],
            [
                'key' => 'contact.email',
                'value' => 'contacto@mhconsultores.com',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Email de Contacto',
                'description' => 'Email principal de contacto',
            ],
            [
                'key' => 'contact.address',
                'value' => 'Palmira, Valle del Cauca, Colombia',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Dirección',
                'description' => 'Dirección física de la empresa',
            ],

            // Sobre Nosotros
            [
                'key' => 'about.title',
                'value' => 'Expertos en Calidad y Mejora Continua',
                'type' => 'text',
                'group' => 'about',
                'label' => 'Título Sección',
                'description' => 'Título de la sección "Quiénes Somos"',
            ],
            [
                'key' => 'about.description',
                'value' => 'Somos un equipo de consultores especializados con más de 10 años de experiencia transformando procesos industriales. Ayudamos a empresas en Colombia a alcanzar la excelencia operacional mediante la implementación de sistemas de gestión de calidad y metodologías de mejora continua.',
                'type' => 'textarea',
                'group' => 'about',
                'label' => 'Descripción',
                'description' => 'Texto descriptivo de la sección "Quiénes Somos"',
            ],
            [
                'key' => 'about.image',
                'value' => 'images/consulting-team.png',
                'type' => 'image',
                'group' => 'about',
                'label' => 'Imagen del Equipo',
                'description' => 'Imagen que aparece en la sección "Quiénes Somos"',
            ],

            // Sección Servicios
            [
                'key' => 'services.title',
                'value' => 'Servicios Principales',
                'type' => 'text',
                'group' => 'services',
                'label' => 'Título de Servicios',
                'description' => 'Título de la sección de servicios en homepage',
            ],
            [
                'key' => 'services.subtitle',
                'value' => 'Soluciones integrales para mejorar la calidad y eficiencia de tu empresa',
                'type' => 'textarea',
                'group' => 'services',
                'label' => 'Subtítulo de Servicios',
                'description' => 'Descripción corta debajo del título de servicios',
            ],

            // Call to Action
            [
                'key' => 'cta.title',
                'value' => '¿Listo para Transformar tu Empresa?',
                'type' => 'text',
                'group' => 'cta',
                'label' => 'Título CTA',
                'description' => 'Título del llamado a la acción final',
            ],
            [
                'key' => 'cta.description',
                'value' => 'Contáctanos y descubre cómo podemos ayudarte a alcanzar la excelencia operacional.',
                'type' => 'textarea',
                'group' => 'cta',
                'label' => 'Descripción CTA',
                'description' => 'Descripción del llamado a la acción',
            ],

            // SEO Básico
            [
                'key' => 'seo.default_title',
                'value' => 'MH Consultores - Consultoría Profesional en Calidad',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Título por Defecto',
                'description' => 'Título del sitio cuando no se especifica uno',
            ],
            [
                'key' => 'seo.default_description',
                'value' => 'MH Consultores ofrece consultoría profesional en sistemas de gestión de calidad, mejora continua y optimización de procesos industriales en Colombia.',
                'type' => 'textarea',
                'group' => 'seo',
                'label' => 'Descripción por Defecto',
                'description' => 'Meta descripción del sitio cuando no se especifica una',
            ],
            [
                'key' => 'seo.og_image',
                'value' => 'images/consulting-team.png',
                'type' => 'image',
                'group' => 'seo',
                'label' => 'Imagen Social Default',
                'description' => 'Imagen que se muestra al compartir en redes sociales',
            ],
        ];

        foreach ($settings as $setting) {
            $existing = SiteSetting::where('key', $setting['key'])->first();

            if ($existing) {
                // Si ya existe, actualizamos solo la metadata (etiqueta, descripción, tipo)
                // PERO respetamos el 'value' que el usuario haya editado en producción.
                $existing->update([
                    'type' => $setting['type'],
                    'group' => $setting['group'],
                    'label' => $setting['label'],
                    'description' => $setting['description'],
                ]);
            } else {
                // Si no existe, lo creamos con el valor por defecto
                SiteSetting::create($setting);
            }
        }
    }
}
