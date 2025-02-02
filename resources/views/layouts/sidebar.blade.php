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
            @if (Auth::user()->role === 'admin')
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">
                        <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-500' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
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
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="ms-3">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('agents.index') }}"
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('agents.index') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">
                        <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('agents.index') ? 'text-white' : 'text-gray-500' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path fill-rule="evenodd"
                                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Agents</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('bottles.index') }}"
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('bottles.index') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">
                        <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('bottles.index') ? 'text-white' : 'text-gray-500' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 20">
                            <path
                                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 4a2 2 0 1 1 4 0v1H7V4Zm0 6a1 1 0 0 1 2 0v5a1 1 0 0 1-2 0v-5Z" />
                        </svg>
                        <span class="ms-3">Bottle Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.requests') }}"
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('admin.requests') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">
                        <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('admin.requests') ? 'text-white' : 'text-gray-500' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 20">
                            <path
                                d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                        </svg>
                        <span class="ms-3">Requests</span>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('agent.dashboard') }}"
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('agent.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">
                        <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('agent.dashboard') ? 'text-white' : 'text-gray-500' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('agent.requests') }}"
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('agent.requests') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">
                        <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('agent.requests') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 20 18">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span class="ms-3">New Request</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('agent.my_requets') }}"
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('agent.my_requets') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">
                        <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('agent.my_requets') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                        <span class="ms-3">My Requests</span>
                    </a>
                </li> --}}

                <li x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center justify-between w-full p-2 rounded-lg group text-gray-900 {{ request()->routeIs('agent.my_requets.*') ? 'bg-blue-600 text-white' : '' }}">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('agent.my_requets.*') ? 'text-white' : 'text-gray-500' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                            <span class="ms-3">My Requests</span>
                        </div>
                        <svg x-bind:class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <ul x-show="open" x-transition class="mt-2 space-y-1 bg-gray-100 rounded-lg">
                        <li>
                            <a href="{{ route('agent.my_requets', ['status' => 'pending']) }}"
                                class="flex items-center p-2 pl-6 text-gray-900 rounded-lg hover:bg-gray-200 {{ request()->input('status') === 'pending' ? 'bg-blue-600 text-white' : '' }}">
                                Pending
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('agent.my_requets', ['status' => 'approved']) }}"
                                class="flex items-center p-2 pl-6 text-gray-900 rounded-lg hover:bg-gray-200 {{ request()->input('status') === 'approved' ? 'bg-blue-600 text-white' : '' }}">
                                Approved
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('agent.my_requets', ['status' => 'picked_up']) }}"
                                class="flex items-center p-2 pl-6 text-gray-900 rounded-lg hover:bg-gray-200 {{ request()->input('status') === 'picked_up' ? 'bg-blue-600 text-white' : '' }}">
                                Picked Up
                            </a>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="{{ route('agent.requests.lookup') }}"
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('agent.requests.lookup') ? 'bg-blue-600 text-white' : 'text-gray-900' }}">
                        <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('agent.requests.lookup') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="ms-3">Look Up Request</span>
                    </a>
                </li>
            @endif


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
