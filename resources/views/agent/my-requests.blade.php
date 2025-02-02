<x-app-layout>
    @section('title', 'My Requests')
    <div>
        <div class="mb-4 bg-white p-4 rounded-lg shadow sm:flex sm:items-center sm:justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-900">My Requests</h3>
                <p class="mt-1 text-sm text-gray-500">Manage your gas bottle categories and pricing</p>
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
                            {{-- <th class="px-4 py-3">Status</th> --}}
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
                                {{-- <td class="px-4 py-3">
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
                                </td> --}}
                                <td class="px-4 py-3">
                                    <button onclick="printReceipt('receipt-{{ $request->id }}')"
                                        class="text-gray-800 hover:underline">
                                        Print
                                    </button>
                                    &nbsp;

                                    <!-- Receipt Template - Hidden by default -->
                                    <div id="receipt-{{ $request->id }}" class="hidden">
                                        <div style="width: 105mm; min-height: 148mm; padding: 16px; background: white;">
                                            <!-- Header -->
                                            <div style="text-align: center; margin-bottom: 16px;">
                                                <h1 style="font-size: 18px; font-weight: bold;">Gas Bottle Receipt</h1>
                                                <p style="font-size: 20px;">Request #<strong>{{ $request->code }}</strong></p>
                                            </div>

                                            <!-- Customer Details -->
                                            <div style="margin-bottom: 16px;">
                                                <h2 style="font-size: 12px; font-weight: bold; margin-bottom: 4px;">
                                                    Customer Details</h2>
                                                <table style="width: 100%; font-size: 12px;">
                                                    <tr>
                                                        <td style="width: 30%; padding: 2px;">Name:</td>
                                                        <td style="padding: 2px;">{{ $request->customer_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 2px;">Phone:</td>
                                                        <td style="padding: 2px;">{{ $request->customer_phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 2px;">Address:</td>
                                                        <td style="padding: 2px;">{{ $request->customer_address }}</td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <!-- Request Details -->
                                            <div style="margin-bottom: 16px;">
                                                <h2 style="font-size: 12px; font-weight: bold; margin-bottom: 4px;">
                                                    Request Details</h2>
                                                <table style="width: 100%; font-size: 12px;">
                                                    <tr>
                                                        <td style="width: 40%; padding: 2px;">Bottle Type:</td>
                                                        <td style="padding: 2px;">{{ $request->bottle->name ?? 'N/A' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 2px;">Remaining Weight:</td>
                                                        <td style="padding: 2px;">{{ $request->remaining_weight }} kg
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 2px;">Request Date:</td>
                                                        <td style="padding: 2px;">
                                                            {{ $request->created_at->format('M j, Y g:i A') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 2px;">Status:</td>
                                                        <td style="padding: 2px;">{{ ucfirst($request->status) }}</td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <!-- Timeline if approved -->
                                            @if ($request->status == 'approved')
                                                <div style="margin-bottom: 16px;">
                                                    <h2 style="font-size: 12px; font-weight: bold; margin-bottom: 4px;">
                                                        Request Timeline</h2>
                                                    <table style="width: 100%; font-size: 12px;">
                                                        <tr>
                                                            <td style="padding: 2px;">
                                                                Received:
                                                                {{ $request->created_at->format('M j, Y g:i A') }}<br>
                                                                By: {{ @$request->user->name }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 2px;">
                                                                Submitted:
                                                                {{ Carbon\Carbon::parse($request->approved_at)->format('M j, Y g:i A') }}<br>
                                                                By: {{ @$request->approver->name }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            @endif

                                            <!-- Footer -->
                                            <div style="text-align: center; font-size: 12px; margin-top: 32px;">
                                                <p>Thank you for your business!</p>
                                                <p style="margin-top: 4px;">Please keep this receipt for your records.
                                                </p>
                                            </div>
                                        </div>
                                    </div>


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
        <script>
            function printReceipt(receiptId) {
                const printContent = document.getElementById(receiptId);
                const WinPrint = window.open('', '', 'width=400,height=250');
                WinPrint.document.write('<html><head><title>Print Receipt</title>');
                WinPrint.document.write('<style>@page { size: A5; margin: 0; }</style>');
                WinPrint.document.write('</head><body>');
                WinPrint.document.write(printContent.innerHTML);
                WinPrint.document.write('</body></html>');
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
                setTimeout(function() {
                    WinPrint.close();
                }, 1000);
            }
        </script>
    @endsection
</x-app-layout>
