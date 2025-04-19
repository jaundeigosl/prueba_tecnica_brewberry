@extends('layouts.layout')

@section('options')
    <a href="{{route('home')}}">
        <img class="w-[7vw] max-w-[40px]" src="{{asset('images/icons/top_bar_icons/arrow_icon.svg')}}" alt="menu icon">
    </a>
@endsection

@section('home')
    <div class="flex justify-center">
        <img class="w-[7vw] max-w-[40px]" src="{{asset('images/icons/bottom_bar_icons/home.svg')}}" alt="home icon">
    </div>
    <div class="text-[3vw] sm:text-[17px] text-center">Inicio</div>
    
@endsection


