<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas MIS - Agent Profile</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50">
    <!-- Navigation and Sidebar remain the same -->

    <div class="p-4 sm:ml-64 pt-20">
        <div class="max-w-4xl mx-auto">
            <!-- Profile Header -->
            <div class="bg-white border border-gray-200 rounded-lg shadow mb-4">
                <div class="p-6">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="sm:flex sm:space-x-5">
                            <div class="flex-shrink-0">
                                <img class="mx-auto h-20 w-20 rounded-full" src="/api/placeholder/80/80" alt="Profile picture">
                            </div>
                            <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                <p class="text-xl font-bold text-gray-900 sm:text-2xl">Sarah Wilson</p>
                                <p class="text-sm font-medium text-gray-600">Senior Gas Agent</p>
                                <p class="text-sm font-medium text-gray-400">ID: AGT-2024-001</p>
                            </div>
                        </div>
                        <div class="mt-5 flex gap-2 sm:mt-0">
                            <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Edit Profile
                            </button>
                            <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Change Password
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <!-- Main Profile Information -->
                <div class="lg:col-span-2 space-y-4">
                    <!-- Personal Information -->
                    <div class="bg-white border border-gray-200 rounded-lg shadow">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold">Personal Information</h3>
                                <button class="text-sm text-blue-600 hover:text-blue-800">Edit</button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Full Name</label>
                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mt-1" value="Sarah Wilson" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Email Address</label>
                                    <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mt-1" value="sarah.wilson@gasmis.com" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Phone Number</label>
                                    <input type="tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mt-1" value="+1 (555) 123-4567" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Date Joined</label>
                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mt-1" value="January 15, 2024" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Work Information -->
                    <div class="bg-white border border-gray-200 rounded-lg shadow">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold">Work Information</h3>
                                <button class="text-sm text-blue-600 hover:text-blue-800">Edit</button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Service Area</label>
                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mt-1" value="North District" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Employee ID</label>
                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mt-1" value="EMP-2024-001" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Working Hours</label>
                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mt-1" value="9:00 AM - 5:00 PM" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Status</label>
                                    <div class="mt-1">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Performance Metrics -->
                    <div class="bg-white border border-gray-200 rounded-lg shadow">
                        <div class="p-6">
                            <h3 class="text-lg font-bold mb-4">Performance Metrics</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="bg-blue-50 p-4 rounded-lg">
                                    <p class="text-sm text-blue-600 font-medium">Total Requests</p>
                                    <p class="text-2xl font-bold text-blue-900">1,234</p>
                                </div>
                                <div class="bg-green-50 p-4 rounded-lg">
                                    <p class="text-sm text-green-600 font-medium">Success Rate</p>
                                    <p class="text-2xl font-bold text-green-900">98.5%</p>
                                </div>
                                <div class="bg-purple-50 p-4 rounded-lg">
                                    <p class="text-sm text-purple-600 font-medium">Response Time</p>
                                    <p class="text-2xl font-bold text-purple-900">15 min</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Information -->
                <div class="lg:col-span-1 space-y-4">
                    <!-- Account Settings -->
                    <div class="bg-white border border-gray-200 rounded-lg shadow">
                        <div class="p-6">
                            <h3 class="text-lg font-bold mb-4">Account Settings</h3>
                            <div class="space-y-3">
                                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="ml-3">Settings</span>
                                </a>
                                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                    </svg>
                                    <span class="ml-3">Notifications</span>
                                </a>
                                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    <span class="ml-3">Privacy & Security</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Log -->
                    <div class="bg-white border border-gray-200 rounded-lg shadow">
                        <div class="p-6">
                            <h3 class="text-lg font-bold mb-4">Recent Activity</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900">Completed Request #1234</p>
                                        <p class="text-xs text-gray-500">2 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900">Updated Profile Information</p>
                                        <p class="text-xs text-gray-500">5 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900">New Request Assigned</p>
                                        <p class="text-xs text-gray-500">1 day ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
