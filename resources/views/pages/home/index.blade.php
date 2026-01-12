@extends('layouts.app')

@section('title', 'Inicio - MH Consultores')

@section('content')

    <!-- Hero Section -->
    <section class="hero-gradient py-20 md:py-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="font-heading text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    {{ site_setting('hero.title', 'Transformamos Procesos,') }}
                    <span class="text-accent-400">{{ site_setting('hero.subtitle', 'Garantizamos Calidad') }}</span>
                </h1>

                <p class="text-xl md:text-2xl text-primary-100 mb-10 leading-relaxed">
                    {{ site_setting('hero.description', 'Consultoría especializada en sistemas de gestión de calidad, mejora continua y optimización de procesos industriales en Colombia.') }}
                </p>

                <div class="flex justify-center">
                    <a href="{{ route('contact') }}"
                        class="btn bg-accent-600 hover:bg-accent-700 text-white text-lg px-10 py-4 shadow-xl hover:shadow-2xl transition-all">
                        <i
                            class="fas fa-calendar-check mr-2"></i>{{ site_setting('hero.button_text', 'Agendar Consulta Gratis') }}
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16 max-w-3xl mx-auto">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-accent-400 mb-1">{{ site_setting('stats.years', '10+') }}</div>
                        <div class="text-primary-200 text-sm">Años de Experiencia</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-accent-400 mb-1">{{ site_setting('stats.companies', '50+') }}
                        </div>
                        <div class="text-primary-200 text-sm">Empresas Asesoradas</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-accent-400 mb-1">{{ site_setting('stats.projects', '100+') }}
                        </div>
                        <div class="text-primary-200 text-sm">Proyectos Exitosos</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-accent-400 mb-1">{{ site_setting('stats.satisfaction', '95%') }}
                        </div>
                        <div class="text-primary-200 text-sm">Satisfacción</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z"
                    fill="#F9FAFB" />
            </svg>
        </div>
    </section>

    <!-- Servicios Destacados -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-heading">{{ site_setting('services.title', 'Servicios Principales') }}</h2>
                <p class="section-subheading mx-auto">
                    {{ site_setting('services.subtitle', 'Soluciones integrales para mejorar la calidad y eficiencia de tu empresa') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($featuredServices as $service)
                    <a href="{{ route('services.index') }}" class="group">
                        <div class="service-card h-full transition-transform duration-300 group-hover:-translate-y-2">
                            <div class="text-5xl text-primary-600 mb-4 group-hover:text-accent-500 transition-colors">
                                <i class="{{ $service->icon ?? 'fas fa-cog' }}"></i>
                            </div>
                            <h3
                                class="font-heading text-2xl font-bold text-gray-900 mb-3 group-hover:text-primary-700 transition-colors">
                                {{ $service->title }}
                            </h3>
                            <p class="text-gray-600">
                                {{ $service->short_description }}
                            </p>
                        </div>
                    </a>
                @empty
                    <a href="{{ route('services.index') }}" class="group">
                        <div class="service-card h-full transition-transform duration-300 group-hover:-translate-y-2">
                            <div class="text-5xl text-primary-600 mb-4 group-hover:text-accent-500 transition-colors">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h3
                                class="font-heading text-2xl font-bold text-gray-900 mb-3 group-hover:text-primary-700 transition-colors">
                                Sistemas de Gestión ISO 9001
                            </h3>
                            <p class="text-gray-600">
                                Implementación y certificación de sistemas de gestión de calidad según normativa internacional.
                            </p>
                        </div>
                    </a>

                    <a href="{{ route('services.index') }}" class="group">
                        <div class="service-card h-full transition-transform duration-300 group-hover:-translate-y-2">
                            <div class="text-5xl text-primary-600 mb-4 group-hover:text-accent-500 transition-colors">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h3
                                class="font-heading text-2xl font-bold text-gray-900 mb-3 group-hover:text-primary-700 transition-colors">
                                Lean Manufacturing
                            </h3>
                            <p class="text-gray-600">
                                Optimización de procesos productivos mediante la eliminación de desperdicios y mejora continua.
                            </p>
                        </div>
                    </a>

                    <a href="{{ route('services.index') }}" class="group">
                        <div class="service-card h-full transition-transform duration-300 group-hover:-translate-y-2">
                            <div class="text-5xl text-primary-600 mb-4 group-hover:text-accent-500 transition-colors">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <h3
                                class="font-heading text-2xl font-bold text-gray-900 mb-3 group-hover:text-primary-700 transition-colors">
                                Six Sigma & DMAIC
                            </h3>
                            <p class="text-gray-600">
                                Reducción de variabilidad y defectos mediante metodología estadística comprobada.
                            </p>
                        </div>
                    </a>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Quiénes Somos -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-accent-600 font-semibold mb-2 block">¿Quiénes Somos?</span>
                    <h2 class="font-heading text-4xl font-bold text-gray-900 mb-6">
                        {{ site_setting('about.title', 'Expertos en Calidad y Mejora Continua') }}
                    </h2>
                    <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                        {{ site_setting('about.description', 'Somos un equipo de consultores especializados con más de 10 años de experiencia transformando procesos industriales. Ayudamos a empresas en Colombia a alcanzar la excelencia operacional mediante la implementación de sistemas de gestión de calidad y metodologías de mejora continua.') }}
                    </p>

                    <div class="space-y-4 mb-8">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-success-600 text-2xl mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Certificaciones Six Sigma Black Belt</h4>
                                <p class="text-gray-600">Expertos en metodologías de mejora continua y reducción de
                                    variabilidad.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-success-600 text-2xl mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Auditores Líderes ISO 9001</h4>
                                <p class="text-gray-600">Certificaciones internacionales en sistemas de gestión de calidad.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-success-600 text-2xl mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Especialistas en Lean Manufacturing</h4>
                                <p class="text-gray-600">Equipo dedicado a la optimización de procesos productivos.</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('about') }}" class="btn btn-outline">
                        Sobre Nosotros <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div>
                    <div class="relative">
                        <img src="{{ asset(site_setting('about.image', 'images/consulting-team.png')) }}"
                            alt="Equipo de consultores MH Consultores" class="w-full rounded-2xl shadow-xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Final -->
    <section class="py-20 bg-gradient-to-br from-primary-600 to-primary-900 relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center text-white">
                <h2 class="font-heading text-4xl md:text-5xl font-bold mb-6">
                    {{ site_setting('cta.title', '¿Listo para Transformar tu Empresa?') }}
                </h2>
                <p class="text-xl text-primary-100 mb-10">
                    {{ site_setting('cta.description', 'Contáctanos y descubre cómo podemos ayudarte a alcanzar la excelencia operacional.') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}"
                        class="btn bg-accent-600 hover:bg-accent-700 text-white text-lg px-8 py-4">
                        <i class="fas fa-envelope mr-2"></i>Contáctanos
                    </a>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', site_setting('contact.whatsapp', '573001234567')) }}?text=Hola,%20me%20gustaría%20obtener%20más%20información"
                        target="_blank" class="btn bg-white text-primary-600 hover:bg-gray-100 text-lg px-8 py-4">
                        <i class="fab fa-whatsapp mr-2"></i>Escríbenos por WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection