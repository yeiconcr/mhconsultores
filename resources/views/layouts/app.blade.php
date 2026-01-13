<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', site_setting('seo.default_title', 'MH Consultores - Consultoría Profesional en Calidad'))
    </title>
    <meta name="description"
        content="@yield('meta_description', site_setting('seo.default_description', 'MH Consultores ofrece consultoría profesional en sistemas de gestión de calidad, mejora continua y optimización de procesos industriales en Colombia.'))">
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', site_setting('seo.default_title', 'MH Consultores'))">
    <meta property="og:description"
        content="@yield('meta_description', site_setting('seo.default_description', 'Consultoría en Calidad y Mejora Continua'))">
    <meta property="og:image" content="{{ asset(site_setting('seo.og_image', 'images/og-default.jpg')) }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', site_setting('seo.default_title', 'MH Consultores'))">
    <meta property="twitter:description"
        content="@yield('meta_description', site_setting('seo.default_description', 'Consultoría en Calidad y Mejora Continua'))">
    <meta property="twitter:image" content="{{ asset(site_setting('seo.og_image', 'images/og-default.jpg')) }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="font-sans antialiased bg-gray-50">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-primary-600 to-primary-800 rounded-lg flex items-center justify-center">
                        <span class="text-white text-xl font-bold">MH</span>
                    </div>
                    <div>
                        <h1 class="font-heading font-bold text-xl text-gray-900">MH Consultores</h1>
                        <p class="text-xs text-gray-600">Calidad & Mejora Continua</p>
                    </div>
                </a>

                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        Inicio
                    </a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        Nosotros
                    </a>
                    <a href="{{ route('services.index') }}"
                        class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
                        Servicios
                    </a>
                    <a href="{{ route('contact') }}"
                        class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        Contacto
                    </a>
                </div>

                <button id="mobile-menu-btn" class="lg:hidden text-gray-600 hover:text-primary-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <div id="mobile-menu" class="hidden lg:hidden mt-4 pb-4 border-t pt-4">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('home') }}" class="mobile-nav-link">Inicio</a>
                    <a href="{{ route('about') }}" class="mobile-nav-link">Nosotros</a>
                    <a href="{{ route('services.index') }}" class="mobile-nav-link">Servicios</a>
                    <a href="{{ route('contact') }}" class="mobile-nav-link">Contacto</a>
                </div>
            </div>
        </nav>
    </header>

    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', site_setting('contact.whatsapp', '573001234567')) }}?text=Hola,%20me%20gustaría%20obtener%20más%20información"
        target="_blank"
        class="fixed bottom-6 right-6 bg-green-500 text-white w-16 h-16 rounded-full shadow-lg flex items-center justify-center hover:bg-green-600 transition-all hover:scale-110 z-40">
        <i class="fab fa-whatsapp text-3xl"></i>
    </a>

    <main class="min-h-screen">
        @yield('content')
    </main>

    <section class="bg-gradient-to-r from-primary-600 to-primary-800 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h3 class="font-heading text-3xl font-bold text-white mb-4">
                    Mantente Actualizado
                </h3>
                <p class="text-primary-100 mb-8">
                    Recibe artículos, tips y novedades sobre calidad y mejora continua directamente en tu email.
                </p>
                <form action="{{ route('newsletter.subscribe') }}" method="POST"
                    class="flex flex-col sm:flex-row gap-3 max-w-lg mx-auto">
                    @csrf
                    <input type="email" name="email" placeholder="Tu correo electrónico" required
                        class="flex-1 px-5 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-white">
                    <button type="submit"
                        class="bg-accent-600 hover:bg-accent-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                        Suscribirme
                    </button>
                </form>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-300">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="font-heading font-bold text-white text-lg mb-4">MH Consultores</h4>
                    <p class="text-sm mb-4">
                        Consultoría profesional en sistemas de gestión de calidad, mejora continua y optimización de
                        procesos industriales en Colombia.
                    </p>
                </div>

                <div>
                    <h4 class="font-heading font-bold text-white text-lg mb-4">Enlaces Rápidos</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('services.index') }}" class="footer-link">Servicios</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-link">Contacto</a></li>
                        <li><a href="{{ route('about') }}" class="footer-link">Nosotros</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-heading font-bold text-white text-lg mb-4">Servicios</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('services.index') }}" class="footer-link">Consultoría ISO 9001</a></li>
                        <li><a href="{{ route('services.index') }}" class="footer-link">Lean Manufacturing</a></li>
                        <li><a href="{{ route('services.index') }}" class="footer-link">Six Sigma</a></li>
                        <li><a href="{{ route('services.index') }}" class="footer-link">Auditorías de Calidad</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-heading font-bold text-white text-lg mb-4">Contacto</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-accent-600 mr-3 mt-1"></i>
                            <span>{{ site_setting('contact.address', 'Palmira, Valle del Cauca, Colombia') }}</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-accent-600 mr-3"></i>
                            <span>{{ site_setting('contact.phone', '+57 300 123 4567') }}</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-accent-600 mr-3"></i>
                            <span>{{ site_setting('contact.email', 'contacto@mhconsultores.com') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm">
                <p>&copy; {{ date('Y') }} MH Consultores. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Notificaciones Flash
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Excelente!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#0ea5e9',
                timer: 4000
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Atención',
                html: `
                        <ul class="text-left text-sm">
                            @foreach($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    `,
                confirmButtonColor: '#ef4444'
            });
        @endif
    </script>

    @stack('scripts')
</body>

</html>