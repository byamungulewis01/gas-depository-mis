<x-app-layout>
    @section('title', 'Agents')
    <div>
        <div class="mb-4 bg-white p-4 rounded-lg shadow sm:flex sm:items-center sm:justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Agents List</h3>
            </div>
            <div class="mt-4 sm:mt-0">
                <button data-modal-target="create-modal" data-modal-toggle="create-modal"
                    class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Agent
                </button>
                <!-- Main modal -->
                <div id="create-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-lg max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Agent Registration
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="create-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5" method="POST" action="{{ route('agents.store') }}">
                                @csrf
                                <div class="grid grid-cols-1">

                                    <div class="mb-3">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="Type full name" required="">

                                    </div>
                                    <div class="mb-3">
                                        <label for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="Type email" required="">

                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone
                                            Number</label>
                                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="Type phone number" required="">

                                    </div>
                                    <div class="mb-3">
                                        <label for="location"
                                            class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                                        <input type="text" name="location" id="location"
                                            value="{{ old('location') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="Type location" required="">

                                    </div>
                                    <div class="mb-3">
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
                                <button
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Phone
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Location
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agents as $agent)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $agent->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $agent->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $agent->phone }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $agent->location }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($agent->status == 'active')
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Active</span>
                                    @else
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">In
                                            Inactive</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" data-modal-target="update-modal{{ $agent->id }}"
                                        data-modal-toggle="update-modal{{ $agent->id }}"
                                        class="font-medium text-blue-600 hover:underline">Edit</a>
                                    &nbsp;&nbsp;
                                    <button data-modal-target="popup-modal{{ $agent->id }}"
                                        data-modal-toggle="popup-modal{{ $agent->id }}"
                                        class="font-medium text-red-600 hover:underline">Delete</button>

                                    <div id="update-modal{{ $agent->id }}" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-lg max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        agent Modification
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-toggle="update-modal{{ $agent->id }}">
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
                                                    action="{{ route('agents.update', $agent->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="grid grid-cols-1">

                                                        <div class="mb-3">
                                                            <label for="name"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                                            <input type="text" name="name" id="name"
                                                                value="{{ old('name', $agent->name) }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Type full name" required="">

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                                            <input type="email" name="email" id="email"
                                                                value="{{ old('email', $agent->email) }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Type email" required="">

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="phone"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Phone
                                                                Number</label>
                                                            <input type="tel" name="phone" id="phone"
                                                                value="{{ old('phone', $agent->phone) }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Type phone number" required="">

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="location"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                                                            <input type="text" name="location" id="location"
                                                                value="{{ old('location', $agent->location) }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Type location" required="">

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Status</label>

                                                            <select name="status" id="status"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                                                <option
                                                                    {{ old('status', $agent->status) == 'active' ? 'selected' : '' }}
                                                                    value="active">
                                                                    Active</option>
                                                                <option
                                                                    {{ old('status', $agent->status) == 'inactive' ? 'selected' : '' }}
                                                                    value="inactive">Inactive</option>
                                                            </select>

                                                        </div>

                                                    </div>
                                                    <button
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                        Save Changes
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Delete modal --}}


                                    <div id="popup-modal{{ $agent->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal{{ $agent->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <form action="{{ route('agents.destroy', $agent->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="p-4 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3
                                                            class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                            Are you sure you want to delete this agent?</h3>
                                                        <button
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Yes, I'm sure
                                                        </button>
                                                        <button data-modal-hide="popup-modal{{ $agent->id }}"
                                                            type="button"
                                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                            cancel</button>
                                                    </div>
                                                </form>
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
