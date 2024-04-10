<x-app-layout>

    <x-content-layout title='{{$company}}' subtitle="clients" companyidss="{{ $companyid }}" secLinkss="clients.createClientById"  userButtonss="Create new client" button='Go back' link="account.index" >




        <div class="grid grid-cols-1 {{count($clients)<=1 ? 'md:grid-cols-1' : 'md:grid-cols-2' }}   gap-4 ">

            @foreach ($clients as $client)
            <div class="  border-b rounded-lg border-gray-200 bg-white px-4 py-5 sm:px-6 ">
                <div class="flex justify-between items-center font-bold ">
                    <h2 class="text-2xl text-blue-600">Client Details </h2>
                    <a href="{{route('clients.update',['id'=>$client->id] )}}" class="text-blue-600 ">

                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                    </a>
                </div>
                <div class="divide-y pt-2">
                    <div class="py-2 flex items-center space-x-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" viewBox="0 0 24 24"><path fill="currentColor" d="M5.85 17.1q1.275-.975 2.85-1.537T12 15q1.725 0 3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4Q8.675 4 6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1M12 13q-1.475 0-2.488-1.012T8.5 9.5q0-1.475 1.013-2.488T12 6q1.475 0 2.488 1.013T15.5 9.5q0 1.475-1.012 2.488T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22"/></svg>
                        </div>
                        <div>
                            <p class="text-lg font-bold">Client Name</p>
                            <p class="text-gray-600 font-bold">{{$client->fname}} {{$client->lname}}</p>
                        </div>

                    </div>
                    <div class="py-2 flex items-center space-x-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" viewBox="0 0 24 24"><path fill="currentColor" d="M12 3c2.21 0 4 1.79 4 4s-1.79 4-4 4s-4-1.79-4-4s1.79-4 4-4m4 10.54c0 1.06-.28 3.53-2.19 6.29L13 15l.94-1.88c-.62-.07-1.27-.12-1.94-.12s-1.32.05-1.94.12L11 15l-.81 4.83C8.28 17.07 8 14.6 8 13.54c-2.39.7-4 1.96-4 3.46v4h16v-4c0-1.5-1.6-2.76-4-3.46"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-lg font-bold">Designation</p>
                            <p class="text-gray-600 font-bold">{{$client->designation}}</p></div>

                    </div>
                    <div class="py-2 flex items-center space-x-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" viewBox="0 0 24 24"><path fill="currentColor" d="M8.25 18q-2.6 0-4.425-1.825T2 11.75q0-2.6 1.825-4.425T8.25 5.5h9.25q1.875 0 3.188 1.313T22 10q0 1.875-1.312 3.188T17.5 14.5H8.75q-1.15 0-1.95-.8T6 11.75q0-1.15.8-1.95T8.75 9H18v2H8.75q-.325 0-.537.213T8 11.75q0 .325.213.538t.537.212h8.75q1.05-.025 1.775-.737T20 10q0-1.05-.725-1.775T17.5 7.5H8.25q-1.775-.025-3.012 1.225T4 11.75q0 1.75 1.238 2.975T8.25 16H18v2z"/></svg>
                        </div>
                        <div>
                            <p class="text-lg font-bold">Linkdinurl</p>
                            <p class="text-gray-600 font-bold">{{$client->linkdinurl ? $client->linkdinurl : "-"}}</p>
                        </div>

                    </div>
                </div>
                <hr />

                <div class="pt-4 font-bold ">
                    <h2 class="text-2xl text-blue-600">Client Email</h2>
                </div>
                <div class="divide-y">
                    @foreach ($emails as $email)
                        @if (count($email)>0)
                            @if ($email[0]->clients_id == $client->id)
                                @foreach ($email as $item)
                                    <div class="py-2 flex items-center space-x-2">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" viewBox="0 0 24 24"><path fill="currentColor" d="M4 20q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h16q.825 0 1.413.588T22 6v12q0 .825-.587 1.413T20 20zm8-7.175q.125 0 .263-.038t.262-.112L19.6 8.25q.2-.125.3-.312t.1-.413q0-.5-.425-.75T18.7 6.8L12 11L5.3 6.8q-.45-.275-.875-.012T4 7.525q0 .25.1.438t.3.287l7.075 4.425q.125.075.263.113t.262.037"/></svg>
                                        </div>
                                        <div>
                                            <p class="text-lg font-bold">{{$item->mail}}</p>
                                            <p class="text-gray-600 font-bold">{{$item->type}}</p>
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        @endif
                    @endforeach


                </div>
                <hr />
                <div class="pt-4 font-bold ">
                    <h2 class="text-2xl text-blue-600">Client Phone</h2>
                </div>
                <div class="divide-y">
                    @foreach ($phones as $phone)

                        @if (count($phone)>0)
                            @if ($phone[0]->clients_id == $client->id)
                                @foreach ($phone as $item)
                                    <div class="py-2 flex items-center space-x-2">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" viewBox="0 0 24 24"><path d="M21 2H6a2 2 0 0 0-2 2v3H2v2h2v2H2v2h2v2H2v2h2v3a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm-8 2.999c1.648 0 3 1.351 3 3A3.012 3.012 0 0 1 13 11c-1.647 0-3-1.353-3-3.001c0-1.649 1.353-3 3-3zM19 18H7v-.75c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18z" fill="currentColor"/></svg>
                                        </div>
                                        <div>
                                            <p class="text-lg font-bold">{{$item->phone}}</p>
                                            <p class="text-gray-600 font-bold">{{$item->type}}</p>
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        @endif
                    @endforeach

                </div>
                </div>
            @endforeach
        </div>

            @if(!count($clients)>0)
            <div class="text-center mt-10 ">
                <h1 class="mb-4 text-3xl font-semibold text-red-500">Opps!</h1>
                <p class="mb-4 text-lg text-gray-600">No Client Found</p>
                <div class="animate-bounce">
                  <svg class="mx-auto h-16 w-16 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                  </svg>
                </div>
                <p class="mt-4 text-gray-600">Let's get you back <a href="{{route('account.index')}}" class="text-blue-500">home</a>.</p>
              </div>

        @endif






    </x-content-layout>
</x-app-layout>
