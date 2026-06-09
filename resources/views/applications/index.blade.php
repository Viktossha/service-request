<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Список заявок</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-stone-50 font-sans text-stone-900 antialiased">
        <main class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between gap-4">
                <h1 class="text-3xl font-semibold text-rose-950">Заявки</h1>
                <a href="{{ route('services') }}" class="text-sm font-medium text-rose-800 hover:text-rose-950">
                    Вернуться к услугам
                </a>
            </div>

            @if ($applications->isEmpty())
                <div class="mt-8 rounded-xl border border-stone-200 bg-white p-8 text-center text-stone-500">
                    Заявок пока нет.
                </div>
            @else
                <div class="mt-8 overflow-hidden rounded-xl border border-stone-200 bg-white">
                    <div class="hidden grid-cols-[1fr_1.2fr_2fr_1fr] gap-6 border-b border-stone-200 bg-stone-100 px-6 py-3 text-sm font-medium text-stone-600 md:grid">
                        <span>Имя</span>
                        <span>Email</span>
                        <span>Сообщение</span>
                        <span>Дата создания</span>
                    </div>

                    <div class="divide-y divide-stone-200">
                        @foreach ($applications as $application)
                            <article class="grid gap-4 px-5 py-6 md:grid-cols-[1fr_1.2fr_2fr_1fr] md:gap-6 md:px-6">
                                <div>
                                    <p class="mb-1 text-xs font-medium text-stone-500 md:hidden">Имя</p>
                                    <p class="font-medium">{{ $application->name }}</p>
                                </div>

                                <div class="min-w-0">
                                    <p class="mb-1 text-xs font-medium text-stone-500 md:hidden">Email</p>
                                    <a
                                        href="mailto:{{ $application->email }}"
                                        class="break-words text-rose-800 hover:text-rose-950"
                                    >
                                        {{ $application->email }}
                                    </a>
                                </div>

                                <div class="min-w-0">
                                    <p class="mb-1 text-xs font-medium text-stone-500 md:hidden">Сообщение</p>
                                    <p class="whitespace-pre-line break-words text-stone-700">{{ $application->message }}</p>
                                </div>

                                <div>
                                    <p class="mb-1 text-xs font-medium text-stone-500 md:hidden">Дата создания</p>
                                    <time datetime="{{ $application->created_at->toIso8601String() }}" class="text-sm text-stone-600">
                                        {{ $application->created_at->format('d.m.Y H:i') }}
                                    </time>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif
        </main>
    </body>
</html>
