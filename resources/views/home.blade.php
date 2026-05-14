@extends('layouts.app')

@section('content')
<section class="bg-blue-700 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Профессиональный ремонт компьютеров</h1>
        <p class="text-xl mb-8 text-blue-100">Быстро, качественно, с гарантией</p>
        <div class="flex justify-center space-x-4">
            <a href="/request" class="bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">Оставить заявку</a>
            <a href="/products" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-500 border border-blue-500">Наши услуги</a>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Почему выбирают нас</h2>
        <div class="grid md:grid-cols-3 gap-8 text-center">
            <div class="p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-blue-600 text-2xl">✓</div>
                <h3 class="text-xl font-bold mb-2">Опыт с 2010 года</h3>
                <p class="text-gray-600">Более 15 лет успешной работы.</p>
            </div>
            <div class="p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-blue-600 text-2xl">✓</div>
                <h3 class="text-xl font-bold mb-2">Быстрый ремонт</h3>
                <p class="text-gray-600">Большинство работ в день обращения.</p>
            </div>
            <div class="p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-blue-600 text-2xl">✓</div>
                <h3 class="text-xl font-bold mb-2">Гарантия</h3>
                <p class="text-gray-600">Гарантия на все выполненные работы.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Популярные услуги</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($services as $service)
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-bold mb-2">{{ $service->title }}</h3>
                <p class="text-gray-600 text-sm mb-4">{{ $service->description }}</p>
                <span class="text-blue-600 font-semibold">от {{ $service->price }} ₽</span>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="/products" class="text-blue-600 font-semibold hover:underline">Смотреть все услуги →</a>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Отзывы клиентов</h2>
        @if($reviews->count() > 0)
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($reviews as $review)
            <div class="bg-gray-50 p-6 rounded-lg border">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h4 class="font-bold">{{ $review->name }}</h4>
                        <span class="text-xs text-gray-500">{{ $review->created_at->format('d.m.Y') }}</span>
                    </div>
                    <div class="text-yellow-400">
                        @for($i = 0; $i < $review->rating; $i++)★@endfor
                    </div>
                </div>
                <p class="text-gray-700 text-sm">{{ $review->text }}</p>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="/reviews" class="text-blue-600 font-semibold hover:underline">Читать все отзывы →</a>
        </div>
        @else
        <div class="text-center text-gray-500 py-10 bg-gray-50 rounded-lg">
            <p>Пока нет отзывов.</p>
        </div>
        @endif
    </div>
</section>
@endsection