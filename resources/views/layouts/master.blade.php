<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Scripts -->
    <script src="/js/app.js"></script>

    @yield('top_script')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    @yield('top_style')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">HSS</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="/hss/meal">膳食會員</a></li>
                            <li><a class="dropdown-item" href="/hss/meal/delivery">飯線</a></li>
                            <li><a class="dropdown-item" href="/hss/delivery_route">送飯路線</a></li>
                            <li><a class="dropdown-item" href="/hss/care_worker">照顧員</a></li>
                            <li><a class="dropdown-item" href="/hss/duty_roster">編更</a></li>
                            <li class="border-bottom"><a class="dropdown-item" href="/hss/case">個案</a></li>
                            <li><a class="dropdown-item" href="/hss/finance/fee">服務費</a></li>
                            <li><a class="dropdown-item" href="/hss/finance/income">收入記錄</a></li>
                            <li><a class="dropdown-item" href="/hss/finance/invoice">單據</a></li>
                            <li><a class="dropdown-item" href="/hss/finance/meal">飯餐</a></li>
                            <li><a class="dropdown-item" href="/hss/finance/service">收費總結表</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="notification" data-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-bell" style="font-size:1.5rem;"></i>
                            <span class="badge badge-warning navbar-badge">3</span>
                        </a>
                        <ul class="dropdown-menu pb-0" aria-labelledby="notification" style="min-width:280px; margin-left:-250px; box-shadow:3px 3px 7px rgba(0, 0, 0, 0.5);">
                            <li style="padding: 5px 10px; font-size:0.9rem; text-align:right;">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create-notification">+ 即時傳遞通知</button>
                            </li>
                            <li class="p-2" style="background-color:#E9ECEF; font-size:0.9rem;">全部訊息</li>
                            <li>
                                <ul style="max-height:380px; overflow-y:scroll; list-style:none; margin:0; padding:0; background-color:#E9ECEF;">
                                    @foreach($notifications as $n)
                                        <li class="notification-item" style="background-color:white; margin:4px; border-radius:5px;">
                                            <div onclick="location.href='/ecs/dcss_staff_training/1/edit'">
                                                <div class="mb-2">{{ $n['from'] }}︰{{ $n['message'] }}</div>
                                                <p class="text-right mb-1" style="font-size:0.8rem;">
                                                    {!! $n['read'] ? '<i class="fas fa-check-circle"></i>' : '' !!} {{ $n['create_date'] }}
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

                @include('common.component.create_notification')
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

@yield('bottom_script')
</body>
</html>
