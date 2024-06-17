<x-app-layout>
    <x-content-layout title='Reports' subtitle="User Info" button='Go back' link="reports.index">
        {{-- <div class="flex gap-5 mt-5 h-screen"> --}}

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>

        <livewire:reports.cards :user_id="$id" />
        <div class="flex gap-5">
            <livewire:reports.user-dispositons :user_id="$id" />
        </div>

        {{-- <livewire:reports.bar-graph /> --}}




        {{-- <iframe src="{{ route('reports.iframe', ['id' => $id]) }}" class="w-full h-[800px] lg:h-[720px] " />  --}}
        {{-- <livewire:reports.user-dispositons :user_id="$id"/> --}}
        {{-- </div> --}}

    </x-content-layout>
</x-app-layout>
