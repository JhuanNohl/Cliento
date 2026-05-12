<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Entrar - {{ config('app.name', 'Cliento') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#eeeeee] font-sans text-[#050505] antialiased">
        <main class="grid min-h-screen place-items-center px-4 py-8 sm:px-6 lg:px-8">
            <section class="grid w-full max-w-6xl overflow-hidden border-[10px] border-[#050505] bg-white shadow-[0_24px_80px_rgba(0,0,0,0.16)] lg:grid-cols-[minmax(0,1fr)_minmax(440px,0.78fr)]">
                <aside class="hidden min-h-[660px] flex-col justify-between bg-[#050505] p-8 text-white lg:flex">
                    <a href="{{ url('/') }}" class="inline-flex w-fit items-center gap-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#050505]">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-md bg-white text-[#050505]">
                            <x-application-logo class="h-7 w-7 fill-current" />
                        </span>
                        <span class="text-xl font-bold">Cliento</span>
                    </a>

                    <div class="mx-auto max-w-xl text-center">
                        <p class="inline-flex min-h-9 items-center justify-center rounded-full border border-[#333333] bg-[#101010] px-4 text-xs font-bold uppercase tracking-[0.22em] text-[#d8d8d8]">Cliento</p>
                        <h1 class="mt-6 text-5xl font-bold leading-[1.04] tracking-normal">
                            Acesse agora e organize sua carteira, contatos e as próximas ações.
                        </h1>
                        <p class="mx-auto mt-6 max-w-md text-lg leading-8 text-[#d8d8d8]">
                            Carteira organizada é sinônimo de uma receita previsível.
                        </p>
                    </div>

                    <div class="grid grid-cols-3 gap-3 border-t border-[#252525] pt-5">
                        <div data-hover-card class="min-h-[92px] rounded-lg border border-[#333333] bg-[#101010] p-4 text-center shadow-[0_16px_40px_rgba(0,0,0,0.22)]">
                            <p class="text-2xl font-bold">24</p>
                            <p class="mt-1 text-xs font-semibold text-[#bdbdbd]">Empresas</p>
                        </div>
                        <div data-hover-card class="min-h-[92px] rounded-lg border border-[#333333] bg-[#101010] p-4 text-center shadow-[0_16px_40px_rgba(0,0,0,0.22)]">
                            <p class="text-2xl font-bold">17</p>
                            <p class="mt-1 text-xs font-semibold text-[#bdbdbd]">Oportunidades</p>
                        </div>
                        <div data-hover-card class="min-h-[92px] rounded-lg border border-[#333333] bg-[#101010] p-4 text-center shadow-[0_16px_40px_rgba(0,0,0,0.22)]">
                            <p class="text-2xl font-bold">9</p>
                            <p class="mt-1 text-xs font-semibold text-[#bdbdbd]">Ações hoje</p>
                        </div>
                    </div>
                </aside>

                <div class="flex min-h-[660px] flex-col bg-[#f5f5f5]">
                    <header class="flex items-center justify-between border-b border-[#dedede] bg-white px-5 py-4 sm:px-8 lg:hidden">
                        <a href="{{ url('/') }}" class="inline-flex items-center gap-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#050505] focus:ring-offset-2">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-md bg-white text-[#050505] ring-1 ring-[#dedede]">
                                <x-application-logo class="h-6 w-6 fill-current" />
                            </span>
                            <span class="text-lg font-bold">Cliento</span>
                        </a>
                    </header>

                    <div class="hidden justify-end px-8 pt-7 lg:flex">
                        <a href="{{ url('/') }}" class="inline-flex items-center gap-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#050505] focus:ring-offset-2">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-md bg-white text-[#050505] ring-1 ring-[#dedede]">
                                <x-application-logo class="h-5 w-5 fill-current" />
                            </span>
                            <span class="text-base font-bold">Cliento</span>
                        </a>
                    </div>

                    <div class="flex flex-1 items-center justify-center px-5 py-10 sm:px-8 lg:py-4">
                        <div class="w-full max-w-[420px]">
                            <div class="mb-7 text-center">
                                <h2 class="text-3xl font-bold leading-tight text-[#050505]">Bem-vindo de volta</h2>
                                <p class="mx-auto mt-3 max-w-sm text-sm leading-6 text-[#686868]">
                                    Faça login para continuar.
                                </p>
                            </div>

                            <x-auth-session-status class="mb-5 rounded-lg border border-[#dedede] bg-white px-4 py-3 text-sm font-medium text-[#050505]" :status="session('status')" />

                            <form data-hover-card method="POST" action="{{ route('login') }}" class="rounded-lg border border-[#dedede] bg-white p-6 shadow-[0_18px_48px_rgba(0,0,0,0.08)] sm:p-7">
                                @csrf

                                <div>
                                    <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-[#050505]" />
                                    <x-text-input id="email" class="mt-2 block h-12 w-full rounded-lg border-[#cfcfcf] bg-[#fbfbfb] px-4 text-base text-[#050505] shadow-none transition focus:border-[#050505] focus:bg-white focus:ring-[#050505]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="mt-5">
                                    <x-input-label for="password" value="Senha" class="text-sm font-semibold text-[#050505]" />
                                    <x-text-input id="password" class="mt-2 block h-12 w-full rounded-lg border-[#cfcfcf] bg-[#fbfbfb] px-4 text-base text-[#050505] shadow-none transition focus:border-[#050505] focus:bg-white focus:ring-[#050505]"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="current-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                </br>
                                <div class="mb-6 h-1 rounded-full bg-[#050505]"></div>

                                <div class="mt-6 flex flex-wrap items-center justify-between gap-3">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-[#cfcfcf] text-[#050505] shadow-sm focus:ring-[#050505]" name="remember">
                                        <span class="ms-2 text-sm font-medium text-[#686868]">Lembrar-me</span>
                                    </label>

                                    @if (Route::has('password.request'))
                                        <a class="text-sm font-semibold text-[#050505] underline decoration-[#bdbdbd] underline-offset-4 transition hover:decoration-[#050505] focus:outline-none focus:ring-2 focus:ring-[#050505] focus:ring-offset-2" href="{{ route('password.request') }}">
                                            Esqueceu sua senha?
                                        </a>
                                    @endif
                                </div>

                                <button type="submit" class="mt-6 inline-flex h-12 w-full items-center justify-center rounded-lg border border-[#050505] bg-[#050505] px-5 text-sm font-bold uppercase tracking-[0.12em] text-white shadow-[0_14px_24px_rgba(0,0,0,0.16)] transition hover:-translate-y-0.5 hover:bg-[#1c1c1c] focus:outline-none focus:ring-2 focus:ring-[#050505] focus:ring-offset-2">
                                    Entrar
                                </button>
                            </form>

                            @if (Route::has('register'))
                                <div data-hover-card class="mt-5 rounded-lg border border-[#dedede] bg-white/80 px-5 py-4 text-center text-sm text-[#686868] shadow-sm">
                                    Ainda não tem cadastro?
                                    <a href="{{ route('register') }}" class="font-bold text-[#050505] underline decoration-[#bdbdbd] underline-offset-4 transition hover:decoration-[#050505] focus:outline-none focus:ring-2 focus:ring-[#050505] focus:ring-offset-2">
                                        Criar conta
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <script>
            document.querySelectorAll('[data-hover-card]').forEach((card) => {
                card.style.transformStyle = 'preserve-3d';
                card.style.transition = 'transform 180ms ease, box-shadow 180ms ease, border-color 180ms ease';

                card.addEventListener('pointermove', (event) => {
                    const rect = card.getBoundingClientRect();
                    const x = (event.clientX - rect.left) / rect.width - 0.5;
                    const y = (event.clientY - rect.top) / rect.height - 0.5;

                    card.style.transform = `translateY(-4px) rotateX(${y * -3}deg) rotateY(${x * 3}deg)`;
                    card.style.boxShadow = '0 22px 54px rgba(0, 0, 0, 0.16)';
                });

                card.addEventListener('pointerleave', () => {
                    card.style.transform = 'translateY(0) rotateX(0) rotateY(0)';
                    card.style.boxShadow = '';
                });
            });
        </script>
    </body>
</html>
