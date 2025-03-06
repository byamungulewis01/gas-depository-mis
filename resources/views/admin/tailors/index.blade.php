<x-app-layout>
    @section('title', 'All Tailors')
    <div>
        <div class="mb-4 bg-white p-4 rounded-lg shadow sm:flex sm:items-center sm:justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-900">All Tailors</h3>
            </div>

        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead>
                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Phone Number</th>
                            <th class="px-4 py-3">Address</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tailors as $tailor)
                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $tailor->name }}</td>
                                <td class="px-4 py-3">{{ $tailor->email }}</td>
                                <td class="px-4 py-3">{{ $tailor->phone }}</td>
                                <td class="px-4 py-3">{{ $tailor->address }}</td>
                                <td class="px-4 py-3"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    @section('js')

    @endsection
</x-app-layout>
