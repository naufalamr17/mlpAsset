<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Center') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between mb-4">
                        <h2 class="text-xl font-semibold">User List</h2>
                        <a href="#"><x-primary-button class="items-center justify-center text-white font-bold py-2 px-4 rounded">
                                {{ __('Add User') }}
                            </x-primary-button></a>
                    </div>
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="px-4 py-2">{{ __('Name') }}</th>
                                <th class="px-4 py-2">{{ __('Email') }}</th>
                                <th class="px-4 py-2">{{ __('Access') }}</th>
                                <th class="px-4 py-2">{{ __('Status') }}</th>
                                <th class="px-4 py-2">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 border-t border-gray-200">
                                    <div class="flex items-center justify-center">John Doe</div>
                                </td>
                                <td class="px-4 py-2 border-t border-gray-200">
                                    <div class="flex items-center justify-center">johndoe@example.com</div>
                                </td>
                                <td class="px-4 py-2 border-t border-gray-200">
                                    <div class="flex items-center justify-center">Admin</div>
                                </td>
                                <td class="px-4 py-2 border-t border-gray-200">
                                    <div class="flex items-center justify-center">Active</div>
                                </td>
                                <td class="px-4 py-2 border-t border-gray-200">
                                    <div class="flex items-center justify-center">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>||
                                        <a href="#" class="text-red-600 hover:text-red-900 ml-2">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>