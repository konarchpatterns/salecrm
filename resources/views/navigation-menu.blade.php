<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <x-sidebar-nav-link href="#" :active="request()->routeIs('dashboard')">
                    <span class="flex items-center gap-2">
                        <i data-lucide="layout-dashboard" class="h-5 w-5"></i>
                        {{ __('Dashboard') }}
                    </span>
                </x-sidebar-nav-link>
            </li>
            <li>
                <x-sidebar-nav-link href="{{ route('account.index') }}" :active="request()->routeIs('account.index')">
                    <span class="flex items-center gap-2">
                        <i data-lucide="building-2" class="h-5 w-5"></i>
                        {{ __('Accounts') }}
                    </span>
                </x-sidebar-nav-link>
            </li>
            <li>
                <x-sidebar-nav-link href="{{ route('clients.index') }}" :active="request()->routeIs('clients.index')">
                    <span class="flex items-center gap-2">
                        <i data-lucide="contact-round" class="h-5 w-5"></i>
                        {{ __('Clients') }}
                    </span>
                </x-sidebar-nav-link>
            </li>
            <li>
                <x-sidebar-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                    <span class="flex items-center gap-2">
                        <i data-lucide="user-cog" class="h-5 w-5"></i>
                        {{ __('Users') }}
                    </span>
                </x-sidebar-nav-link>
            </li>
            <li>
                <x-sidebar-nav-link href="{{ route('event.index') }}" :active="request()->routeIs('event.index')">
                    <span class="flex items-center gap-2">
                        <i data-lucide="calendar-clock" class="h-5 w-5"></i>
                        {{ __('Manage Event') }}
                    </span>
                </x-sidebar-nav-link>
            </li>
            <li>
                <x-sidebar-nav-link href="{{ route('reports.index') }}" :active="request()->routeIs('reports.index')">
                    <span class="flex items-center gap-2">
                        <i data-lucide="bar-chart-big" class="h-5 w-5"></i>
                        {{ __('Report') }}
                    </span>
                </x-sidebar-nav-link>
            </li>
            <li>
                <x-sidebar-nav-link href="{{ route('logs.index') }}" :active="request()->routeIs('logs.index')">
                    <span class="flex items-center gap-2">
                        <i data-lucide="activity" class="h-5 w-5"></i>
                        {{ __('Logs') }}
                    </span>
                </x-sidebar-nav-link>
            </li>
            <li>
                <x-sidebar-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.index')">
                    <span class="flex items-center gap-2">
                        <i data-lucide="shield" class="h-5 w-5"></i>
                        {{ __('Role') }}
                    </span>
                </x-sidebar-nav-link>
            </li>
            <li>
                <x-sidebar-nav-link href="{{ route('permissions.index') }}" :active="request()->routeIs('permissions.index')">
                    <span class="flex items-center gap-2">
                        <i data-lucide="hand" class="h-5 w-5"></i>
                        {{ __('Permission') }}
                    </span>
                </x-sidebar-nav-link>
            </li>
            <li>
                <x-sidebar-nav-link href="{{ route('groups.index') }}" :active="request()->routeIs('groups.index')">
                    <span class="flex items-center gap-2">
                        <i data-lucide="boxes" class="h-5 w-5"></i>
                        {{ __('Groups') }}
                    </span>
                </x-sidebar-nav-link>
            </li>
           
        </ul>
    </div>
</aside>
