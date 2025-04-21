<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <title>Nomada-Wifi</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="w-full h-screen bg-[#010316] text-white">
        <div class="w-full h-[25%] flex items-center justify-center">
            @yield('title')
        </div>
        <div class="w-full h-[110vw] flex items-center justify-center px-[2vw]">
            <div class="w-full h-full px-[2vw] bg-[#13132D] rounded-lg">
                <div class="w-full h-full">
                    <div class="w-full pt-[6vw]">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>