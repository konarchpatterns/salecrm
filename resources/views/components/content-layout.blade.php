{{-- @props(['title', 'subtitle','listlink'=>null,'listButton'=>null,'desButton'=>null, 'secLink'=>null, 'userButton'=> null,'button'=> null, 'link','secondaryButton' => null,'secondarylink'=> null], 'createClient'=>null, 'createClientLink'=>null, 'viewClietns'=>null, 'clientsLink'=>null, 'id'=>null]) --}}
@props([
    'title',
    'subtitle',
    'listlink' => null,
    'listButton' => null,
    'desButton' => null,
    'secLink' => null,
    'secLinkss' => null,
    'companyidss' => null,
    'userButtonss' => null,
    'userButton' => null,
    'button' => null,
    'link',
    'secondaryButton' => null,
    'secondarylink' => null,
    'createClient' => null,
    'createClientLink' => null,
    'viewClietns' => null,
    'clientsLink' => null,
    'id' => null,
])

<div class="space-y-6 mt-14">
    <div class="flex flex-row items-center justify-between">
        <div class="flex flex-col gap-0">
            <h1 class="text-xl font-bold">{{ $title }}</h1>
            <p class="text-sm font-medium text-gray-600">{{ $subtitle }}</p>
        </div>


        <div class="flex flex-row items-center">
            @if ($secondaryButton != null)
                <a data-modal-target="default-modal" data-modal-toggle="default-modal" href="#"
                    class="px-3 py-2 mr-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">{{ $secondaryButton }}</a>
                {{-- <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Toggle modal
                </button> --}}
            @endif
            @if ($userButton != null)
                @if ($userButton == 'Add New Account')
                    @can(['accounts.create'])
                        <a href="{{ route($secLink) }}"
                            class="px-3 py-2  mr-3 text-xs font-medium text-center text-white
             bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none
              focus:ring-blue-300">{{ $userButton }}</a>
                    @endcan
                @else
                    <a href="{{ route($secLink) }}"
                        class="px-3 py-2  mr-3 text-xs font-medium text-center text-white
               bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none
                focus:ring-blue-300">{{ $userButton }}</a>
                @endif
            @endif
            @if ($userButtonss != null)

                @if ($userButtonss == 'Create new client')
                    @canany(['Can Edit Client', 'Can Create Client'])
                        <a href="{{ route($secLinkss, ['id' => $companyidss]) }}"
                            class="px-3 py-2  mr-3 text-xs font-medium text-center
                  text-white bg-blue-700 rounded-lg hover:bg-blue-800
                  focus:ring-4 focus:outline-none focus:ring-blue-300">
                            {{ $userButtonss }}</a>
                    @endcanany
                @else
                    <a href="{{ route($secLinkss, ['id' => $companyidss]) }}"
                        class="px-3 py-2  mr-3 text-xs font-medium text-center
                     text-white bg-blue-700 rounded-lg hover:bg-blue-800
                     focus:ring-4 focus:outline-none focus:ring-blue-300">
                        {{ $userButtonss }}</a>
                @endif

            @endif
            @if ($viewClietns != null)
                <a href="{{ route($clientsLink, ['id' => $id]) }}"
                    class="px-3 py-2  mr-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">{{ $viewClietns }}
                </a>
            @endif

            @if ($createClient != null)
                <a href="{{ route($createClientLink) }}"
                    class="px-3 py-2  mr-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">{{ $createClient }}</a>
            @endif
            @if ($desButton != null)
                <a data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="px-3 py-2 mr-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">{{ $desButton }}</a>
            @endif
            @if ($listButton != null)
                <a href="{{ route($listlink) }}"
                    class="px-3 py-2 mr-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">{{ $listButton }}</a>
            @endif
            @if ($button != null)
                <a href="{{ route($link) }}"
                    class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">{{ $button }}</a>
            @endif

        </div>
    </div>
    @include('layouts.partials.messages')
    <div>{{ $slot }}</div>
</div>
