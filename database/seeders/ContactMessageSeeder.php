<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Carlos Rodríguez',
                'email' => 'carlos.rodriguez@empresa.com',
                'phone' => '+57 300 123 4567',
                'company' => 'Manufacturas del Norte S.A.S',
                'subject' => 'Consulta sobre certificación ISO 9001',
                'message' => 'Buenos días, estamos interesados en implementar la certificación ISO 9001 en nuestra planta de manufactura. Nos gustaría conocer más sobre el proceso, duración y costos estimados. Actualmente tenemos 150 empleados y producimos componentes automotrices.',
                'is_read' => false,
                'ip_address' => '192.168.1.100',
                'created_at' => now()->subDays(1),
            ],
            [
                'name' => 'María Fernanda Gómez',
                'email' => 'mf.gomez@textiles.co',
                'phone' => '+57 301 987 6543',
                'company' => 'Textiles Colombianos',
                'subject' => 'Capacitación en Lean Manufacturing',
                'message' => 'Hola, queremos capacitar a nuestro equipo de producción en metodologías Lean. Somos una empresa de 80 personas en el sector textil. ¿Podrían enviarnos información sobre los programas disponibles?',
                'is_read' => true,
                'read_at' => now()->subHours(5),
                'replied_at' => now()->subHours(3),
                'ip_address' => '192.168.1.101',
                'created_at' => now()->subDays(3),
            ],
            [
                'name' => 'Andrés Felipe Torres',
                'email' => 'atorres@alimentos.com.co',
                'phone' => '+57 315 555 1234',
                'company' => 'Alimentos del Valle',
                'subject' => 'Auditoría de calidad urgente',
                'message' => 'Necesitamos con urgencia una auditoría de calidad para nuestro proceso de producción de alimentos. Tenemos una inspección regulatoria próximamente y queremos asegurar el cumplimiento de todos los estándares.',
                'is_read' => true,
                'read_at' => now()->subDays(2),
                'ip_address' => '192.168.1.102',
                'created_at' => now()->subDays(4),
            ],
            [
                'name' => 'Laura Martínez',
                'email' => 'laura.martinez@gmail.com',
                'phone' => null,
                'company' => null,
                'subject' => 'Información sobre servicios',
                'message' => 'Buenas tardes, me gustaría recibir más información sobre los servicios que ofrecen. Trabajo en el área de calidad y estoy buscando opciones para mejorar nuestros procesos.',
                'is_read' => false,
                'ip_address' => '192.168.1.103',
                'created_at' => now()->subHours(12),
            ],
            [
                'name' => 'Roberto Sánchez',
                'email' => 'rsanchez@industrial.co',
                'phone' => '+57 320 444 8888',
                'company' => 'Industrias Metálicas RSC',
                'subject' => 'Proyecto de mejora continua',
                'message' => 'Estamos iniciando un proyecto de mejora continua en nuestra planta y necesitamos asesoría especializada en Six Sigma. ¿Tienen disponibilidad para los próximos meses?',
                'is_read' => false,
                'ip_address' => '192.168.1.104',
                'created_at' => now()->subHours(6),
            ],
        ];

        foreach ($messages as $message) {
            ContactMessage::create($message);
        }
    }
}
