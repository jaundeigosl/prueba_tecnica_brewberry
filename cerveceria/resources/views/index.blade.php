
@extends('layouts.guest')

@section('title')
    <h1  class="font-bold text-[8vw] text-center">Encuentra la cerveceria ideal aquí</h1>
@endsection

@section('content')

    <div class=" flex flex-wrap items-center justify-center mb-[10vw] ">
        <div class="pt-[4vw] h-[25vw]">
            <h2 class="font-bold text-[6vw] text-center">Registrate y comienza tu busqueda</h2>    
        </div>
        <span class="w-full flex items-center justify-center mt-[5vw]">
            <a href="{{route('registrarse')}}" class="font-bold w-[45vw] text-[7vw] text-center bg-linear-to-r from-[#3540E8] to-[#E41AD6] rounded-lg px-3 py-1 text-white"> Registrarse</a>
        </span>
    </div>
    <div class=" flex flex-wrap items-center justify-center  mt-[10vw] ">
        <div class="pt-[4vw] h-[25vw]">
            <span>
                <h2 class="font-bold text-[6vw] text-center">¿Ya estas registrado?</h2>    
            </span>
            <span>
                <h2 class="font-bold text-[6vw] text-center">Accede a tu cuenta</h2>
            </span>
        </div>
        <span class="w-full flex items-center justify-center mt-[5vw]">
            <a href="{{route('login')}}" class="font-bold w-[45vw] text-[7vw] text-center bg-linear-to-r from-[#3540E8] to-[#E41AD6] rounded-lg px-3 py-1 text-white">Acceder</a>
        </span>
    </div>

@endsection