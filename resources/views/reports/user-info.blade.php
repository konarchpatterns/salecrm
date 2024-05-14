
    <x-app-layout>
        <x-content-layout title='Reports'   subtitle="User Info" button='Go back' link="reports.index" >
            <div class="flex gap-5 mt-5 h-screen">
              <iframe src="{{ route('reports.iframe', ['id' => $id]) }}" class="w-full h-[1000px] " /> 
                {{-- <livewire:reports.user-dispositons :user_id="$id"/> --}}
            </div>
            
        </x-content-layout>
    </x-app-layout>
 