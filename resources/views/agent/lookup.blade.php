<x-app-layout>
    @section('title', 'My Requests')
    <div class="max-w-2xl mx-auto">
        <!-- Search Form -->
        <div class="bg-white border border-gray-200 rounded-lg shadow p-6 mb-6">
            <h2 class="text-2xl font-bold mb-6">Look Up Request</h2>

            @if (session('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form method="GET" class="flex gap-4">
                {{-- @csrf --}}
                <div class="flex-1">
                    <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Enter Tracking Code</label>
                    <input type="text" id="code" name="code" value="{{ $code }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Enter the code sent to customer" required>
                </div>
                <div class="flex items-end">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center h-[42px]">Search</button>
                </div>
            </form>
        </div>

        @if (!empty($requestDetails))
            <!-- Request Details -->
            <div class="bg-white border border-gray-200 rounded-lg shadow">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold">Request Details</h3>
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                            {{ ucfirst($requestDetails->status) }}
                        </span>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-600 mb-3">Customer Information</h4>
                            <dl class="space-y-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Name</dt>
                                    <dd class="text-sm text-gray-900">{{ $requestDetails->customer_name }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                    <dd class="text-sm text-gray-900">{{ $requestDetails->customer_phone }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Address</dt>
                                    <dd class="text-sm text-gray-900">{{ $requestDetails->customer_address }}</dd>
                                </div>
                                @if ($requestDetails->status == 'pending')
                                    <div>
                                        <button data-modal-target="create-modal" data-modal-toggle="create-modal"
                                            class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1">
                                            Approve Pick
                                        </button>

                                        <div id="create-modal" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-xl max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Are you sure to Approve this?
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-toggle="create-modal">
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
                                                    <form class="p-4 md:p-5" method="POST"
                                                        action="{{ route('agent.requests.approve', $requestDetails->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <p class="mb-4">
                                                            You're about to approve this Gas bottle is submitted to
                                                            Customer.
                                                        </p>
                                                        <button
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                            Yes I'm sure
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                            </dl>
                        </div>

                        <div>
                            <h4 class="text-sm font-semibold text-gray-600 mb-3">Request Information</h4>
                            <dl class="space-y-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Request ID</dt>
                                    <dd class="text-sm text-gray-900">{{ $requestDetails->code }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Bottle Type</dt>
                                    <dd class="text-sm text-gray-900">{{ $requestDetails->bottle->name ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Remaining Weight</dt>
                                    <dd class="text-sm text-gray-900">{{ $requestDetails->remaining_weight }} kg</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Request Date</dt>
                                    <dd class="text-sm text-gray-900">
                                        {{ $requestDetails->created_at->format('M j, Y g:i A') }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    @if ($requestDetails->status == 'approved')
                        <div class="mt-8">
                            <h4 class="text-sm font-semibold text-gray-600 mb-4">Request Timeline</h4>
                            <ol class="relative border-l border-gray-200">
                                <li class="mb-2 ml-4">
                                    <div class="absolute w-3 h-3 bg-green-200 rounded-full mt-1.5 border border-white">
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    <time
                                        class="mb-1 text-sm font-normal leading-none text-gray-400">{{ $requestDetails->created_at->format('M j, Y g:i A') }}</time>
                                    <h3 class="text-sm font-semibold text-gray-900">Recieved By <strong
                                            class="text-green-700">{{ $requestDetails->user->name }}</strong></h3>
                                </li>
                                <li class="mb-0 ml-4">
                                    <div class="absolute w-3 h-3 bg-blue-200 rounded-full mt-1.5 border border-white">
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    <time
                                        class="mb-1 text-sm font-normal leading-none text-gray-400">{{ Carbon\Carbon::parse($requestDetails->approved_at)->format('M j, Y g:i A') }}</time>
                                    <h3 class="text-sm font-semibold text-gray-900">Submited By <strong
                                            class="text-blue-800">{{ $requestDetails->approver->name }}</strong></h3>
                                </li>

                            </ol>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
