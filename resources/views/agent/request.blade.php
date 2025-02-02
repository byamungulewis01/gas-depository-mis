<x-app-layout>
    @section('title', 'Request')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold mb-6">Register New Customer Request</h2>

            <form class="space-y-6" method="POST" action="{{ route('agent.store_requests') }}">
                <!-- Customer Information -->
                @csrf
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold">Customer Information</h3>

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900">Customer
                                Name</label>
                            <input type="text" id="customer_name" name="customer_name"
                                value="{{ old('customer_name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                        <div>
                            <label for="customer_phone" class="block mb-2 text-sm font-medium text-gray-900">Phone
                                Number</label>
                            <input type="tel" id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                    </div>

                    <div>
                        <label for="customer_address" class="block mb-2 text-sm font-medium text-gray-900">Delivery
                            Address</label>
                        <textarea id="customer_address" rows="2" name="customer_address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>{{ old('customer_address') }}</textarea>
                    </div>
                </div>

                <!-- Bottle Information -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold">Bottle Information</h3>

                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="bottle_id" class="block mb-2 text-sm font-medium text-gray-900">Bottle
                                Type</label>
                            <select id="bottle_id" name="bottle_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                                <option value="">Select a bottle type</option>
                                @foreach ($bottles as $bottle)
                                    <option {{ old('bottle_id') == $bottle->id ? 'selected' : '' }}
                                        value="{{ $bottle->id }}">{{ $bottle->name }} - Weight
                                        ({{ $bottle->weight }}kg)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="remaining_weight" class="block mb-2 text-sm font-medium text-gray-900">Remaining
                                Weight (kg)</label>
                            <input type="number" step="0.1" id="remaining_weight" name="remaining_weight"
                                value="{{ old('remaining_weight') }}" min="0"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                    </div>

                    <div>
                        <label for="notes" class="block mb-2 text-sm font-medium text-gray-900">Additional
                            Notes</label>
                        <textarea id="notes" rows="2" name="notes"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">Submit
                    Request</button>
            </form>
        </div>
    </div>
    @section('js')

    @endsection
</x-app-layout>
