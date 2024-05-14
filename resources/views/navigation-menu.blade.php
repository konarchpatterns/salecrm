
<aside id="logo-sidebar"  class="fixed top-0 left-0 z-40 w-64 justify-center  h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">

    <div class="h-full px-3  overflow-y-auto bg-white dark:bg-gray-800">
       <ul class="space-y-2 font-medium">
        <li>
            <x-nav-link href="{{ route('dashboard') }}"   id="dashboard" title="{{ __('Dashboard') }}" :active="request()->routeIs('dashboard')" class="dashboard-link">
                <x-lucide-layout-dashboard  class="w-5 h-5   @if(request()->routeIs('dashboard')) text-blue-600 @else text-gray-500 @endif" />
            </x-nav-link>
        </li>
            {{-- Full Calendar --}}
<li>
    <x-nav-link href="{{ route('fullcalendar.index') }}"   id="calendar2" title="{{ __('Calendar') }}" :active="request()->routeIs('fullcalendar.index')" class="dashboard-link">
        <x-lucide-calendar-clock  class="w-5 h-5   @if(request()->routeIs('calendar')) text-blue-600 @else text-gray-500 @endif" />
    </x-nav-link>
</li>
{{-- Full Calendar --}}
{{-- Reports --}}
<li>
    <x-nav-link href="{{ route('reports.index') }}"   id="reports" title="{{ __('Reports') }}" :active="request()->routeIs('reports.index')" class="dashboard-link">
        <x-lucide-bar-chart-big  class="w-5 h-5   @if(request()->routeIs('calendar')) text-blue-600 @else text-gray-500 @endif" />
    </x-nav-link>
</li>
{{-- Reports --}}
        <li>
            <x-nav-link href="{{ route('account.index') }}" id="account" title="{{ __('Accounts') }}" :active="request()->routeIs('account.index')">
                 <x-lucide-building-2  class="w-5 h-5 @if(request()->routeIs('account.index')) text-blue-600 @else text-gray-500 @endif" />
            </x-nav-link>
        </li>
        @role('Admin')

        @role('Business Development Manager')
        <li>
            <x-nav-link href="{{ route('clients.index') }}"  id="client" title="{{ __('Clients') }}" :active="request()->routeIs('clients.index')">
                 <x-lucide-building-2  class="w-5 h-5 @if(request()->routeIs('clients.index')) text-blue-600 @else text-gray-500 @endif" />
            </x-nav-link>
        </li>


@endrole
@endrole
@role('Admin')
<li>
    <x-nav-link href="{{ route('roles.index') }}"  id="roles" title="{{ __('Roles') }}" :active="request()->routeIs('roles.index')">
         <x-lucide-shield  class="w-5 h-5   @if(request()->routeIs('roles.index')) text-blue-600 @else text-gray-500 @endif" />
    </x-nav-link>
</li>
<li>
    <x-nav-link href="{{ route('permissions.index') }}"  id="permissions" title="{{ __('Permissions') }}" :active="request()->routeIs('permissions.index')">
         <x-lucide-hand  class="w-5 h-5   @if(request()->routeIs('permissions.index')) text-blue-600 @else text-gray-500 @endif" />
    </x-nav-link>
</li>
<li>
    <x-nav-link href="{{ route('groups.index') }}"  id="groups" title="{{ __('Groups') }}" :active="request()->routeIs('groups.index')">
         <x-lucide-hand  class="w-5 h-5 @if(request()->routeIs('groups.index')) text-blue-600 @else text-gray-500 @endif" />
    </x-nav-link>
</li>

<li>
    <x-nav-link href="{{ route('users.index') }}"  id="users" title="{{ __('Users') }}" :active="request()->routeIs('users.index')">
         <x-lucide-user  class="w-5 h-5 @if(request()->routeIs('users.index')) text-blue-600 @else text-gray-500 @endif" />
    </x-nav-link>
</li>
@endrole

       </ul>
    </div>
 </aside>
 <script>

    document.getElementById('btn11').style.display = 'none';
    document.getElementById('btn12').style.display = 'block';


      document.getElementById('btn11').addEventListener('click', function() {
        document.getElementById('logo-sidebar').style.width = '260px';

//   document.getElementById('btn12').hidden = true

    document.getElementById('btn11').style.display = 'none';
    document.getElementById('btn12').style.display = 'block';
    //   // Show the Open button
    document.getElementById('dashboard').querySelector('span').hidden = false;
    document.getElementById('account').querySelector('span').hidden = false;
    document.getElementById('client').querySelector('span').hidden = false;
    document.getElementById('roles').querySelector('span').hidden = false;
    document.getElementById('permissions').querySelector('span').hidden = false;
    document.getElementById('groups').querySelector('span').hidden = false;
    document.getElementById('users').querySelector('span').hidden = false;

     document.getElementById('box').style.marginLeft = '250px';
     document.getElementById('box2').style.marginTop = '50px';
    // document.getElementById('containerbox').style.marginLeft = '250px';

    //  document.getElementById('roles1').style.marginLeft = '250px';
    // document.getElementById('permissions1').style.marginLeft = '250px';


});


document.getElementById('btn12').addEventListener('click', function() {
     // Show the Open button
  document.getElementById('btn11').style.display = 'block';
    document.getElementById('btn12').style.display = 'none';

    // document.getElementById('btn11').hidden = true
    document.getElementById('logo-sidebar').style.width = '60px';



    document.getElementById('dashboard').querySelector('span').hidden = true;
    document.getElementById('roles').querySelector('span').hidden = true;
    document.getElementById('permissions').querySelector('span').hidden = true;
    document.getElementById('account').querySelector('span').hidden = true;
    document.getElementById('client').querySelector('span').hidden = true;
    document.getElementById('groups').querySelector('span').hidden = true;
    document.getElementById('users').querySelector('span').hidden = true;
    document.getElementById('box').style.marginLeft = '50px';
    document.getElementById('box2').style.marginTop = '50px';

    // document.getElementById('users').querySelector('div').style.paddingLeft = "10px";
    // document.getElementById('containerbox').style.marginLeft = '50px';
    //  document.getElementById('roles1').style.marginLeft = '50px';
    //  document.getElementById('permissions1').style.marginLeft = '50px';


});

 </script>


