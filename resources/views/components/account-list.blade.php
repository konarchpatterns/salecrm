<div>
    <!-- Well begun is half done. - Aristotle -->

@can('accounts.create')
 <livewire:account />
@endcan

@cannot('accounts.create')
 <livewire:useraccount />
 @endcan

</div>
