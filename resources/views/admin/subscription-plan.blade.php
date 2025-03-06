<x-app-layout>
    @section('title', 'Bottles')
    <div>
        <div class="mb-4 bg-white p-4 rounded-lg shadow sm:flex sm:items-center sm:justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Subsrciption Plan</h3>
            </div>
            <div class="mt-4 sm:mt-0">
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Plan
                </button>
                <!-- Main modal -->
                <div id="crud-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Plan Registration
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
                            <form class="p-4 md:p-5" method="POST" action="{{ route('subscription-plan.store') }}">
                                @csrf
                                <div class="grid gap-4 mb-6 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan
                                            Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Enter plan name" required="">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="price"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price
                                            (FRW)</label>
                                        <input type="number" name="price" id="price" value="{{ old('price') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Enter price" required="">
                                        <x-input-error :messages="$errors->get('price')" class="mt-2" />

                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="duration"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duration
                                            (Month)</label>
                                        <input type="number" name="duration" id="duration"
                                            value="{{ old('duration') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Months duration" required="">
                                        <x-input-error :messages="$errors->get('duration')" class="mt-2" />

                                    </div>


                                    <div class="col-span-2">
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                        <textarea id="description" rows="2" name="description" placeholder="Type here..."
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('description') }}</textarea>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />

                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="status"
                                            class="block mb-2 text-sm font-medium text-gray-900">Status</label>

                                        <select name="status" id="status"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                            <option {{ old('status') == 'active' ? 'selected' : '' }} value="active">
                                                Active</option>
                                            <option {{ old('status') == 'inactive' ? 'selected' : '' }}
                                                value="inactive">Inactive</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('status')" class="mt-2" />

                                    </div>
                                    <div class="col-span-2 sm:col-span-1 flex items-center mt-2">
                                        <input type="checkbox" id="free-plan"
                                            class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500"
                                            name="is_free_plan" {{ old('is_free_plan') ? 'checked' : '' }} />
                                        <label for="free-plan" class="ml-2 text-sm font-medium text-gray-900">Check as
                                            Free Plan</label>
                                        <x-input-error :messages="$errors->get('is_free_plan')" class="mt-2" />

                                    </div>


                                </div>
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Submit
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
                @foreach ($collection as $item)
                    <div class="border border-gray-200 rounded-lg shadow hover:shadow-lg hover:bg-gray-50">
                        <div class="p-4">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $item->name }}</h3>
                            <p class="mt-2 text-sm text-gray-600"><span class="font-semibold">Duration:</span>
                                {{ $item->duration }} Months</p>
                            <p class="mt-1 text-sm text-gray-600"><span class="font-semibold">Price:</span>
                                {{ number_format($item->price) }} Frw</p>
                            <p class="mt-2">
                                @if ($item->status == 'active')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Active</span>
                                @else
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">In
                                        Inactive</span>
                                @endif
                            </p>
                            <div class="flex justify-end space-x-2">
                                <a href="#" data-modal-target="update-modal{{ $item->id }}"
                                    data-modal-toggle="update-modal{{ $item->id }}"
                                    class="font-medium text-blue-600 hover:underline">Edit</a>
                                &nbsp;&nbsp;
                                <button data-modal-target="popup-modal{{ $item->id }}"
                                    data-modal-toggle="popup-modal{{ $item->id }}"
                                    class="font-medium text-red-600 hover:underline">Delete</button>
                            </div>
                        </div>
                        <div id="update-modal{{ $item->id }}" tabindex="-1" aria-hidden="true"
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
                                            data-modal-toggle="update-modal{{ $item->id }}">
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
                                        action="{{ route('subscription-plan.update', $item->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid gap-4 mb-6 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan
                                                    Name</label>
                                                <input type="text" name="name" id="name"
                                                    value="{{ old('name', $item->name) }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Enter plan name" required="">
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="price"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price
                                                    (FRW)
                                                </label>
                                                <input type="number" name="price" id="price"
                                                    value="{{ old('price', $item->price) }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Enter price" required="">
                                                <x-input-error :messages="$errors->get('price')" class="mt-2" />

                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="duration"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duration
                                                    (Month)</label>
                                                <input type="number" name="duration" id="duration"
                                                    value="{{ old('duration', $item->duration) }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Months duration" required="">
                                                <x-input-error :messages="$errors->get('duration')" class="mt-2" />

                                            </div>


                                            <div class="col-span-2">
                                                <label for="description"
                                                    class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                                <textarea id="description" rows="2" name="description" placeholder="Type here..."
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('description', $item->description) }}</textarea>
                                                <x-input-error :messages="$errors->get('description')" class="mt-2" />

                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="status"
                                                    class="block mb-2 text-sm font-medium text-gray-900">Status</label>

                                                <select name="status" id="status"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                                    <option
                                                        {{ old('status', $item->status) == 'active' ? 'selected' : '' }}
                                                        value="active">
                                                        Active</option>
                                                    <option
                                                        {{ old('status', $item->status) == 'inactive' ? 'selected' : '' }}
                                                        value="inactive">Inactive</option>
                                                </select>
                                                <x-input-error :messages="$errors->get('status')" class="mt-2" />

                                            </div>
                                            <div class="col-span-2 sm:col-span-1 flex items-center mt-2">
                                                <input type="checkbox" name="is_free_plan" id="free-plan"
                                                    {{ old('is_free_plan', $item->is_free_plan) ? 'checked' : '' }}
                                                    class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500" />
                                                <label for="free-plan"
                                                    class="ml-2 text-sm font-medium text-gray-900">Check as
                                                    Free Plan</label>
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

                        <div id="popup-modal{{ $item->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="popup-modal{{ $item->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form action="{{ route('subscription-plan.destroy', $item->id) }}"
                                        method="post">
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
                                                Are you sure you want to delete this plan?</h3>
                                            <button
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal{{ $item->id }}" type="button"
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
