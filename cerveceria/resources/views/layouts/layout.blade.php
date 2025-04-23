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
        <nav class="w-full h-[6%] fixed top-0 z-1 ">
            <x-nav.bar>
                <x-slot name="firstIcon">
                    <div class="w-full flex items-center">
                        <div class="first-icon pl-[8%]">
                            @yield('options')
                        </div>
                    </div>
                </x-slot>
                <x-slot name="secondIcon">
                    <div class="w-full flex justify-end items-center">
                        <div class="mr-[8%]">
                            <a href="">
                                <img class="w-[7vw] max-w-[40px]" src="{{asset('images/icons/top_bar_icons/trailing-icon.svg')}}" alt="menu icon notifications">
                            </a>
                        </div>
                        <div class="mr-[8%]">
                            <a href="">
                                <img class="w-[7vw] max-w-[40px]" src="{{asset('images/icons/top_bar_icons/person_icon.svg')}}" alt="menu icon profile">
                            </a>
                        </div>
                    </div>
                </x-slot>
            </x-nav.bar>
        </nav>

        <div class="top-0 w-full h-[7%] bg-[#010316]">
        </div>

       @yield('notification')

        @yield('body')

        <div class="bottom-0 w-full h-[10%] bg-[#010316]">
        </div>

        <nav class="w-full h-[10%] fixed bottom-0 z-1 ">
            <x-nav.bar>
                <x-slot name="firstIcon">
                    <div class="first-icon w-[33%] flex justify-center ">
                        <a href="">
                            <div class="flex justify-center">
                                <img class="w-[7vw] max-w-[40px]" src="{{asset('images/icons/bottom_bar_icons/calendar.svg')}}" alt="calendar icon">
                            </div>
                            <div class="text-[4vw] sm:text-[20px] text-center">Calendario</div>
                        </a>
                    </div>
                </x-slot>
                <x-slot name="secondIcon">
                    <div class="w-[33%] flex justify-center">
                        <a href="{{route('home')}}">
                            @yield('home')
                        </a>
                    </div>
                </x-slot>
                <x-slot name="thirdIcon">
                    <div class="w-[33%] flex flex justify-center">
                        <a href="">
                            <div class="flex justify-center">
                                <img class="w-[7vw] max-w-[40px]" src="{{asset('images/icons/bottom_bar_icons/chat.svg')}}" alt="menu icon profile">
                            </div>
                            <div class="text-[4vw] sm:text-[20px] text-center">Chat</div>
                        </a>
                    </div>
                </x-slot>
            </x-nav.bar>
        </nav>
    </body>
</html>