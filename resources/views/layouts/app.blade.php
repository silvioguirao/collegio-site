<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="description" content="{{ $meta_description ?? 'Site institucional do colégio' }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    @include('partials.meta')
    @stack('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style> :focus{outline:2px solid #2563eb;outline-offset:2px} </style>
</head>
<body class="min-h-screen text-gray-800 bg-white">
    <a class="sr-only focus:not-sr-only" href="#main">Pular para o conteúdo</a>
    <header class="sticky top-0 z-50 bg-blue-700 text-white border-b shadow-sm">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3">
                <img src="https://celtascursoecolegio.com.br/images/Celtas-Vestibulares-Logo-Branco-01.svg" alt="Logo do Colégio" class="h-10 w-auto"/>
                <span class="font-semibold text-lg sr-only md:not-sr-only">{{ config('app.name') }}</span>
            </a>
            <nav aria-label="Main Navigation" class="relative">
                <button id="nav-toggle" aria-controls="nav-list" aria-expanded="false" class="md:hidden inline-flex items-center p-2 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none">
                    <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <div id="nav-overlay" class="fixed inset-0 bg-black/40 z-30 opacity-0 pointer-events-none transition-opacity duration-500 md:hidden"></div>

                <div id="nav-list" class="fixed inset-y-0 left-0 w-80 transform -translate-x-full md:translate-x-0 md:static md:w-auto md:bg-transparent md:p-0 md:flex md:items-center transition-transform duration-500 ease-out bg-blue-700 text-white z-40 p-6">
                    <ul class="flex flex-col md:flex-row gap-4 items-start md:items-center">
                        <li><a href="/" class="text-sm text-white hover:text-blue-200 md:hover:text-blue-200">Início</a></li>
                        <li><a href="/sobre" class="text-sm text-white hover:text-blue-200 md:hover:text-blue-200">Sobre</a></li>
                        <li>
                            <details class="group">
                                <summary class="cursor-pointer text-sm">Etapas</summary>
                                <ul class="mt-2 bg-white/10 border p-2 rounded shadow md:absolute md:mt-0 md:bg-white md:shadow-sm">
                                    <li><a href="/etapas/fundamental-1" class="hover:text-blue-200 md:hover:text-blue-600">Fundamental I</a></li>
                                    <li><a href="/etapas/fundamental-2" class="hover:text-blue-200 md:hover:text-blue-600">Fundamental II</a></li>
                                    <li><a href="/etapas/ensino-medio" class="hover:text-blue-200 md:hover:text-blue-600">Ensino Médio</a></li>
                                    <li><a href="/etapas/pre-vestibular" class="hover:text-blue-200 md:hover:text-blue-600">Pré-Vestibular</a></li>
                                </ul>
                            </details>
                        </li>
                        <li><a href="/noticias" class="text-sm text-white hover:text-blue-200 md:hover:text-blue-200">Notícias</a></li>
                        <li><a href="/contato" class="text-sm text-white hover:text-blue-200 md:hover:text-blue-200">Contato</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main id="main" class="max-w-6xl mx-auto px-4 py-8">
        @if(auth()->user() && auth()->user()->isAluno())
            @include('partials.hero-student')
        @endif

        @if(session('status'))
            <x-alert :type="'success'">{{ session('status') }}</x-alert>
        @endif
        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset
    </main>

    <footer class="bg-gray-50 border-t mt-12">
        <div class="max-w-6xl mx-auto px-4 py-8 text-sm text-gray-600">
            <div class="flex justify-between items-center">
                <div>
                    <strong>{{ config('app.name') }}</strong>
                    <div>Endereço exemplo — Cidade, Estado</div>
                </div>
                <div>
                    <a href="/politicas/privacidade" class="hover:underline">Política de Privacidade</a>
                </div>
            </div>
            <div class="mt-4 text-xs">&copy; {{ date('Y') }} {{ config('app.name') }}. Todos os direitos reservados.</div>
        </div>
    </footer>
    @stack('scripts')
</body>
</html>
