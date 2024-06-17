{{-- <div class="min-h-screen flex sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
    <div>d</div>
</div> --}}

<div class="min-h-screen px-32 xl:px-52 flex items-center justify-center">
        <div class="flex h-full border rounded-md overflow-hidden ">
            <div class=" hidden flex-1 lg:block w-[50%]">
                <img class="w-full object-cover object-top" src="{{ asset('images/login-page-bg.jpg') }}" alt="">
            </div>
            <div class="flex flex-1 flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-2  w-[50%]">
              <div class="mx-auto w-full max-w-sm lg:w-96">
                {{$slot}}
              </div>
            </div>
        </div>
</div>
