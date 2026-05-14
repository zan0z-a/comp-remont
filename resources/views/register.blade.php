@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-md">
        <div class="bg-white p-8 rounded-lg shadow">
            <h2 class="text-2xl font-bold mb-6 text-center">Регистрация</h2>
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Имя</label>
                    <input type="text" name="name" required value="{{ old('name') }}" class="w-full px-4 py-2 border rounded-lg @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-2 border rounded-lg @error('email') border-red-500 @enderror">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Пароль</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 border rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Зарегистрироваться</button>
            </form>
            <div class="mt-4 text-center text-sm">
                <p class="text-gray-600">Есть аккаунт? <a href="{{ route('login') }}" class="text-blue-600">Войти</a></p>
            </div>
        </div>
    </div>
</section>
@endsection