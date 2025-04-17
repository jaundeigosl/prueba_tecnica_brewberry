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

    <body class="w-full h-screen bg-black text-white">
        <nav class="w-full h-[6%] fixed top-0 z-1 ">
            <x-nav.bar>
                <x-slot name="firstIcon">
                    <div class="w-full flex">
                        <div class="first-icon pl-[8%]">
                            <img class="w-[8vw] max-w-[40px]" src="{{asset('images/icons/top_bar_icons/bars_menu_icon.svg')}}" alt="menu icon">
                        </div>
                    </div>
                </x-slot>
                <x-slot name="secondIcon">
                    <div class="w-full flex justify-end">
                        <div class="mr-[8%]">
                            <img class="w-[8vw] max-w-[40px]" src="{{asset('images/icons/top_bar_icons/trailing-icon.svg')}}" alt="menu icon notifications">
                        </div>
                        <div class="mr-[8%]">
                            <img class="w-[8vw] max-w-[40px]" src="{{asset('images/icons/top_bar_icons/person_icon.svg')}}" alt="menu icon profile">
                        </div>
                    </div>
                </x-slot>
            </x-nav.bar>
        </nav>

        @yield('body')

        <nav class="w-full h-[6%] fixed bottom-0 z-1 ">
            <x-nav.bar>
                <x-slot name="firstIcon">
                    <div class="first-icon w-full flex pl-[8%]">
                        <img class="w-[8vw] max-w-[40px]" src="{{asset('images/icons/bottom_bar_icons/calendar.svg')}}" alt="calendar icon">
                    </div>
                </x-slot>
                <x-slot name="secondIcon">
                    <div class="w-full flex justify-center">
                        <img class="w-[8vw] max-w-[40px]" src="{{asset('images/icons/bottom_bar_icons/home.svg')}}" alt="home icon">
                    </div>
                </x-slot>
                <x-slot name="thirdIcon">
                    <div class="w-full flex justify-end pr-[8%]">
                        <img class="w-[8vw] max-w-[40px]" src="{{asset('images/icons/bottom_bar_icons/chat.svg')}}" alt="menu icon profile">
                    </div>
                </x-slot>
            </x-nav.bar>
        </nav>
    </body>
</html>