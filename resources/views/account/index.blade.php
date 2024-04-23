<x-app-layout>

    <x-content-layout title='Accounts'   secLink="account.create"  userButton="Add New Account" subtitle="Account List." button='Go back' link="account.index">

    <x-account-list />
    @livewireScripts
    <div>
        <script>
            window.addEventListener('beforeunload', function (e) {
                Livewire.emit('refreshPage');
                e.preventDefault();
                e.returnValue = '';
            });
      //       window.addEventListener('beforeunload', function (e) {
      // Livewire.emit('refreshPagecloed');
      //      e.preventDefault();
      //     e.returnValue = '';

      // });

        </script>

    </div>

{{--
    <livewire:create-disposition /> --}}
</x-content-layout>
</x-app-layout>

