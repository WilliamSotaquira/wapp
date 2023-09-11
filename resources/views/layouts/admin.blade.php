<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title ?? config('app.name', 'wapp') }}</title>
    <link rel="icon" type="image/png" href="/images/Icono_wdo.png">
    <link rel="stylesheet" href="/css/style.css">


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Select 2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />


    @stack('styles')

    <!-- Styles -->
    @vite(['resources/css/app.css','resources/js/app.js'])

    @livewireStyles


</head>

<body class="font-sans antialiased" id="body">
    <x-jet-banner />

    @php
    $links = [
    [
    'title' => 'Dashboard',
    'url' => route('admin.dashboard'),
    'active' => request()->routeIs('admin.dashboard'),
    'icon' => 'fa-solid fa-gauge',
    ],
    [
    'title' => 'Tasks',
    'url' => route('admin.tasks.index'),
    'active' => request()->routeIs('admin.tasks.index'),
    'icon' => 'fa-solid fa-list-check',
    ],
    [
    'title' => 'Sprints',
    'url' => route('admin.sprints.index'),
    'active' => request()->routeIs('admin.sprints.index'),
    'icon' => 'fa-sharp fa-solid fa-rotate-right',
    ],
    [
    'title' => 'Billeteras',
    'url' => route('admin.wallets.index'),
    'active' => request()->routeIs('admin.wallets.index'),
    'icon' => 'fa-solid fa-wallet',
    ],
    [
    'title' => 'Presupuestos',
    'url' => route('admin.budgets.index'),
    'active' => request()->routeIs('admin.budgets.index'),
    'icon' => 'fa-solid fa-file-invoice-dollar',

    ],
    ];
    @endphp

    <div class="flex" x-data="{
       open: false,
       openSiderbar: true,
    }">
        <div class="w-64 flex-shrink-0 hidden lg:block" :class="{
          'lg:block': openSiderbar,
      }">

            @include('layouts.partials.admin.sidebar')

        </div>

        <div class="flex-1 bg-slate-950">

            @include('layouts.partials.admin.navegation')

            <div class="max-w-4xl m-auto my-4 bg-dashboard">

                {{ $slot }}


                <x-botton-nav></x-botton-nav>
            </div>




        </div>
    </div>

    <!-- Scripts -->
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/9f9dbedfda.js" crossorigin="anonymous"></script>

    @stack('scripts')
    @livewireScripts
</html>
