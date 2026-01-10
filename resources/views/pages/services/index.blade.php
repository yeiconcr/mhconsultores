@extends('layouts.app')

@section('title', 'Servicios - MH Consultores')

@section('content')

<!-- Hero Section -->
<section class="hero-gradient py-20 md:py-28">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Nuestros Servicios</h1>
            <p class="text-xl md:text-2xl text-primary-100">Soluciones profesionales para la excelencia operacional de tu empresa</p>
        </div>
    </div>
</section>

<!-- Servicios -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="section-heading">Consultoría Especializada</h2>
            <p class="section-subheading mx-auto">
                Ayudamos a empresas a alcanzar la excelencia operacional
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="service-card group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100">
                <div class="p-8">
                    <!-- Icono con fondo dinámico al hover -->
                    <div class="w-16 h-16 bg-primary-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary-600 group-hover:scale-110 transition-all duration-300">
                        <i class="{{ $service->icon ?? 'fas fa-cog' }} text-3xl text-primary-600 group-hover:text-white transition-colors duration-300"></i>
                    </div>

                    <h3 class="font-heading text-2xl font-bold text-gray-900 mb-4 group-hover:text-primary-700 transition-colors">
                        {{ $service->title }}
                    </h3>
                    
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        {{ $service->short_description }}
                    </p>

                    <!-- Botón de Acción -->
                    <div class="pt-4 border-t border-gray-100">
                        @php
                            $waNumber = preg_replace('/[^0-9]/', '', site_setting('contact.whatsapp', '573001234567'));
                        @endphp
                        <a href="https://wa.me/{{ $waNumber }}?text=Hola,%20me%20gustaría%20cotizar%20el%20servicio%20de%20{{ urlencode($service->title) }}" 
                           target="_blank"
                           class="flex items-center justify-center w-full py-3 px-4 bg-white border-2 border-primary-600 text-primary-700 font-semibold rounded-xl hover:bg-primary-600 hover:text-white transition-all duration-300">
                            <i class="fab fa-whatsapp text-xl mr-2"></i>
                            Cotizar por WhatsApp
                        </a>
                    </div>
                </div>
                
                <!-- Decoración visual -->
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-accent-100 rounded-full opacity-20 group-hover:scale-150 transition-transform duration-500"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-20 bg-gradient-to-br from-primary-600 to-primary-900">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h2 class="font-heading text-4xl md:text-5xl font-bold mb-6">
                ¿Listo para Transformar tu Empresa?
            </h2>
            <p class="text-xl text-primary-100 mb-10">
                Contáctanos y descubre cómo podemos ayudarte a alcanzar la excelencia operacional.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn bg-accent-600 hover:bg-accent-700 text-white text-lg px-8 py-4">
                    <i class="fas fa-envelope mr-2"></i>Contactar Ahora
                </a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', site_setting('contact.whatsapp', '573001234567')) }}" target="_blank" class="btn bg-white text-primary-600 hover:bg-gray-100 text-lg px-8 py-4">
                    <i class="fab fa-whatsapp mr-2"></i>Escribir por WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
