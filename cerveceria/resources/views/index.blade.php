@extends('layouts.layout')

@section('body')

<div>
    <h1 class=" m-[5%] font-bold text-[8vw]">Todas las opciones</h1>
</div>
<div class="w-full">
    <div class="relative min-h-56 overflow-x-auto overflow-y-hidden rounded-lg">
        <div id="carrousel-elements-all" class="flex w-max min-w-full"> 
        </div>
    </div>
</div>

<div>
    <h1 class=" m-[5%] font-bold text-[8vw]">Opciones en california</h1>
</div>
<div class="w-full">
    <div class="relative min-h-56 overflow-x-auto overflow-y-hidden rounded-lg">
        <div id="carrousel-elements-california" class="flex w-max min-w-full"> 
        </div>
    </div>
</div>




<script>
    
    const BREBERRY_AMOUNT = 50;
//Function



//Function that fetchs all the brweberries from the api-

    async function fetchBreweries(location = '') {
        try {

            let url;

            if(location == ''){

                url = `https://api.openbrewerydb.org/v1/breweries`;
            }
            else{
                url =  `https://api.openbrewerydb.org/v1/breweries?by_state=${location}&per_page=${BREBERRY_AMOUNT}`;
            }
            
            const response = await fetch(url, {});
            if (!response.ok) {
                throw new Error(response.statusText + response.status);
            }
            const data = await response.json();

            let container;

            if(location !== ''){
                container = document.getElementById('carrousel-elements-california');
            }else{
                container = document.getElementById('carrousel-elements-all');
            }

            for(let i = 0 ; i < BREBERRY_AMOUNT; i++){

                let address = '';

                if(data[i].street !== null && data[i].street !== ''){
                    address = data[i].street + ', ';
                }

                if(data[i].city !== null && data[i].city !== ''){
                    address = address + data[i].city + ', ';
                }

                if(data[i].state !== null && data[i].state !== ''){
                    address = address + data[i].state;
                }
               
                if(address == ''){
                    address = 'No Disponible';
                }

                let phone = data[i].phone;

                if(phone == null || phone == ''){
                    phone = 'No disponible';
                }

                container.innerHTML += `
                <div class="flex flex-shrink-0 min-w-68 max-w-72 sm:max-w-[420px] mx-[1vw]">
                    <x-card>
                        <x-slot name="brewberry_name">
                            <h1 class="font-bold text-[5vw] sm:text-[25px] mb-[4vw] line-clamp-1">
                                ${data[i].name}
                            </h1
                        </x-slot>

                        <x-slot name="brewberry_image">
                            <img class="w-[40vw] max-w-[80px] sm:max-w-[120px] rounded-full" src="{{asset('images/brewberries/cerveceria.jpg')}}" alt="brewberry image">
                        </x-slot>

                        <x-slot name="brewberry_location">
                            <span class="text-[4vw] sm:text-[17px]">
                                ${address}
                            </span>
                        </x-slot>

                        <x-slot name="brewberry_phone_number">
                            <span class="text-[4vw] sm:text-[17px]">
                                ${phone}
                            </span>
                        </x-slot>
                    </x-card>
                </div>`
            }

            console.log('exito', data); 

        } catch (error) {
            console.log('error ', error);
        }

    }

    fetchBreweries();
    fetchBreweries('california');
    
</script>

@endsection