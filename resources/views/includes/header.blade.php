<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="/" class="text-xl font-bold text-blue-700">PC Ремонт</a>
        
        <nav class="hidden md:flex space-x-6">
            <a href="/" class="text-gray-600 hover:text-blue-600">Главная</a>
            <a href="/about" class="text-gray-600 hover:text-blue-600">О компании</a>
            <a href="/products" class="text-gray-600 hover:text-blue-600">Услуги</a>
            <a href="/request" class="text-gray-600 hover:text-blue-600">Заявка</a>
            <a href="/contacts" class="text-gray-600 hover:text-blue-600">Контакты</a>
            <a href="/articles" class="text-gray-600 hover:text-blue-600">Статьи</a>
            <a href="/reviews" class="text-gray-600 hover:text-blue-600">Отзывы</a>
        </nav>

        <div class="flex items-center space-x-4">
            <a href="tel:{{ $settings['contact_phone'] ?? '' }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition hidden sm:block">
                {{ $settings['contact_phone'] ?? '+7 (999) 000-00-00' }}
            </a>
            
            @auth
                @if(auth()->user()->is_admin)
                    <a href="/admin" class="bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-700 text-sm font-medium">Админ панель</a>
                @endif
                <a href="/profile" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>{{ auth()->user()->name }}</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500 text-sm">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-blue-600 font-medium">Войти</a>
            @endauth
        </div>
    </div>
</header>