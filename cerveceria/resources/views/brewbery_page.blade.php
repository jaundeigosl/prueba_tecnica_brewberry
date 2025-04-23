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
    <div class="text-[4vw] sm:text-[17px] text-center">Inicio</div>
    
@endsection

@section('body')
    <div class="pl-[4vw] pt-[3vw] mb-[7vw]">
        <div id ="brewberry-name" class="mb-[7vw]">
        </div>

        <div  id ="brewberry-location" class="mb-[4vw] flex">
            <div class="flex items-center mr-[2vw]">
                <img class="w-[5vw] max-w-[25px]" src="{{asset('images/icons/card_icons/location_icon.svg')}}" alt="location icon">
            </div>
        </div>

        <div  id ="brewberry-phone" class="mb-[2vw] flex">
            <div class="flex items-center mr-[2vw]">
                <img class="w-[5vw] max-w-[25px]" src="{{asset('images/icons/card_icons/phone_icon.svg')}}" alt="phone icon">
            </div>
        </div>
    </div>

    <div class="w-full pl-[2vw] pr-[2vw]">
        <div class="relative h-32 sm:h-56 overflow-x-auto overflow-y-hidden rounded-lg">
            <div id="carrousel-elements-images" class="flex w-max min-w-full"> 
            </div>
        </div>
    </div>

    <div class="mb-[7vw]">
        <h2 class="font-bold text-[7vw] mt-[5vw] pl-[4vw]">Opiniones</h2>
    </div>

    <div class="pl-[4vw] pr-[4vw]">
        <div class="w-full">
            <div class="relative h-64  overflow-y-auto overflow-x-hidden rounded-lg">
                <div id="carrousel-elements-comments"> 
                </div>
            </div>
        </div>
    </div>

    <div class="pl-[4vw] pr-[4vw] mb-[7vw] text-white">
        <div class="h-[40vw] px-1">
            <span class="m-[2vw] w-full">
                <a href="" class="w-full h-[25px] min-h-[12vw] font-bold text-[4vw] text-center bg-linear-to-r from-[#3540E8] to-[#E41AD6] rounded-lg px-3 py-1 text-sm font-semibold text-white flex items-center justify-center">Reservar mesa</a>  
            </span>
            <span class="m-[2vw]">
                <a href="" class="w-full h-[26px] min-h-[12vw] bg-linear-to-r from-[#3540E8] to-[#E41AD6] rounded-lg px-0.5 flex items-center justify-center">
                    <div class="w-full h-[25px] min-h-[11.5vw] bg-black rounded-lg">
                        <div class=" w-full h-full flex justify-center items-center font-bold text-[4vw] text-center text-white"> 
                            Opciones de transporte
                        </div>
                    </div>
                </a>  
            </span>
        </div> 
    </div>

<script>
    const COMMENTSAMOUNT = 10;
    const PHOTOSAMOUNT = 5;

    function insertComments(){

        let container = document.getElementById('carrousel-elements-comments');
        for(let i = 0; i < COMMENTSAMOUNT; i++){
            container.innerHTML += `
            <x-comment>

                <x-slot name="profile_image">
                    <img class="w-[7vw] max-w-[40px] rounded-full" src="{{asset('images/users/user.png')}}"></img>
                </x-slot>

                <x-slot name="profile_name">
                    <div class="text-white text-[4vw] sm:text-[30px]">
                        Juan
                    </div>
                </x-slot>

                <x-slot name="comment">
                    <div class="text-white line-clamp-2 text-[3vw] sm:text-[25px]">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </div
                </x-slot>
            </x-comment>
            `;
        }
    }

    //function that insert images of the brewbery
    function insertImages(){

        let carrouselContainer = document.getElementById('carrousel-elements-images');

        for(let i = 0; i < PHOTOSAMOUNT; i++){

            carrouselContainer.innerHTML += `
                <div class="m-[1vw]">
                    <image class="h-24 w-40 sm:h-40 sm:w-72 rounded-md sm:rounded-lg" src="{{asset('images/brewberries/cerveceria.jpg')}}" alt="brewberry image">
                </div>
            `;

        }

    }

    //function that consults the api for an specific brewbery
    async function getBrewberryById(id){

        try {

            let url = `https://api.openbrewerydb.org/v1/breweries/${id}`;
            
            const response = await fetch(url, {});

            if (!response.ok) {

                throw new Error(response.statusText + response.status);
            }

            const data = await response.json();

            let title = data.name;
            let location = '';

            if(data.street !== null && data.street !== ''){
                location = data.street + ', ';
            }

            if(data.city !== null && data.city !== ''){
                location = location + data.city + ', ';
            }

            if(data.state !== null && data.state !== ''){
                location = location + data.state;
            }

            let phone = data.phone;

            let titleContainer = document.getElementById('brewberry-name');

            let locationContainer = document.getElementById('brewberry-location');

            let phoneContainer = document.getElementById('brewberry-phone');

            titleContainer.innerHTML += `<h1 class="font-bold text-[8vw]">${title}</h1>`

            locationContainer.innerHTML += `<div class="flex items-center text-[4vw] sm:text-[25px]">${location}</div>`

            phoneContainer.innerHTML += `<div class="text-[4vw] sm:text-[25px]">${phone}</div>`

        
        }catch (error) {

            alert(error.message);
        }

    }

    getBrewberryById("{{$id}}");
    insertImages();
    insertComments();

</script>
@endsection


