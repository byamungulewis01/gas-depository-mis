<x-app-layout>
    @section('title', 'Dashboard')

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <div class="bg-white border border-gray-200 rounded-lg shadow p-4">
            <div class="flex items-center gap-3">
                <div
                    class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-blue-500 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
                <div class="flex-shrink-0 ml-4">
                    <span class="text-2xl font-bold leading-none text-gray-900">{{ $data['users'] }}</span>
                    <h3 class="text-base font-normal text-gray-500">Total Users</h3>
                </div>
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg shadow p-4">
            <div class="flex items-center gap-3">
                <div
                    class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-green-500 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <div class="flex-shrink-0 ml-4">
                    <span class="text-2xl font-bold leading-none text-gray-900">{{ $data['requests'] }}</span>
                    <h3 class="text-base font-normal text-gray-500">Active Requests</h3>
                </div>
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg shadow p-4">
            <div class="flex items-center gap-3">
                <div
                    class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-yellow-500 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <div class="flex-shrink-0 ml-4">
                    <span class="text-2xl font-bold leading-none text-gray-900">{{ $data['bottles'] }}</span>
                    <h3 class="text-base font-normal text-gray-500">Bottle Categories</h3>
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
    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
        <div class="bg-white border border-gray-200 rounded-lg shadow p-4">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-900">Bottle Distribution</h3>
                <button class="text-gray-500 hover:text-gray-900">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                </button>
            </div>
            <div id="bottleDistributionChart" class="h-80"></div>
        </div>
        <!-- Latest Requests -->
        <div class="bg-white border border-gray-200 rounded-lg shadow">
            <div class="p-4 border-b">
                <h3 class="text-xl font-bold text-gray-900">Latest Requests</h3>
            </div>
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
                        @foreach ($latestRequests as $request)
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

    @section('js')
        <script>
            // Bottle Distribution Chart Data
            var bottleDistributionData = {
                series: @json($bottleDistribution->values()), // Counts for each bottle type
                labels: @json($bottleDistribution->keys()), // Bottle names
            };

            // Bottle Distribution Chart Options
            var bottleDistributionOptions = {
                series: bottleDistributionData.series,
                chart: {
                    type: 'donut',
                    height: 320
                },
                labels: bottleDistributionData.labels,
                colors: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444'],
                legend: {
                    position: 'bottom'
                }
            };

            // Render the chart
            var bottleDistributionChart = new ApexCharts(document.querySelector("#bottleDistributionChart"),
                bottleDistributionOptions);
            bottleDistributionChart.render();
        </script>
    @endsection
</x-app-layout>
