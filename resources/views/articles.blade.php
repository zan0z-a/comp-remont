@extends('layouts.app')

@section('content')
<section class="bg-blue-700 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">Полезные статьи</h1>
        <p class="text-xl text-blue-100">Советы по уходу за техникой</p>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $article)
            <a href="/articles/{{ $article->slug }}" class="block bg-white rounded-lg shadow overflow-hidden">
                <div class="h-48 bg-gradient-to-r from-blue-500 to-blue-700 flex items-center justify-center p-6">
                    <h3 class="text-white text-xl font-bold text-center">{{ $article->title }}</h3>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-4 space-x-4">
                        <span>{{ $article->published_at->format('d.m.Y') }}</span>
                        <span>{{ $article->views }} просм.</span>
                    </div>
                    <p class="text-gray-700 mb-4">{{ $article->preview_text }}</p>
                    <span class="text-blue-600 font-semibold">Читать далее →</span>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-12">
            {{ $articles->links() }}
        </div>
        <div class="mt-16 bg-blue-50 p-8 rounded-lg border border-blue-200">
            <h3 class="text-xl font-bold mb-4">Нужна консультация?</h3>
            <p class="text-gray-700 mb-4">Наши специалисты готовы помочь.</p>
            <a href="/request" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Позвонить</a>
        </div>
    </div>
</section>
@endsection