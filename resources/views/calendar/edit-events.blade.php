<x-app-layout>
    <x-content-layout title='Calendar' subtitle="Manage Events" button="Go back" link="event.view">
        {{-- <livewire:events.edit-events :data="$eventDetails" > --}}
        @livewire('events.edit-events', ['data' => $eventDetails[0]])
    </x-content-layout>
</x-app-layout>