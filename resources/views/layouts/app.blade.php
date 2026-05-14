<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['seo_title'] ?? 'Ремонт Компьютеров' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    @include('includes.header')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('includes.footer') {{-- Футер должен быть здесь --}}

</body>
</html>