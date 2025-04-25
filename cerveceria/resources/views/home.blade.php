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

<div class="pt-2" id="dropdown-container">
  <button id="dropdown-button">
    <img class="w-[7vw] max-w-[40px]" src="{{asset('images/icons/top_bar_icons/bars_menu_icon.svg')}}" alt="menu icon">
  </button>

  <div id="dropdown-menu" class="absolute w-[35vw] bg-white rounded-md shadow-lg z-50 hidden origin-top-left">
    <div class="py-1">
        <form method="POST" action="{{route('autenticacion-salida')}}">
            @csrf
            <button type="submit" class="block px-4 text-[3vw] text-black">
                Cerrar sesión
            </button>
        </form>
    </div>
  </div>
</div>
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
    const CARROUSSEL_GENERAL_ID = 'carrousel-elements-all';
    const CARROUSEL_STATE_ID = 'carrousel-elements-';
    const STATE = 'california';
    const PERPAGE = 3;
    const MAX_PAGE_NUMBER = 10;
    let pageCounterGeneralBrewbery = 1;
    let pageCounterStateFilterBrewbery = 1;

    //Adding the events for the dropdown (logout)

    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown-menu');
        const dropdownContainer = document.getElementById('dropdown-container');

        dropdownButton.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function(e) {
            if (!dropdownContainer.contains(e.target)) {
            dropdownMenu.classList.add('hidden');
            }
        });

        dropdownMenu.addEventListener('transitionend', function() {
            if (dropdownMenu.classList.contains('hidden')) {
            dropdownMenu.style.removeProperty('transform');
            dropdownMenu.style.removeProperty('opacity');
            }
        });
    });

//Function that adds to each item its custom link

    function addRedirectLink(id ,idcontainer, location = ''){

        let container;

        container = document.querySelector("#" + CSS.escape(idcontainer) + " .card-container .link-container .link-redirect");
        container.href = `/Brewbery/${id}`;
        
    }

//Function that insert the html for the cards

    function insertBrewbery(container, id, name, address,phone){
        container.innerHTML += `
            <div id="${id}" class="flex flex-shrink-0 max-h-[250px] sm:max-h-[280px] min-w-[300px] max-w-[320px] sm:max-w-[580px] mx-[1vw]">
                <x-card>
                    <x-slot name="brewberry_name">
                        <h1 class="font-bold text-[5vw] sm:text-[25px] mb-[2vw] line-clamp-1">
                            ${name}
                        </h1>
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
            </div>`;
    }

//Function that fetchs all the brewberies

    async function fetchBreweries(actualPage){
        try {
            console.log(actualPage)

            let url = `https://api.openbrewerydb.org/v1/breweries?page=${actualPage}&per_page=${PERPAGE}`
            const response = await fetch(url, {});

            if (!response.ok) {
                throw new Error(response.statusText +" "+ response.status);
            }
            const data = await response.json();

            let container = document.getElementById('carrousel-elements-all');

            data.forEach((item)=>{

                let address = '';

                if(item.street !== null && item.street !== ''){
                    address = item.street + ', ';
                }

                if(item.city !== null && item.city !== ''){
                    address = address + item.city + ', ';
                }

                if(item.state !== null && item.state !== ''){
                    address = address + item.state;
                }
               
                if(address == ''){
                    address = 'No Disponible';
                }

                let phone = item.phone;

                if(phone == null || phone == ''){
                    phone = 'No Disponible';
                }

                let id = item.id;
                let name = item.name;

                insertBrewbery(container,id,name,address,phone)
                addRedirectLink(id, id); 
                    
            });

        }catch(error) {
            alert(error.message);
        }

    }

//Function that fetches the brewbery by state

    async function fetchBreweriesByState(actualPage){
        console.log(actualPage)
        try{

            let url = `https://api.openbrewerydb.org/v1/breweries?by_state=${STATE}&page=${actualPage}&per_page=${PERPAGE}`;
            const response = await fetch(url, {});
            
            if(!response.ok) {
                throw new Error(response.statusText +" "+ response.status);
            }
            const data = await response.json();

            let container = document.getElementById(`${CARROUSEL_STATE_ID}${STATE}`);

            data.forEach((item)=>{

                let address = '';

                if(item.street !== null && item.street !== ''){
                    address = item.street + ', ';
                }

                if(item.city !== null && item.city !== ''){
                    address = address + item.city + ', ';
                }

                if(item.state !== null && item.state !== ''){
                    address = address + item.state;
                }
               
                if(address == ''){
                    address = 'No Disponible';
                }

                let phone = item.phone;

                if(phone == null || phone == ''){
                    phone = 'No Disponible';
                }

                let id = item.id +"-"+item.state;;
                let name = item.name;

                insertBrewbery(container,id,name,address,phone)
                addRedirectLink(item.id,id, STATE); 
                    
            });
        }catch(error){
            alert(error.message);
        }
    }

    //Function that dynamically insert the button and the end of the carrousel

    function insertButton(carrouselContainerId, state = ''){

        let container = document.getElementById(carrouselContainerId);
        let id = 'load-more-all';
        if(state){
            id = id + "-" + state;
        }

        container.innerHTML +=`
            <div class="button-container flex items-center m-4">
                <button id="${id}" class="bg-gray-800 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        ` ;
    }

    //Functions that fetchs the next page

    function addButtonPaginationEvent(selector){

        let id  = 'load-more-all';

        if(selector){
            id = id +"-"+ selector
        }
        let container = document.getElementById(id);
        let buttonContainer = container.parentElement;
        if(selector){

            container.addEventListener('click', ()=>{
                
                if(MAX_PAGE_NUMBER >= pageCounterStateFilterBrewbery){
                    buttonContainer.remove();
                    fetchBreweriesByState(pageCounterStateFilterBrewbery).then(()=>{
                        insertButton(CARROUSEL_STATE_ID+STATE , STATE);
                        addButtonPaginationEvent(STATE);
                        pageCounterStateFilterBrewbery++;
                        scrollToEnd(CARROUSEL_STATE_ID + STATE);
                    });
                
                }
            });

        }else{
            container.addEventListener('click', ()=>{
                if(MAX_PAGE_NUMBER >=pageCounterGeneralBrewbery){
                    buttonContainer.remove();
                    fetchBreweries(pageCounterGeneralBrewbery).then(()=>{
                        insertButton(CARROUSSEL_GENERAL_ID);
                        addButtonPaginationEvent();
                        pageCounterGeneralBrewbery++;
                        scrollToEnd(CARROUSSEL_GENERAL_ID);
                    });
                    
                }
            });
        }

    }

    //Function that relocate the page button

    function scrollToEnd(carrouselId) {
        const innerContainer = document.getElementById(carrouselId);
        const outerContainer = innerContainer.parentElement;
        outerContainer.scrollLeft = outerContainer.scrollWidth - outerContainer.clientWidth;
    }

    //Initialazing the carrousels

    fetchBreweries(pageCounterGeneralBrewbery).then(()=>{
        insertButton(CARROUSSEL_GENERAL_ID);
        addButtonPaginationEvent();
        pageCounterGeneralBrewbery++;
        scrollToEnd(CARROUSSEL_GENERAL_ID);
    });
    fetchBreweriesByState(pageCounterStateFilterBrewbery).then(()=>{
        insertButton(CARROUSEL_STATE_ID+STATE , STATE);
        addButtonPaginationEvent(STATE);
        pageCounterStateFilterBrewbery++;
        scrollToEnd(CARROUSEL_STATE_ID + STATE);
    });


</script>

@endsection