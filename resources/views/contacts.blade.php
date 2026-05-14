@extends('layouts.app')

@section('content')
<section class="bg-blue-700 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">Контакты</h1>
        <p class="text-xl text-blue-100">Свяжитесь с нами удобным способом</p>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12">
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="font-bold text-lg mb-2">Телефон</h3>
                <a href="tel:{{ $settings['contact_phone'] ?? '' }}" class="text-blue-600">{{ $settings['contact_phone'] ?? '' }}</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="font-bold text-lg mb-2">Email</h3>
                <a href="mailto:{{ $settings['contact_email'] ?? '' }}" class="text-blue-600">{{ $settings['contact_email'] ?? '' }}</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="font-bold text-lg mb-2">Адрес</h3>
                <p>{{ $settings['contact_address'] ?? '' }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="font-bold text-lg mb-2">Режим работы</h3>
                <p>Пн-Пт: 9:00 - 20:00</p>
                <p>Сб-Вс: 10:00 - 18:00</p>
            </div>
        </div>
        <div>
            <div class="bg-white p-4 rounded-lg shadow mb-8">
                <iframe src="https://yandex.ru/map-widget/v1/?ll=53.204466%2C56.852640&z=12" width="100%" height="400" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection