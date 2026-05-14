@extends('layouts.app')

@section('content')
<section class="bg-blue-700 text-white py-6">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Админ панель</h1>
        <a href="/" class="text-white-300 hover:underline">← На сайт</a>
    </div>
</section>

<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">{{ session('success') }}</div>
        @endif

        <!-- Вкладки -->
        <div class="flex space-x-2 mb-6 border-b pb-2">
            <button onclick="showTab('services')" class="tab-btn px-4 py-2 bg-blue-600 text-white rounded" data-tab="services">Услуги</button>
            <button onclick="showTab('requests')" class="tab-btn px-4 py-2 bg-gray-200 rounded" data-tab="requests">Заявки</button>
            <button onclick="showTab('articles')" class="tab-btn px-4 py-2 bg-gray-200 rounded" data-tab="articles">Статьи</button>
            <button onclick="showTab('reviews')" class="tab-btn px-4 py-2 bg-gray-200 rounded" data-tab="reviews">Отзывы</button>
        </div>

        <!-- Услуги -->
        <div id="services" class="tab-content">
            <h2 class="text-xl font-bold mb-4">Управление услугами</h2>
            <form method="POST" action="{{ route('admin.service.store') }}" enctype="multipart/form-data" class="bg-white p-4 rounded shadow mb-6 grid grid-cols-2 gap-4">
                @csrf
                <input name="title" placeholder="Название" required class="border p-2 rounded">
                <input name="slug" placeholder="Slug" required class="border p-2 rounded">
                <input name="price" type="number" step="0.01" placeholder="Цена" required class="border p-2 rounded">
                <textarea name="description" placeholder="Кратко" class="border p-2 rounded col-span-2"></textarea>
                <textarea name="full_description" placeholder="Полное описание" class="border p-2 rounded col-span-2"></textarea>
                <input type="file" name="image" class="col-span-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded col-span-2">Добавить услугу</button>
            </form>
            <div class="space-y-3">
                @foreach($services as $s)
                <div class="bg-white p-4 rounded shadow flex justify-between">
                    <div>
                        <h3 class="font-bold">{{ $s->title }}</h3>
                        @if($s->image)
                            <img src="{{ asset($s->image) }}" alt="{{ $s->title }}" class="w-16 h-16 object-cover mt-1 rounded">
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <form method="POST" action="{{ route('admin.service.delete', $s->id) }}" onsubmit="return confirm('Удалить?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 text-sm">Удалить</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Заявки -->
        <div id="requests" class="tab-content hidden">
            <h2 class="text-xl font-bold mb-4">Заявки</h2>
            <div class="space-y-3">
                @foreach($requests as $r)
                <div class="bg-white p-4 rounded shadow">
                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-bold">{{ $r->service ? $r->service->title : 'Общая' }} — {{ $r->name }}</h3>
                            <p class="text-sm">📞 {{ $r->phone }} | ✉️ {{ $r->email ?: '-' }}</p>
                            <p class="text-sm mt-1">{{ Str::limit($r->problem_description, 80) }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <form method="POST" action="{{ route('admin.request.status', $r->id) }}">
                                @csrf @method('PUT')
                                <select name="status" onchange="this.form.submit()" class="border p-1 rounded text-sm">
                                    <option value="pending" {{ $r->status=='pending'?'selected':'' }}>На рассмотрении</option>
                                    <option value="in_progress" {{ $r->status=='in_progress'?'selected':'' }}>В работе</option>
                                    <option value="completed" {{ $r->status=='completed'?'selected':'' }}>Завершена</option>
                                </select>
                            </form>
                            <form method="POST" action="{{ route('admin.request.delete', $r->id) }}" onsubmit="return confirm('Удалить?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Статьи -->
        <div id="articles" class="tab-content hidden">
            <h2 class="text-xl font-bold mb-4">Добавить статью</h2>
            <form method="POST" action="{{ route('admin.article.store') }}" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
                @csrf
                <input name="title" placeholder="Заголовок" required class="border p-2 rounded w-full mb-3">
                <input name="slug" placeholder="Slug" required class="border p-2 rounded w-full mb-3">
                <input name="preview_text" placeholder="Краткое описание" class="border p-2 rounded w-full mb-3">
                <textarea name="content" placeholder="Текст статьи" required class="border p-2 rounded w-full mb-3 h-32"></textarea>
                <input type="file" name="image" class="mb-3">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Опубликовать</button>
            </form>
        </div>

        <!-- Отзывы -->
        <div id="reviews" class="tab-content hidden">
            <h2 class="text-xl font-bold mb-4">Модерация отзывов</h2>
            @if($pendingReviews->count() == 0)
                <p class="text-gray-500">Нет отзывов на проверке.</p>
            @else
                <div class="space-y-3">
                    @foreach($pendingReviews as $rv)
                    <div class="bg-white p-4 rounded shadow flex justify-between">
                        <div>
                            <h3 class="font-bold">{{ $rv->name }} <span class="text-yellow-500">({{ $rv->rating }}/5)</span></h3>
                            <p class="text-sm text-gray-500">{{ $rv->created_at->format('d.m.Y') }}</p>
                            <p class="mt-1">{{ $rv->text }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <form method="POST" action="{{ route('admin.review.approve', $rv->id) }}">
                                @csrf
                                <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded text-sm">Одобрить</button>
                            </form>
                            <form method="POST" action="{{ route('admin.review.delete', $rv->id) }}" onsubmit="return confirm('Удалить?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm">Удалить</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

<script>
function showTab(id) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('bg-blue-600','text-white'));
    document.getElementById(id).classList.remove('hidden');
    event.target.classList.add('bg-blue-600','text-white');
}
</script>
@endsection