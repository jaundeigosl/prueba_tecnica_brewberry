<div class="comment-container m-5 pl-[1%]">
    <div class="flex justify-center items center mb-3">
        <div class ="flex items-center w-[50%] justify-start">
            <div class="mr-3"> 
                {{$profile_image ?? '' }}
            </div>
            <div>
                {{$profile_name ?? ''}}
            </div>
        </div>
        <div class=" text-[#E41AD6] text-[4vw] sm:text-[30px] w-[50%] flex justify-end">
            Responder
        </div>

    </div>

    <div class="">
        {{$comment ?? ''}}
    </div>

</div>