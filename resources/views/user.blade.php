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
                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br>
                    @endif

                    @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('success') }}
                    </div><br>
                    @endif
                    <div class="flex justify-between mb-4">
                        <h2 class="text-xl font-semibold">User List</h2>
                        <a href="{{ route('add_user') }}"><x-primary-button class="items-center justify-center text-white font-bold py-2 px-4 rounded">
                                {{ __('Add User') }}
                            </x-primary-button></a>
                    </div>
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="px-4 py-2">{{ __('Action') }}</th>
                                <th class="px-4 py-2">{{ __('Name') }}</th>
                                <th class="px-4 py-2">{{ __('Email') }}</th>
                                <th class="px-4 py-2">{{ __('Status') }}</th>
                                <th class="px-4 py-2">{{ __('Access') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            @php
                            $userAccesses = $accesses->where('user_id', $user->id);
                            @endphp
                            <tr class="border-b border-gray-200">
                                <td class="px-4 py-2" rowspan="{{ $userAccesses->count() + 1 }}">
                                    <div class="flex items-center justify-center">
                                        <div class="bg-indigo-100 rounded-lg p-2">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="mx-2"></div>
                                        <form action="{{ route('destroy_user', ['id' => $user->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td class="px-4 py-2" rowspan="{{ $userAccesses->count() + 1 }}">
                                    <div class="flex items-center justify-center">{{ $user->name }}</div>
                                </td>
                                <td class="px-4 py-2" rowspan="{{ $userAccesses->count() + 1 }}">
                                    <div class="flex items-center justify-center">{{ $user->email }}</div>
                                </td>
                                <td class="px-4 py-2" rowspan="{{ $userAccesses->count() + 1 }}">
                                    <div class="flex items-center justify-center">{{ $user->status }}</div>
                                </td>
                            </tr>
                            @foreach($userAccesses as $access)
                            <tr class="border-b border-gray-200">
                                <td class="px-4 py-2">
                                    <div class="flex items-center justify-center">{{ $access->access }}</div>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>