@extends('layouts.app')

@section('content')
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4 max-w-4xl">
        <article class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if($article->image)
            <div class="h-64 w-full bg-gray-200">
                <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
            </div>
            @else
            <div class="h-64 bg-gradient-to-r from-blue-500 to-blue-700 flex items-center justify-center p-8">
                <h1 class="text-3xl md:text-4xl font-bold text-white text-center">{{ $article->title }}</h1>
            </div>
            @endif

            <div class="p-8 md:p-12">
                @if(!$article->image)
                <h1 class="text-3xl font-bold mb-6">{{ $article->title }}</h1>
                @endif

                <div class="flex items-center text-sm text-gray-500 mb-8 space-x-4 border-b pb-4">
                    <span>Опубликовано: {{ $article->published_at->format('d.m.Y') }}</span>
                    <span>{{ $article->views }} просм.</span>
                </div>

                <div class="prose prose-blue max-w-none text-gray-800 leading-relaxed">
                    {!! $article->content !!}
                </div>

                <div class="mt-12 pt-8 border-t">
                    <a href="/articles" class="text-blue-600 hover:underline font-semibold">← Вернуться к списку</a>
                </div>
            </div>
        </article>
    </div>
</section>
@endsection