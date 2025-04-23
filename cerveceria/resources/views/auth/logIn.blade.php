@extends('layouts.guest')

@section('title')

    <h1 class="font-bold text-[8vw] text-center">
        Formulario de acceso
    </h1>

@endsection

@section('content')
    <div class="mb-[4vw]">
        <h2 class="font-bold text-[4vw] text-center">Introduzca sus credenciales para proceder</h2>
    </div>

    <form action="{{route('login')}}" method="POST"  >
        @csrf
        <div class="px-[16vw] flex flex-wrap">

            <div class="h-[12vw] mb-[2vw] flex flex-wrap">
                
                <label class="w-full text-[4vw]" for="email"> Email</label>
                <input  class="text-[4vw] h-[6vw] border-2 border-white rounded-lg" type="email"  placeholder="Ejemplo@gmail.com" id="email" name="email" required>
            </div>

            <div  class="h-[12vw] mb-[2vw] flex flex-wrap">
                <label class="w-full text-[4vw]" for="password"> Contraseña</label>
                <input  class="text-[4vw] h-[6vw] border-2 border-white rounded-lg" type="password" placeholder="contraseña secreta" id="password" name="password" required>
            </div>
            
            @if($errors->any())
            
            <div class="text-red-500 text-[3vw] my-[2vw] error-message">
                @foreach ($errors->all() as $error)
                    <li><span>{{$error}}</span></li>
                @endforeach
            </div>

            @endif

            <div  class="w-full h-[12vw] mb-[2vw] flex items-end">
                <div class="w-full h-[7.5vw] bg-linear-to-r from-[#3540E8] to-[#E41AD6] rounded-lg">
                    <div class=" w-full h-full flex justify-center items-center font-bold text-[4vw] text-center text-white"> 
                        <button class="text-[4vw]rounded-lg" type="submit" id="send-button">Acceder</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>

        //Validates if the type match
       

    </script>

@endsection