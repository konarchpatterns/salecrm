<x-app-layout>
    <x-content-layout title='Account' subtitle="Create new account here." button='Go back' link="account.index">

        <livewire:update-account :accountid="$id" :country_id="$countryidss" :state_id="$stateidss" :city_id="$cityidss" />
    </x-content-layout>
</x-app-layout>
