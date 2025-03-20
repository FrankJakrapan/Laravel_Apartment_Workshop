<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบบริการงานหอพัก ออนไลน์</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-800">
    <x-sidebar />

    <div class="content">
        @yield('content')
    </div>
    
    @livewireScripts
</body>
</html>