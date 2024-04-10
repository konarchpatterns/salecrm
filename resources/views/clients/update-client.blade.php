<x-app-layout>
    <x-content-layout title='Clients' subtitle="Update client here." button='Go back' link="clients.index">
    
        {{-- <livewire:update-account :key_id="$id"/> --}}
        <livewire:update-client :key_id="$key_id" />
    </x-content-layout>
</x-app-layout>