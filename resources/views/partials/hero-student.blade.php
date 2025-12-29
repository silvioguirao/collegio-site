<section id="hero-student" class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-lg shadow-lg overflow-hidden mb-8 relative">
    <div class="max-w-6xl mx-auto px-6 py-6 lg:flex lg:items-center lg:justify-between">
        <button id="hero-student-close" aria-label="Fechar" class="absolute top-3 right-3 text-white/80 hover:text-white p-2 rounded-md focus:outline-none">
            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 8.586L15.95 2.636a1 1 0 111.414 1.414L11.414 10l5.95 5.95a1 1 0 01-1.414 1.414L10 11.414l-5.95 5.95A1 1 0 012.636 15.95L8.586 10 2.636 4.05A1 1 0 014.05 2.636L10 8.586z" clip-rule="evenodd"/></svg>
        </button>

        <div class="lg:w-1/2">
            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Olá, {{ auth()->user()->name }}!</h2>
            <p class="mt-4 text-indigo-100 max-w-xl">Seu espaço para acessar materiais, ver o calendário e acompanhar as notícias e atividades recentes. Tudo pensado para facilitar sua rotina escolar.</p>

            <div class="mt-6 flex flex-wrap gap-3 items-center">
                <a href="{{ route('calendar') }}" class="inline-flex items-center rounded-md bg-white/10 px-4 py-2 text-sm font-medium text-white hover:bg-white/20">Calendário</a>
                <a href="{{ route('news.index') }}" class="inline-flex items-center rounded-md bg-white px-4 py-2 text-sm font-medium text-indigo-700">Últimas notícias</a>
                <a href="/" class="inline-flex items-center rounded-md bg-white/10 px-4 py-2 text-sm font-medium text-white hover:bg-white/20">Meu perfil</a>

                <form method="POST" action="{{ route('admin.logout') }}" class="inline-block">
                    @csrf
                    <input type="hidden" name="redirect" value="home">
                    <button type="submit" class="inline-flex items-center rounded-md bg-white/20 px-4 py-2 text-sm font-medium text-white hover:bg-white/30">Sair</button>
                </form>
            </div>
        </div>

        <div class="mt-6 lg:mt-0 lg:w-1/2 flex justify-center relative">
            <svg class="w-64 h-48" viewBox="0 0 600 400" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect x="0" y="0" width="600" height="400" rx="16" fill="rgba(255,255,255,0.06)" />
                <circle cx="120" cy="120" r="40" fill="rgba(255,255,255,0.12)" />
                <rect x="200" y="60" width="300" height="20" rx="8" fill="rgba(255,255,255,0.12)" />
                <rect x="200" y="100" width="240" height="16" rx="8" fill="rgba(255,255,255,0.08)" />
                <rect x="200" y="130" width="180" height="16" rx="8" fill="rgba(255,255,255,0.08)" />
                <rect x="40" y="220" width="520" height="12" rx="6" fill="rgba(255,255,255,0.06)" />
                <rect x="40" y="250" width="420" height="12" rx="6" fill="rgba(255,255,255,0.06)" />
            </svg>

            <!-- Satellites -->
            <div class="absolute -right-6 top-6 flex flex-col gap-3">
                <a href="{{ route('calendar') }}" class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center text-white hover:bg-white/30" title="Calendário" aria-label="Calendário">📅</a>
                <a href="{{ route('news.index') }}" class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center text-white hover:bg-white/30" title="Notícias" aria-label="Notícias">📰</a>
                <a href="/" class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center text-white hover:bg-white/30" title="Perfil" aria-label="Perfil">👤</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var key = 'hero_student_dismissed_v1';
            var hero = document.getElementById('hero-student');
            var btn = document.getElementById('hero-student-close');
            if (!hero || !btn) return;

            if (localStorage.getItem(key) === '1') {
                hero.style.display = 'none';
                return;
            }

            btn.addEventListener('click', function (e) {
                e.preventDefault();
                hero.style.transition = 'opacity 180ms ease';
                hero.style.opacity = '0';
                setTimeout(function () { hero.style.display = 'none'; }, 220);
                localStorage.setItem(key, '1');
            });
        });
    </script>
</section>
