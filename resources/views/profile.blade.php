@extends('layouts.app')

@section('content')
<section class="bg-blue-700 text-white py-16">
    <div class="container mx-auto px-4 flex items-center space-x-4">
        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-blue-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
        <div>
            <h1 class="text-3xl font-bold">Личный кабинет</h1>
            <p class="text-blue-100">{{ $user->name }}</p>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 grid md:grid-cols-3 gap-8">
        <div class="md:col-span-1">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-6">Профиль</h2>
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif
                <form method="POST" action="/profile">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Имя</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Новый пароль</label>
                        <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg">
                        <input type="password" name="password_confirmation" class="w-full mt-2 px-4 py-2 border rounded-lg" placeholder="Повторите">
                    </div>
                    <button type="submit" class="w-full bg-gray-200 text-gray-800 py-2 rounded-lg hover:bg-gray-300">Сохранить</button>
                </form>
            </div>
        </div>

        <div class="md:col-span-2">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Заявки</h2>
                    <a href="/request" class="text-blue-600 hover:underline text-sm">+ Новая</a>
                </div>
                @if($orders->count() > 0)
                <div class="space-y-4">
                    @foreach($orders as $order)
                    <div class="border rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-lg">{{ $order->service ? $order->service->title : 'Общая заявка' }}</h3>
                                <p class="text-sm text-gray-500">#{{ $order->id }} от {{ $order->created_at->format('d.m.Y') }}</p>
                                <p class="mt-2 text-gray-700">{{ Str::limit($order->problem_description, 100) }}</p>
                                <p class="text-sm text-gray-500 mt-1">Тел: {{ $order->phone }}</p>
                            </div>
                            <div>
                                @if($order->status === 'pending')
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">На рассмотрении</span>
                                @elseif($order->status === 'in_progress')
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">В работе</span>
                                @else
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Завершена</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 text-center py-8">Нет заявок.</p>
                @endif
            </div>

            <div class="grid grid-cols-3 gap-4 mt-8">
                <div class="bg-white p-4 rounded-lg shadow text-center">
                    <div class="text-2xl font-bold text-blue-600">{{ $orders->count() }}</div>
                    <div class="text-sm text-gray-600">Всего</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow text-center">
                    <div class="text-2xl font-bold text-yellow-600">{{ $orders->where('status', 'in_progress')->count() }}</div>
                    <div class="text-sm text-gray-600">В работе</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow text-center">
                    <div class="text-2xl font-bold text-green-600">{{ $orders->where('status', 'completed')->count() }}</div>
                    <div class="text-sm text-gray-600">Завершено</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection