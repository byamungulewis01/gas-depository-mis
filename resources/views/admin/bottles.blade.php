<x-app-layout>
    @section('title', 'Bottles')
    <div>
        <div class="mb-4 bg-white p-4 rounded-lg shadow sm:flex sm:items-center sm:justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Bottle Categories</h3>
            </div>
            <div class="mt-4 sm:mt-0">
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Category
                </button>
                <!-- Main modal -->
                <div id="crud-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Bottle Registration
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5" method="POST" action="{{ route('bottles.store') }}">
                                @csrf
                                <div class="grid gap-4 mb-6 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bottle
                                            Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Type product name" required="">
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="amount"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount
                                            (FRW)</label>
                                        <input type="number" name="amount" id="amount" value="{{ old('amount') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="3000 FRW" required="">
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="weight"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight
                                            (Kg)</label>
                                        <select id="weight" name="weight"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected="">-- Select --</option>
                                            <option {{ old('weight') == 6 ? 'selected' : '' }} value="6">6 Kg
                                            </option>
                                            <option {{ old('weight') == 12 ? 'selected' : '' }} value="12">12 Kg
                                            </option>
                                            <option {{ old('weight') == 20 ? 'selected' : '' }} value="20">20 Kg
                                            </option>
                                            <option {{ old('weight') == 30 ? 'selected' : '' }} value="30">30 Kg
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="status"
                                            class="block mb-2 text-sm font-medium text-gray-900">Status</label>

                                        <select name="status" id="status"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                            <option {{ old('status') == 'active' ? 'selected' : '' }} value="active">
                                                Active</option>
                                            <option {{ old('status') == 'inactive' ? 'selected' : '' }}
                                                value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="p-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Card 1 -->
                @foreach ($bottles as $bottle)
                    <div class="border border-gray-200 rounded-lg shadow hover:shadow-lg hover:bg-gray-50">
                        <div class="p-4">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $bottle->name }}</h3>
                            <p class="mt-2 text-sm text-gray-600"><span class="font-semibold">Weight:</span>
                                {{ $bottle->weight }} kg</p>
                            <p class="mt-1 text-sm text-gray-600"><span class="font-semibold">Price:</span>
                                {{ number_format($bottle->amount) }} Frw</p>
                            <p class="mt-2">
                                @if ($bottle->status == 'active')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Active</span>
                                @else
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">In
                                        Inactive</span>
                                @endif
                            </p>
                            <div class="flex justify-end space-x-2">
                                <a href="#" data-modal-target="update-modal{{ $bottle->id }}"
                                    data-modal-toggle="update-modal{{ $bottle->id }}"
                                    class="font-medium text-blue-600 hover:underline">Edit</a>
                                &nbsp;&nbsp;
                                <button data-modal-target="popup-modal{{ $bottle->id }}"
                                    data-modal-toggle="popup-modal{{ $bottle->id }}"
                                    class="font-medium text-red-600 hover:underline">Delete</button>
                            </div>
                        </div>
                        <div id="update-modal{{ $bottle->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Bottle Modification
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="update-modal{{ $bottle->id }}">
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
                                    <form class="p-4 md:p-5" method="post"
                                        action="{{ route('bottles.update', $bottle->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid gap-4 mb-6 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bottle
                                                    Name</label>
                                                <input type="text" name="name" id="name"
                                                    value="{{ old('name', $bottle->name) }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Type product name" required="">
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="amount"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount
                                                    (FRW)
                                                </label>
                                                <input type="number" name="amount" id="amount"
                                                    value="{{ old('amount', $bottle->amount) }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="3000 FRW" required="">
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="weight"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight
                                                    (Kg)</label>
                                                <select id="weight" name="weight"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option selected="">-- Select --</option>
                                                    <option {{ old('weight', $bottle->weight) == 6 ? 'selected' : '' }}
                                                        value="6">
                                                        6 Kg
                                                    </option>
                                                    <option
                                                        {{ old('weight', $bottle->weight) == 12 ? 'selected' : '' }}
                                                        value="12">12 Kg
                                                    </option>
                                                    <option
                                                        {{ old('weight', $bottle->weight) == 20 ? 'selected' : '' }}
                                                        value="20">20 Kg
                                                    </option>
                                                    <option
                                                        {{ old('weight', $bottle->weight) == 30 ? 'selected' : '' }}
                                                        value="30">30 Kg
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="status"
                                                    class="block mb-2 text-sm font-medium text-gray-900">Status</label>

                                                <select name="status" id="status"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                                    <option
                                                        {{ old('status', $bottle->status) == 'active' ? 'selected' : '' }}
                                                        value="active">
                                                        Active</option>
                                                    <option
                                                        {{ old('status', $bottle->status) == 'inactive' ? 'selected' : '' }}
                                                        value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Save Changes
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Delete modal --}}

                        <div id="popup-modal{{ $bottle->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="popup-modal{{ $bottle->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form action="{{ route('bottles.destroy', $bottle->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                Are you sure you want to delete this bottle?</h3>
                                            <button
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal{{ $bottle->id }}" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </div>

    @section('js')

    @endsection
</x-app-layout>
