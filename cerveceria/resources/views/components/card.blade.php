<div class="rounded bg-[#13132D] m-[2%] pl-[1%]">
  <div class="px-[2vw] py-[1vw] h-auto">
      {{$brewberry_name ?? ''}}
    </div>
    <div class="flex justify-center items-center">

      <div class="mr-[1vw]">
        {{$brewberry_image ?? '' }}
      </div>
      <div class="flex flex-wrap">

        <div class="flex mb-[2vw]">
          <img class="w-[5vw] max-w-[25px] ml-[2vw]" src="{{asset('images/icons/card_icons/location_icon.svg')}}" alt="location icon">
          <div class="flex justify-center items-center ml-[2vw]">
            {{$brewberry_location ?? ''}}
          </div>
        </div>

        <div class="flex">
          <img class="w-[5vw] max-w-[25px] ml-[2vw]" src="{{asset('images/icons/card_icons/phone_icon.svg')}}" alt="phone icon">
          <div class="flex justify-center items-center ml-[2vw]">
            {{$brewberry_phone_number ?? ''}}
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="px-6 pt-4 pb-2 flex justify-center mb-[1vw]">
    <a href="{{route('cerveceria' , ['id' => '__id__'])}}" class="link-redirect w-[200px] sm:w-[300px] text-center bg-linear-to-r from-[#3540E8] to-[#E41AD6] rounded-lg px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">Ver más</a>
  </div>
</div>