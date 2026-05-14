@extends('layouts.app')

@section('content')
<section class="bg-blue-700 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">О компании</h1>
        <p class="text-xl text-blue-100">Профессиональный ремонт компьютеров с 2010 года</p>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-3xl text-center">
        <h2 class="text-3xl font-bold mb-8">Наша история</h2>
        <div class="text-left space-y-6 text-gray-700 leading-relaxed text-center">
Компания "Ремонт Компьютеров" была основана в 2010 году группой энтузиастов, увлеченных компьютерными технологиями. За более чем 15 лет работы мы выросли от небольшой мастерской до крупного сервисного центра с командой опытных специалистов.

Сегодня мы гордимся тем, что помогли тысячам клиентов решить их проблемы с компьютерной техникой. Наш опыт, профессионализм и ответственный подход к каждому заказу позволяют нам оставаться лидерами в сфере ремонта компьютеров.

Мы постоянно совершенствуем свои навыки, следим за новыми технологиями и используем только качественные комплектующие в работе.
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Наши принципы</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6 border rounded-lg">
                <div class="text-4xl font-bold text-blue-600 mb-4">1</div>
                <h3 class="text-xl font-bold mb-2">Честность</h3>
                <p class="text-gray-600">Говорим правду о стоимости ремонта.</p>
            </div>
            <div class="text-center p-6 border rounded-lg">
                <div class="text-4xl font-bold text-blue-600 mb-4">2</div>
                <h3 class="text-xl font-bold mb-2">Качество</h3>
                <p class="text-gray-600">Используем проверенные комплектующие.</p>
            </div>
            <div class="text-center p-6 border rounded-lg">
                <div class="text-4xl font-bold text-blue-600 mb-4">3</div>
                <h3 class="text-xl font-bold mb-2">Профессионализм</h3>
                <p class="text-gray-600">Решаем задачи любой сложности.</p>
            </div>
        </div>
    </div>
</section>
@endsection