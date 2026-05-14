<footer class="bg-gray-900 text-white py-10">
    <div class="container mx-auto px-4 grid md:grid-cols-4 gap-8">
        <div>
            <h3 class="text-xl font-bold mb-4">PC Ремонт</h3>
            <p class="text-gray-400 text-sm">{{ $settings['seo_description'] ?? '' }}</p>
        </div>
        <div>
            <h4 class="font-bold mb-4">Навигация</h4>
            <ul class="space-y-2 text-gray-400 text-sm">
                <li><a href="/" class="hover:text-white">Главная</a></li>
                <li><a href="/products" class="hover:text-white">Услуги</a></li>
                <li><a href="/articles" class="hover:text-white">Статьи</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold mb-4">Контакты</h4>
            <ul class="space-y-2 text-gray-400 text-sm">
                <li>{{ $settings['contact_phone'] ?? '' }}</li>
                <li>{{ $settings['contact_email'] ?? '' }}</li>
                <li>{{ $settings['contact_address'] ?? '' }}</li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold mb-4">Режим работы</h4>
            <p class="text-gray-400 text-sm">Пн-Пт: 9:00 - 20:00</p>
            <p class="text-gray-400 text-sm">Сб-Вс: 10:00 - 18:00</p>
        </div>
    </div>
</footer>