<x-app-layout>
    <x-content-layout title='Calendar' subtitle="Manage Events" button="View Events" link="event.view">
    <div class="h-screen w-full">
        <iframe src="{{route('calendar.index')}}" title="Event Manager" class="h-full  md:h-[750px] lg:h-[880px] xl:h-[990px] w-full">
        </iframe>
    </div>
    </x-content-layout>
</x-app-layout>
