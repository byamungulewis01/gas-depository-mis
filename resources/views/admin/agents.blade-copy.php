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
                            <form class="px-6 pt-2 pb-6">
                                <div class="grid grid-cols-1">

                                    <div class="mb-3">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="Type full name" required="">

                                    </div>
                                    <div class="mb-3">
                                        <label for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="Type email" required="">

                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone
                                            Number</label>
                                        <input type="tel" name="phone" id="phone"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="Type phone number" required="">

                                    </div>
                                    <div class="mb-3">
                                        <label for="location"
                                            class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                                        <input type="text" name="location" id="location"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="Type location" required="">

                                    </div>
                                    <div class="mb-3">
                                        <label for="status"
                                            class="block mb-2 text-sm font-medium text-gray-900">Status</label>

                                        <select name="status" id="status"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>

                                    </div>

                                </div>
                                <button type="submit"
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
                                Agent N<sup>0</sup>
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
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                01
                            </th>
                            <td class="px-6 py-4">
                                KGS001
                            </td>
                            <td class="px-6 py-4">
                                BYAMUNGU Lewis
                            </td>
                            <td class="px-6 py-4">
                                byamungulewis@gmail.com
                            </td>
                            <td class="px-6 py-4">
                                +2765888499
                            </td>
                            <td class="px-6 py-4">
                                Kigali Kicu
                            </td>
                            <td class="px-6 py-4">
                                Active
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                &nbsp;&nbsp;
                                <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

    </div>

    @section('js')

    @endsection
</x-app-layout>
