@extends('layouts.app')

@section('content')
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/2 bg-gray-200 flex items-center justify-center min-h-[300px]">
                    @if($service->image)
                    <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
                    @else
                    <span class="text-gray-400">Нет изображения</span>
                    @endif
                </div>
                <div class="md:w-1/2 p-8 md:p-12">
                    <h1 class="text-3xl font-bold mb-4">{{ $service->title }}</h1>
                    <div class="text-2xl text-blue-600 font-bold mb-6">от {{ $service->price }} ₽</div>
                    <div class="prose prose-blue mb-8 text-gray-700">
                        {!! nl2br(e($service->full_description)) !!}
                    </div>
                    <a href="/request" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 w-full text-center">Оставить заявку</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection