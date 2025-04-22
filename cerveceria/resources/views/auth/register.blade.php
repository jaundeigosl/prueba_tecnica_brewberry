@extends('layouts.guest')

@section('title')

    <h1 class="font-bold text-[8vw] text-center">
        Formulario de  Registro 
    </h1>

@endsection

@section('content')
    <div class="mb-[4vw]">
        <h2 class="font-bold text-[4vw] text-center">Introduzca todos los datos para proceder con el registro</h2>
    </div>

    <form action="{{route('registrarse')}}" method="POST"  >
        @csrf
        <div class="px-[16vw] flex flex-wrap">

            <div class="h-[12vw] mb-[2vw] flex flex-wrap">
                
                <label class="w-full text-[4vw]" for="email"> Email</label>
                <input  class="text-[4vw] h-[6vw] pl-[1vw]  border-2 border-white rounded-lg" type="email"  placeholder="Ejemplo@gmail.com" id="email" required>
            </div>

            <div class="hidden text-red-500 text-[3vw] my-[2vw] error-message" id="email-error"> Ingrese un Email valido </div>

            <div  class="h-[12vw] mb-[2vw] flex flex-wrap">
                <label class="w-full text-[4vw]" for="first_name"> Nombre</label>
                <input  class="text-[4vw] h-[6vw] pl-[1vw]  border-2 border-white rounded-lg" type="text"  placeholder="Bruce" id="first_name" required>
            </div>

            <div class="hidden text-red-500 text-[3vw] my-[2vw] error-message" id="first_name-error"></div>

            <div  class="h-[12vw] mb-[2vw] flex flex-wrap">
                <label class="w-full text-[4vw]" for="last_name"> Apellido</label>
                <input  class="text-[4vw] h-[6vw] pl-[1vw] border-2 border-white rounded-lg" type="text"  placeholder="Wayne" id="last_name" required>
            </div>

            <div class="hidden text-red-500 text-[3vw] my-[2vw] error-message" id="last_name-error"></div>

            <div  class="h-[12vw] mb-[2vw] flex flex-wrap">
                <label class="w-full text-[4vw]" for="password"> Contraseña</label>
                <input  class="text-[4vw] h-[6vw] pl-[1vw]  border-2 border-white rounded-lg" type="password" placeholder="contraseña secreta" id="password" required>
            </div>
            
            <div class="hidden text-red-500 text-[3vw] my-[2vw] error-message" id="password-error"></div>

            <div  class="h-[12vw] mb-[2vw] flex flex-wrap">
                <label class="w-full text-[4vw]" for="password-confirm">Confirmar Contraseña</label>
                <input  class="text-[4vw] h-[6vw] pl-[1vw] border-2 border-white rounded-lg" type="password" placeholder="repetir contranseña" id="password_confirm" required>
            </div>

            <div class="hidden text-red-500 text-[3vw] my-[2vw] error-message" id="password_confirm-error"></div>

            <div  class="w-full h-[12vw] mb-[2vw] flex items-end">
                <div class="w-full h-[7.5vw] bg-linear-to-r from-[#3540E8] to-[#E41AD6] rounded-lg">
                    <div class=" w-full h-full flex justify-center items-center font-bold text-[4vw] text-center text-white"> 
                        <button class="text-[4vw]rounded-lg" type="submit" id="send-button">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>

        //Validates if the type match (name and lastname only)
        function inputTypeValidation(event){

            const container = event.target;
            const errorContainer = document.getElementById(container.id + '-error');

            if(container.validity.typeMismatch){
                errorContainer.style.display = 'block';
            }else{
                errorContainer.style.display ='none';
            }
        }

        //email events
        const emailContainer = document.getElementById('email');
        emailContainer.addEventListener('input', async (event) =>{

            let container = event.target;
            let errorContainer = document.getElementById(container.id + '-error');

            if (container.validity.typeMismatch) {

                errorContainer.style.display = 'block';
                errorContainer.innerHTML = 'Ingrese un Email valido';

            } else {

                errorContainer.style.display = 'none';

                let email = container.value;

                //here i should put some kind delay

                try{
                    //ajax request to check if the email already exist in the db
                    let response = await fetch("{{ route('check-email') }}", {

                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },

                        body: JSON.stringify({ email: email })

                    });

                    let data = await response.json();
                    if(response.ok && data.response == 'Ok'){
                        if(data.exist){
                            errorContainer.style.display = 'block';
                            errorContainer.innerHTML = 'Este Email ya fue registrado';
                        } 
                    }else{
                        if(!response.ok){
                            throw new Error(response.statusText +" "+ response.status);
                        }else{
                            throw new Error("Internal Server Error 500");
                        }
                    }

                }catch(error){
                    alert(error.message);
                }
            }
        });

        const firstNameContainer = document.getElementById('first_name');

        const lastNameContainer = document.getElementById('last_name');

        const passwordContainer = document.getElementById('password');

        const passwordConfirmContainer = document.getElementById('password_confirm');


    </script>

@endsection