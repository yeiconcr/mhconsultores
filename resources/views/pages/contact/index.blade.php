@extends('layouts.app')

@section('title', 'Contacto - MH Consultores')

@section('content')

<!-- Hero Section -->
<section class="hero-gradient py-20 md:py-28">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Contacto</h1>
            <p class="text-xl md:text-2xl text-primary-100">Estamos listos para ayudarte con tus proyectos de calidad industrial</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">

            <!-- Formulario de Contacto -->
            <div class="max-w-3xl mx-auto">

                @if(session('success'))
                    <div class="mb-8 bg-success-50 border-l-4 border-success-500 p-6 rounded-r-lg">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-success-600 text-2xl mr-4 mt-1"></i>
                            <div>
                                <h4 class="font-bold text-success-900 mb-1">¡Mensaje Enviado!</h4>
                                <p class="text-success-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">
                    <div class="text-center mb-10">
                        <h2 class="text-3xl font-bold text-gray-900 mb-3">Envíanos un Mensaje</h2>
                        <p class="text-gray-600">Completa el formulario y te responderemos pronto</p>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Nombre -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nombre completo <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('name') border-red-500 @enderror"
                                   placeholder="Ej: Juan Pérez">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email y Teléfono -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Correo electrónico <span class="text-red-500">*</span>
                                </label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('email') border-red-500 @enderror"
                                       placeholder="tu@email.com">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Teléfono
                                </label>
                                <input type="tel"
                                       id="phone"
                                       name="phone"
                                       value="{{ old('phone') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('phone') border-red-500 @enderror"
                                       placeholder="+57 300 123 4567">
                                @error('phone')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Empresa -->
                        <div>
                            <label for="company" class="block text-sm font-semibold text-gray-700 mb-2">
                                Empresa
                            </label>
                            <input type="text"
                                   id="company"
                                   name="company"
                                   value="{{ old('company') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('company') border-red-500 @enderror"
                                   placeholder="Nombre de tu empresa">
                            @error('company')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Asunto -->
                        <div>
                            <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                                ¿En qué podemos ayudarte? <span class="text-red-500">*</span>
                            </label>
                            <select id="subject"
                                    name="subject"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('subject') border-red-500 @enderror">
                                <option value="">Selecciona un tema</option>
                                <option value="Consultoría en ISO 9001" {{ old('subject') == 'Consultoría en ISO 9001' ? 'selected' : '' }}>Consultoría en ISO 9001</option>
                                <option value="Implementación Lean Manufacturing" {{ old('subject') == 'Implementación Lean Manufacturing' ? 'selected' : '' }}>Implementación Lean Manufacturing</option>
                                <option value="Capacitación Six Sigma" {{ old('subject') == 'Capacitación Six Sigma' ? 'selected' : '' }}>Capacitación Six Sigma</option>
                                <option value="Auditoría de Calidad" {{ old('subject') == 'Auditoría de Calidad' ? 'selected' : '' }}>Auditoría de Calidad</option>
                                <option value="Gestión de Proyectos" {{ old('subject') == 'Gestión de Proyectos' ? 'selected' : '' }}>Gestión de Proyectos</option>
                                <option value="Cotización de Servicios" {{ old('subject') == 'Cotización de Servicios' ? 'selected' : '' }}>Cotización de Servicios</option>
                                <option value="Otro" {{ old('subject') == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('subject')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Mensaje -->
                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                Cuéntanos más detalles <span class="text-red-500">*</span>
                            </label>
                            <textarea id="message"
                                      name="message"
                                      rows="6"
                                      required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent resize-none @error('message') border-red-500 @enderror"
                                      placeholder="Describe tu proyecto, necesidades o consulta...">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Botón de Envío -->
                        <div class="pt-4">
                            <button type="submit" class="w-full btn btn-primary py-4">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Enviar Mensaje
                            </button>
                            <p class="text-center text-sm text-gray-500 mt-4">
                                <i class="fas fa-shield-alt mr-1"></i>
                                Tus datos están seguros. Te responderemos en menos de 24 horas.
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Otros Métodos de Contacto -->
                <div class="mt-12">
                    <h3 class="text-center text-lg font-semibold text-gray-700 mb-6">Otros métodos de contacto</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- WhatsApp -->
                        <div class="bg-white rounded-lg shadow-sm p-5 text-center hover:shadow-md transition">
                            <div class="w-12 h-12 bg-success-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fab fa-whatsapp text-success-600 text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-1 text-sm">WhatsApp</h4>
                            <p class="text-xs text-gray-500 mb-3">Respuesta inmediata</p>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', site_setting('contact.whatsapp', '573001234567')) }}?text=Hola, me gustaría recibir información sobre sus servicios"
                               target="_blank"
                               class="inline-block bg-success-600 text-white font-medium text-sm px-4 py-2 rounded hover:bg-success-700 transition">
                                <i class="fab fa-whatsapp mr-1"></i>
                                Chatear
                            </a>
                        </div>

                        <!-- Email -->
                        <div class="bg-white rounded-lg shadow-sm p-5 text-center hover:shadow-md transition">
                            <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-envelope text-primary-600 text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-1 text-sm">Email</h4>
                            <a href="mailto:{{ site_setting('contact.email', 'contacto@mhconsultores.com') }}" class="text-xs text-gray-600 hover:text-primary-600 block mb-1">
                                {{ site_setting('contact.email', 'contacto@mhconsultores.com') }}
                            </a>
                            <p class="text-xs text-gray-400">Te respondemos en 24h</p>
                        </div>

                        <!-- Ubicación -->
                        <div class="bg-white rounded-lg shadow-sm p-5 text-center hover:shadow-md transition">
                            <div class="w-12 h-12 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-map-marker-alt text-accent-600 text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-1 text-sm">Ubicación</h4>
                            <p class="text-xs text-gray-600 mb-1">{{ site_setting('contact.address', 'Palmira, Valle del Cauca, Colombia') }}</p>
                            <p class="text-xs text-gray-400">Cobertura nacional</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection
