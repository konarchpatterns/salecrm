<div>
    <!-- Well begun is half done. - Aristotle -->
    <livewire:account />
    @can('accounts.create')
        {{-- <livewire:account /> --}}
    @endcan

    {{-- @cannot('accounts.create')
        <livewire:useraccount />
    @endcan --}}

</div>
