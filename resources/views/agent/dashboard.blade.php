<x-app-layout>
    @section('title', 'Dashboard')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <div class="bg-white border border-gray-200 rounded-lg shadow p-4">
            <div class="flex items-center gap-3">
                <div
                    class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-blue-500 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                        </path>
                    </svg>
                </div>
                <div class="flex-shrink-0 ml-4">
                    <span class="text-2xl font-bold text-gray-900">{{ $data['todayRequests'] }}</span>
                    <h3 class="text-base font-normal text-gray-500">Today's Requests</h3>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow p-4">
            <div class="flex items-center gap-3">
                <div
                    class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-green-500 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="flex-shrink-0 ml-4">
                    <span class="text-2xl font-bold text-gray-900">{{ $data['completed'] }}</span>
                    <h3 class="text-base font-normal text-gray-500">Completed</h3>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow p-4">
            <div class="flex items-center gap-3">
                <div
                    class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-yellow-500 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="flex-shrink-0 ml-4">
                    <span class="text-2xl font-bold text-gray-900">{{ $data['pending'] }}</span>
                    <h3 class="text-base font-normal text-gray-500">Pending</h3>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow p-4">
            <div class="flex items-center gap-3">
                <div
                    class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-purple-500 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2"></path>
                    </svg>
                </div>
                <div class="flex-shrink-0 ml-4">
                    <span class="text-2xl font-bold text-gray-900">{{ round($data['successRate']) }}%</span>
                    <h3 class="text-base font-normal text-gray-500">Success Rate</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <!-- Recent Requests -->
        <div class="lg:col-span-1">
            <div class="bg-white border border-gray-200 rounded-lg shadow">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-4">Recent Requests</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Customer</th>
                                    <th scope="col" class="px-4 py-3">Bottle Type</th>
                                    <th scope="col" class="px-4 py-3">Status</th>
                                    <th scope="col" class="px-4 py-3">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentRequests as $request)
                                    <tr class="border-b">
                                        <td class="px-4 py-3">{{ $request->customer_name }}</td>
                                        <td class="px-4 py-3">{{ $request->bottle->name }}</td>
                                        <td class="px-4 py-3">
                                            @if ($request->status === 'approved')
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Completed</span>
                                            @else
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Pending</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3">{{ $request->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="lg:col-span-1">
            <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
                <h3 class="text-xl font-bold mb-4">Quick Actions</h3>
                <div class="space-y-4">
                    <a href="{{ route('agent.requests') }}"
                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group">
                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">New Request</span>
                    </a>
                    <a href="{{ route('agent.requests.lookup') }}"
                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group">
                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Look Up Request</span>
                    </a>
                    <a href="{{ route('agent.my_requets') }}"
                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group">

                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">My Requests</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
