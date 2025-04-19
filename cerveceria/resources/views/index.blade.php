@extends('layouts.layout')

@section('notification')

<div class="w-full bg-[#FEEBCB] flex border-l-[1vw] border-[#DD6B20]">
    <div class="flex align-center ml-[4vw]">
        <img class ="w-[5vw] max-w-[40px]" src="{{asset('images/icons/alert_icons/alert_icon.svg')}}">
    </div>
    <div class="text-black text-[4vw] sm:text-[25px] my-[4vw] ml-[3vw]">
        <span class="font-bold block">Happy Hour</span>
        <span>16:00 - 17:00 hs MEX</span>
    </div>
</div>

@endsection


@section('options')
    <a href="">
        <img class="w-[7vw] max-w-[40px]" src="{{asset('images/icons/top_bar_icons/bars_menu_icon.svg')}}" alt="menu icon">
    </a>
@endsection

@section('home')
    <div class="flex justify-center">
        <img class="w-[7vw] max-w-[40px]" src="{{asset('images/icons/bottom_bar_icons/home_active.svg')}}" alt="home icon">
    </div>
    <div class="text-[4vw] sm:text-[20px] text-center text-[#3540E8]">Inicio</div>
    
@endsection

@section('body')

<div>
    <h1 class=" m-[5%] font-bold text-[8vw]">Todas las opciones</h1>
</div>
<div class="w-full">
    <div class="relative min-h-52 ms:min-h-60 overflow-x-auto overflow-y-hidden rounded-lg">
        <div id="carrousel-elements-all" class="flex w-max min-w-full"> 
        </div>
    </div>
</div>

<div>
    <h1 class=" m-[5%] font-bold text-[8vw]">Opciones en california</h1>
</div>
<div class="w-full">
    <div class="relative min-h-56  ms:min-h-60 overflow-x-auto overflow-y-hidden rounded-lg">
        <div id="carrousel-elements-california" class="flex w-max min-w-full"> 
        </div>
    </div>
</div>




<script>
    
    const BREBERRY_AMOUNT = 50;
//Function

    function addRedirectLink(id){
        let container = document.getElementById(id);

        let child = document.getElementsByClassName('link-redirect');
        let childContainer = child[0];

        childContainer.href.replace('__id__',id);
    }



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

                let id = data[i].id;
                let name = data[i].name;

                container.innerHTML += `
                <div id="${id}" class="flex flex-shrink-0 max-h-[250px] sm:max-h-[280px] min-w-[300px] max-w-[320px] sm:max-w-[580px] mx-[1vw]">
                    <x-card>
                        <x-slot name="brewberry_name">
                            <h1 class="font-bold text-[5vw] sm:text-[25px] mb-[2vw] line-clamp-1">
                                ${name}
                            </h1
                        </x-slot>

                        <x-slot name="brewberry_image">
                            <img class="w-[40vw] max-w-[80px] sm:max-w-[120px] rounded-full" src="{{asset('images/brewberries/cerveceria.jpg')}}" alt="brewberry image">
                        </x-slot>

                        <x-slot name="brewberry_location">
                            <span class="text-[4vw] sm:text-[20px] line-clamp-2">
                                ${address}
                            </span>
                        </x-slot>

                        <x-slot name="brewberry_phone_number">
                            <span class="text-[4vw] sm:text-[20px]">
                                ${phone}
                            </span>
                        </x-slot>
                    </x-card>
                </div>`

                addRedirectLink(id);
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