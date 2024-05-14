<x-app-layout>

    {{-- <div>
        <livewire:appointments-calendar
        year="2019"
        month="12" />

    </div>  --}}
    <iframe src="{{route('calendar.index')}}" class="w-full " style="height: 1200px;" />

</x-app-layout>
