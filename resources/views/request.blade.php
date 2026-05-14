@extends('layouts.app')

@section('content')
<section class="bg-blue-700 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">Оставить заявку</h1>
        <p class="text-xl text-blue-100">Заполните форму, и мы свяжемся с вами</p>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-lg">
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
        @endif

        <form action="/request" method="POST" class="bg-white p-8 rounded-lg shadow-md">
            @csrf

            <div class="mb-6">
                <label for="service_id" class="block text-sm font-medium text-gray-700 mb-2">Услуга *</label>
                <select name="service_id" id="service_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="">Выберите услугу</option>
                    @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Имя *</label>
                <input type="text" name="name" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-6">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Телефон *</label>
                <input type="tel" name="phone" id="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-6">
                <label for="problem_description" class="block text-sm font-medium text-gray-700 mb-2">Описание проблемы *</label>
                <textarea name="problem_description" id="problem_description" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">Отправить</button>
        </form>
    </div>
</section>
@endsection