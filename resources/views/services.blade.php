<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Услуги ателье</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-rose-50/40 font-sans text-stone-900 antialiased">
        <main class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">
            <section>
                <h1 class="text-3xl font-semibold text-rose-950">Услуги ателье</h1>

                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <article class="flex h-full flex-col rounded-xl bg-rose-100/70 p-3 shadow-sm">
                        <img
                            src="{{ asset('images/services/service-1.png') }}"
                            alt="Пошив одежды на заказ"
                            class="aspect-square w-full rounded-lg object-cover"
                        >
                        <div class="flex-1 px-3 pt-5 pb-3">
                            <h2 class="text-xl font-semibold text-rose-950">Пошив одежды на заказ</h2>
                            <p class="mt-2 text-stone-600">Индивидуальный пошив по вашим меркам.</p>
                        </div>
                    </article>

                    <article class="flex h-full flex-col rounded-xl bg-rose-100/70 p-3 shadow-sm">
                        <img
                            src="{{ asset('images/services/service-2.png') }}"
                            alt="Ремонт одежды"
                            class="aspect-square w-full rounded-lg object-cover"
                        >
                        <div class="flex-1 px-3 pt-5 pb-3">
                            <h2 class="text-xl font-semibold text-rose-950">Ремонт одежды</h2>
                            <p class="mt-2 text-stone-600">Замена молний, подгонка и восстановление изделий.</p>
                        </div>
                    </article>

                    <article class="flex h-full flex-col rounded-xl bg-rose-100/70 p-3 shadow-sm">
                        <img
                            src="{{ asset('images/services/service-3.png') }}"
                            alt="Подгонка по фигуре"
                            class="aspect-square w-full rounded-lg object-cover"
                        >
                        <div class="flex-1 px-3 pt-5 pb-3">
                            <h2 class="text-xl font-semibold text-rose-950">Подгонка по фигуре</h2>
                            <p class="mt-2 text-stone-600">Корректировка посадки готовой одежды.</p>
                        </div>
                    </article>
                </div>
            </section>

            <section class="mt-12 rounded-xl border border-rose-100 bg-white p-6 shadow-sm sm:p-8">
                <h2 class="text-2xl font-semibold text-rose-950">Оставить заявку</h2>

                @if (session('success'))
                    <p class="mt-4 rounded-lg bg-green-100 p-4 text-green-800">
                        Заявка успешно отправлена.
                    </p>
                @endif

                <form action="{{ route('applications.store') }}" method="POST" class="mt-6 grid gap-5">
                    @csrf

                    <div>
                        <label for="name" class="mb-2 block font-medium">Имя</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            required
                            class="w-full rounded-lg border border-stone-300 px-4 py-3 outline-none focus:border-rose-700"
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="mb-2 block font-medium">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full rounded-lg border border-stone-300 px-4 py-3 outline-none focus:border-rose-700"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="mb-2 block font-medium">Сообщение</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            required
                            minlength="10"
                            class="w-full rounded-lg border border-stone-300 px-4 py-3 outline-none focus:border-rose-700"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="w-fit rounded-lg bg-rose-800 px-6 py-3 font-medium text-white hover:bg-rose-900"
                    >
                        Отправить заявку
                    </button>
                </form>
            </section>
        </main>
    </body>
</html>
