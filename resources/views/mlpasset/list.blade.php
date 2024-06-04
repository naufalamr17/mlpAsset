<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                        <h2 class="text-xl font-semibold">Inventory List</h2>
                        <a href="{{ route('add_user') }}"><x-primary-button class="items-center justify-center text-white font-bold py-2 px-4 rounded">
                                {{ __('Add Inventory') }}
                            </x-primary-button></a>
                    </div>
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="px-4 py-2">{{ __('Kode Asset') }}</th>
                                <th class="px-4 py-2">{{ __('Kode Asset Lama') }}</th>
                                <th class="px-4 py-2">{{ __('Kategori Asset') }}</th>
                                <th class="px-4 py-2">{{ __('Asset Position') }}</th>
                                <th class="px-4 py-2">{{ __('Jenis') }}</th>
                                <th class="px-4 py-2">{{ __('Description') }}</th>
                                <th class="px-4 py-2">{{ __('Serial') }}</th>
                                <th class="px-4 py-2">{{ __('Tanggal Perolehan') }}</th>
                                <th class="px-4 py-2">{{ __('Nilai Perolehan') }}</th>
                                <th class="px-4 py-2">{{ __('Location') }}</th>
                                <th class="px-4 py-2">{{ __('Status') }}</th>
                                <th class="px-4 py-2">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>