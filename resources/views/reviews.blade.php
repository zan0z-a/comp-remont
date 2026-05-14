@extends('layouts.app')

@section('content')
<section class="bg-blue-700 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">Отзывы клиентов</h1>
        <p class="text-xl text-blue-100">Что говорят о нас</p>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-3xl">
        @if($reviews->count() > 0)
        <div class="bg-white p-8 rounded-lg shadow mb-12 text-center">
            <div class="text-5xl font-bold text-blue-600 mb-2">{{ number_format($avg, 1) }}</div>
            <div class="text-yellow-400 text-2xl mb-2">
                @for($i = 0; $i < 5; $i++)
                    @if($i < floor($avg))★@else☆@endif
                @endfor
            </div>
            <p class="text-gray-600">На основе {{ $reviews->count() }} отзывов</p>
        </div>
        @else
        <div class="text-center text-gray-500 py-10 bg-white rounded-lg shadow mb-12">
            <p>Пока нет отзывов.</p>
        </div>
        @endif

        @auth
        <div class="mb-12 text-center">
            <a href="#review-form" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Оставить отзыв</a>
        </div>
        @else
        <div class="mb-12 text-center">
            <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Войти, чтобы оставить отзыв</a>
        </div>
        @endauth

        <div class="space-y-6">
            @foreach($reviews as $review)
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h4 class="font-bold text-lg">{{ $review->name }}</h4>
                        <span class="text-sm text-gray-500">{{ $review->created_at->format('d.m.Y') }}</span>
                    </div>
                    <div class="text-yellow-400 text-xl">
                        @for($i = 0; $i < $review->rating; $i++)★@endfor
                    </div>
                </div>
                <p class="text-gray-700">{{ $review->text }}</p>
            </div>
            @endforeach
        </div>

        @auth
        <div id="review-form" class="mt-16 bg-white p-8 rounded-lg shadow">
            <h2 class="text-2xl font-bold mb-6">Оставить отзыв</h2>
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
            @endif

            <form action="/reviews" method="POST">
                @csrf
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Имя *</label>
                    <input type="text" name="name" required value="{{ auth()->user()->name }}" readonly class="w-full px-4 py-2 border rounded-lg bg-gray-100">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Оценка *</label>
                    <select name="rating" required class="w-full px-4 py-2 border rounded-lg">
                        <option value="">Выберите</option>
                        <option value="5">5 — Отлично</option>
                        <option value="4">4 — Хорошо</option>
                        <option value="3">3 — Нормально</option>
                        <option value="2">2 — Плохо</option>
                        <option value="1">1 — Очень плохо</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Отзыв *</label>
                    <textarea name="text" rows="4" required class="w-full px-4 py-2 border rounded-lg"></textarea>
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">Отправить</button>
                    <a href="/reviews" class="px-6 py-3 border rounded-lg hover:bg-gray-50">Отмена</a>
                </div>
            </form>
        </div>
        @endauth
    </div>
</section>
@endsection