@extends('layouts.app')

@section('title', 'Nosotros - MH Consultores')

@section('content')

<!-- Hero Section -->
<section class="hero-gradient py-20 md:py-28">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Nosotros</h1>
            <p class="text-xl md:text-2xl text-primary-100">Expertos en transformar empresas mediante la excelencia en calidad y mejora continua</p>
        </div>
    </div>
</section>

<!-- Quiénes Somos -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">¿Quiénes Somos?</h2>
                <div class="w-20 h-1 bg-accent-600 mx-auto mb-6"></div>
            </div>

            <div class="text-lg text-gray-600 leading-relaxed space-y-6">
                <p>
                    <strong class="text-gray-900">MH Consultores</strong> es una firma especializada en consultoría de calidad y mejora continua,
                    comprometida con la transformación y optimización de procesos industriales en Colombia.
                </p>
                <p>
                    Con más de una década de experiencia, ayudamos a empresas de diversos sectores a alcanzar la excelencia
                    operacional mediante la implementación de sistemas de gestión de calidad, metodologías Lean Manufacturing,
                    Six Sigma y normativas internacionales como ISO 9001.
                </p>
                <p>
                    Nuestro enfoque combina conocimiento técnico profundo con una visión práctica y orientada a resultados,
                    garantizando que cada proyecto genere valor tangible para nuestros clientes.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Estadísticas -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-primary-600 mb-2">{{ settings('stats.years', '10+') }}</div>
                    <div class="text-gray-600 font-medium">Años de Experiencia</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-primary-600 mb-2">{{ settings('stats.companies', '50+') }}</div>
                    <div class="text-gray-600 font-medium">Empresas Asesoradas</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-primary-600 mb-2">{{ settings('stats.projects', '100+') }}</div>
                    <div class="text-gray-600 font-medium">Proyectos Exitosos</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-primary-600 mb-2">{{ settings('stats.satisfaction', '95%') }}</div>
                    <div class="text-gray-600 font-medium">Satisfacción</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Misión y Visión -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Misión -->
                <div class="bg-gray-50 rounded-xl p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-bullseye text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Nuestra Misión</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed">
                        Transformar empresas mediante la implementación de sistemas de gestión de calidad y metodologías
                        de mejora continua, generando valor sostenible y contribuyendo al desarrollo industrial de Colombia
                        a través de soluciones innovadoras y orientadas a resultados.
                    </p>
                </div>

                <!-- Visión -->
                <div class="bg-gray-50 rounded-xl p-8 md:p-10">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-accent-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-eye text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Nuestra Visión</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed">
                        Ser la firma de consultoría en calidad más reconocida y confiable de Colombia, referente en
                        excelencia operacional y mejora continua, impulsando la competitividad de las empresas mediante
                        servicios profesionales de alto valor agregado.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Valores Corporativos -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Nuestros Valores</h2>
                <div class="w-20 h-1 bg-accent-600 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600">Los principios que guían nuestro trabajo diario</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Excelencia -->
                <div class="bg-white rounded-xl p-8 text-center shadow-md hover:shadow-lg transition">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-primary-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Excelencia</h4>
                    <p class="text-gray-600">
                        Compromiso con los más altos estándares de calidad en cada proyecto y servicio que ofrecemos.
                    </p>
                </div>

                <!-- Integridad -->
                <div class="bg-white rounded-xl p-8 text-center shadow-md hover:shadow-lg transition">
                    <div class="w-16 h-16 bg-success-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-success-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Integridad</h4>
                    <p class="text-gray-600">
                        Actuamos con transparencia, honestidad y ética profesional en todas nuestras relaciones.
                    </p>
                </div>

                <!-- Innovación -->
                <div class="bg-white rounded-xl p-8 text-center shadow-md hover:shadow-lg transition">
                    <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lightbulb text-accent-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Innovación</h4>
                    <p class="text-gray-600">
                        Buscamos continuamente nuevas formas de generar valor y mejorar nuestros servicios.
                    </p>
                </div>

                <!-- Orientación al Cliente -->
                <div class="bg-white rounded-xl p-8 text-center shadow-md hover:shadow-lg transition">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-primary-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Orientación al Cliente</h4>
                    <p class="text-gray-600">
                        Entendemos las necesidades únicas de cada cliente y adaptamos nuestras soluciones.
                    </p>
                </div>

                <!-- Mejora Continua -->
                <div class="bg-white rounded-xl p-8 text-center shadow-md hover:shadow-lg transition">
                    <div class="w-16 h-16 bg-success-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-success-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Mejora Continua</h4>
                    <p class="text-gray-600">
                        Practicamos lo que predicamos: nos esforzamos constantemente por mejorar nuestros procesos.
                    </p>
                </div>

                <!-- Compromiso -->
                <div class="bg-white rounded-xl p-8 text-center shadow-md hover:shadow-lg transition">
                    <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-certificate text-accent-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Compromiso</h4>
                    <p class="text-gray-600">
                        Dedicación total al éxito de nuestros clientes y al cumplimiento de nuestros compromisos.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Por Qué Elegirnos -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">¿Por Qué Elegirnos?</h2>
                <div class="w-20 h-1 bg-accent-600 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600">Ventajas que nos diferencian en el mercado</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-check text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Experiencia Comprobada</h4>
                        <p class="text-gray-600">Más de 10 años transformando empresas en diversos sectores industriales.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-check text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Metodologías Probadas</h4>
                        <p class="text-gray-600">Aplicamos estándares internacionales: ISO 9001, Lean, Six Sigma.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-check text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Soluciones Personalizadas</h4>
                        <p class="text-gray-600">Adaptamos nuestros servicios a las necesidades específicas de cada cliente.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-check text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Resultados Medibles</h4>
                        <p class="text-gray-600">Enfoque en métricas y KPIs para garantizar impacto real en tu negocio.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-check text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Acompañamiento Continuo</h4>
                        <p class="text-gray-600">No solo consultamos, acompañamos la implementación hasta ver resultados.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-check text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Cobertura Nacional</h4>
                        <p class="text-gray-600">Servicios disponibles en todo el territorio colombiano.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-20 bg-gradient-to-br from-primary-600 to-primary-900">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Listo para Trabajar con Nosotros?</h2>
            <p class="text-xl text-primary-100 mb-10">
                Contáctanos y descubre cómo podemos ayudarte a alcanzar tus objetivos de calidad y mejora continua.
            </p>
            <a href="{{ route('contact') }}" class="btn bg-accent-600 hover:bg-accent-700 text-white text-lg px-10 py-4 shadow-xl inline-block">
                <i class="fas fa-envelope mr-2"></i>Contactar Ahora
            </a>
        </div>
    </div>
</section>

@endsection
