<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <!-- User Profile Section -->
    <div class="px-3 pb-2 border-b border-gray-200 mb-2">
        <div class="flex items-center space-x-4 mb-2">
            <div
                class="w-12 h-12 flex items-center justify-center bg-blue-600 text-white rounded-full text-lg font-semibold">
                {{ implode('',collect(explode(' ', Auth::user()->name))->map(function ($segment) {return substr($segment, 0, 1);})->take(2)->toArray()) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-sm text-gray-500 truncate capitalize">
                    {{ strtoupper(Auth::user()->role) }}
                </p>
            </div>
        </div>
    </div>

    <!-- Main Sidebar Content -->
    <div class="h-[calc(100%-180px)] px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 rounded-lg group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-500' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}"
                    class="flex items-center p-2 rounded-lg group {{ request()->routeIs('users.index') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('users.index') ? 'text-white' : 'text-gray-500' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="ms-3">Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('subscription-plan.index') }}"
                    class="flex items-center p-2 rounded-lg group {{ request()->routeIs('subscription-plan.index') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('subscription-plan.index') ? 'text-white' : 'text-gray-500' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 4a2 2 0 1 1 4 0v1H7V4Zm0 6a1 1 0 0 1 2 0v5a1 1 0 0 1-2 0v-5Z" />
                    </svg>
                    <span class="ms-3">Subscription Plan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('tailors.index') }}"
                    class="flex items-center p-2 rounded-lg group {{ request()->routeIs('tailors.index') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('tailors.index') ? 'text-white' : 'text-gray-500' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M14.7141 15h4.268c.4043 0 .732-.3838.732-.8571V3.85714c0-.47338-.3277-.85714-.732-.85714H6.71411c-.55228 0-1 .44772-1 1v4m10.99999 7v-3h3v3h-3Zm-3 6H6.71411c-.55228 0-1-.4477-1-1 0-1.6569 1.34315-3 3-3h2.99999c1.6569 0 3 1.3431 3 3 0 .5523-.4477 1-1 1Zm-1-9.5c0 1.3807-1.1193 2.5-2.5 2.5s-2.49999-1.1193-2.49999-2.5S8.8334 9 10.2141 9s2.5 1.1193 2.5 2.5Z" />
                    </svg>
                    <span class="ms-3">Tailors</span>
                </a>


            </li>
            <li>
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center p-2 rounded-lg group
                    {{ request()->routeIs('profile.edit') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">

                    <svg class="w-5 h-5 transition duration-75
                        {{ request()->routeIs('profile.edit') ? 'text-white' : 'text-gray-500' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>

                    <span class="ms-3">Profile Settings</span>
                </a>
            </li>




        </ul>
    </div>

    <!-- Logout Button -->
    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-100 bg-red-400 hover:bg-red-500 rounded-lg transition-colors duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>
