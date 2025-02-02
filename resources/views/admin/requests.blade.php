<x-app-layout>
    @section('title', 'All Requests')
    <div>
        <div class="mb-4 bg-white p-4 rounded-lg shadow sm:flex sm:items-center sm:justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-900">All Requests</h3>
            </div>

        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead>
                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Code</th>
                            <th class="px-4 py-3">Customer Name</th>
                            <th class="px-4 py-3">Phone Number</th>
                            <th class="px-4 py-3">Address</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <td class="px-4 py-3">{{ $request->id }}</td>
                                <td class="px-4 py-3">{{ $request->code }}</td>
                                <td class="px-4 py-3">{{ $request->customer_name }}</td>
                                <td class="px-4 py-3">{{ $request->customer_phone }}</td>
                                <td class="px-4 py-3">{{ $request->customer_address }}</td>
                                <td class="px-4 py-3">
                                    @if ($request->status == 'pending')
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-yellow-900 bg-yellow-100 rounded-full dark:text-white dark:bg-yellow-500">
                                            Pending
                                        </span>
                                    @elseif ($request->status == 'approved')
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-900 bg-green-100 rounded-full dark:text-white dark:bg-green-500">
                                            Completed
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <a href="#" data-modal-target="detail-modal{{ $request->id }}"
                                        data-modal-toggle="detail-modal{{ $request->id }}"
                                        class="text-blue-500 hover:underline">Details</a>

                                    <div id="detail-modal{{ $request->id }}" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-lg max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        Request Details
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-toggle="detail-modal{{ $request->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-6">


                                                    <div class="grid md:grid-cols-2 gap-6">
                                                        <div>
                                                            <h4 class="text-sm font-semibold text-gray-600 mb-3">
                                                                Customer Information</h4>
                                                            <dl class="space-y-2">
                                                                <div>
                                                                    <dt class="text-sm font-medium text-gray-500">Name
                                                                    </dt>
                                                                    <dd class="text-sm text-gray-900">
                                                                        {{ $request->customer_name }}</dd>
                                                                </div>
                                                                <div>
                                                                    <dt class="text-sm font-medium text-gray-500">Phone
                                                                    </dt>
                                                                    <dd class="text-sm text-gray-900">
                                                                        {{ $request->customer_phone }}</dd>
                                                                </div>
                                                                <div>
                                                                    <dt class="text-sm font-medium text-gray-500">
                                                                        Address</dt>
                                                                    <dd class="text-sm text-gray-900">
                                                                        {{ $request->customer_address }}</dd>
                                                                </div>

                                                            </dl>
                                                        </div>

                                                        <div>
                                                            <h4 class="text-sm font-semibold text-gray-600 mb-3">Request
                                                                Information</h4>
                                                            <dl class="space-y-2">
                                                                <div>
                                                                    <dt class="text-sm font-medium text-gray-500">
                                                                        Request ID</dt>
                                                                    <dd class="text-sm text-gray-900">
                                                                        {{ $request->code }}</dd>
                                                                </div>
                                                                <div>
                                                                    <dt class="text-sm font-medium text-gray-500">Bottle
                                                                        Type</dt>
                                                                    <dd class="text-sm text-gray-900">
                                                                        {{ $request->bottle->name ?? 'N/A' }}
                                                                    </dd>
                                                                </div>
                                                                <div>
                                                                    <dt class="text-sm font-medium text-gray-500">
                                                                        Remaining Weight</dt>
                                                                    <dd class="text-sm text-gray-900">
                                                                        {{ $request->remaining_weight }} kg</dd>
                                                                </div>
                                                                <div>
                                                                    <dt class="text-sm font-medium text-gray-500">
                                                                        Request Date</dt>
                                                                    <dd class="text-sm text-gray-900">
                                                                        {{ $request->created_at->format('M j, Y g:i A') }}
                                                                    </dd>
                                                                </div>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                    @if ($request->status == 'approved')
                                                        <div class="mt-8">
                                                            <h4 class="text-sm font-semibold text-gray-600 mb-4">
                                                                Request Timeline</h4>
                                                            <ol class="relative border-l border-gray-200">
                                                                <li class="mb-2 ml-4">
                                                                    <div
                                                                        class="absolute w-3 h-3 bg-green-200 rounded-full mt-1.5 border border-white">
                                                                    </div>
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <time
                                                                        class="mb-1 text-sm font-normal leading-none text-gray-400">{{ $request->created_at->format('M j, Y g:i A') }}</time>
                                                                    <h3 class="text-sm font-semibold text-gray-900">
                                                                        Recieved By <strong
                                                                            class="text-green-700">{{ @$request->user->name }}</strong>
                                                                    </h3>
                                                                </li>
                                                                <li class="mb-0 ml-4">
                                                                    <div
                                                                        class="absolute w-3 h-3 bg-blue-200 rounded-full mt-1.5 border border-white">
                                                                    </div>
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <time
                                                                        class="mb-1 text-sm font-normal leading-none text-gray-400">{{ Carbon\Carbon::parse($request->approved_at)->format('M j, Y g:i A') }}</time>
                                                                    <h3 class="text-sm font-semibold text-gray-900">
                                                                        Submited By <strong
                                                                            class="text-blue-800">{{ @$request->approver->name }}</strong>
                                                                    </h3>
                                                                </li>

                                                            </ol>
                                                        </div>
                                                    @endif
                                                    <div class="flex justify-between items-center my-6">
                                                        <h3 class="text-xl font-bold"></h3>
                                                        <span
                                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                            {{ ucfirst($request->status) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
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
