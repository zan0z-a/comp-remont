@extends('layouts.app')

@section('content')
<section class="bg-blue-700 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">Наши услуги</h1>
        <p class="text-xl text-blue-100">Полный спектр услуг по ремонту</p>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <a href="/products/{{ $service->slug }}" class="block bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-bold mb-2">{{ $service->title }}</h3>
                <p class="text-gray-600 text-sm mb-4">{{ $service->description }}</p>
                <span class="text-blue-600 font-semibold">от {{ $service->price }} ₽</span>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <h2 class="text-3xl font-bold text-center mb-12">Как мы работаем</h2>
        <div class="grid md:grid-cols-4 gap-6 text-center">
            <div>
                <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">1</div>
                <h3 class="font-bold mb-2">Заявка</h3>
                <p class="text-sm text-gray-600">Оставьте заявку или позвоните</p>
            </div>
            <div>
                <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">2</div>
                <h3 class="font-bold mb-2">Диагностика</h3>
                <p class="text-sm text-gray-600">Бесплатная оценка</p>
            </div>
            <div>
                <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">3</div>
                <h3 class="font-bold mb-2">Ремонт</h3>
                <p class="text-sm text-gray-600">Быстро и качественно</p>
            </div>
            <div>
                <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">4</div>
                <h3 class="font-bold mb-2">Гарантия</h3>
                <p class="text-sm text-gray-600">Гарантия на работы</p>
            </div>
        </div>
        <div class="text-center mt-12">
            <a href="/request" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700">Оставить заявку</a>
        </div>
    </div>
</section>
@endsection