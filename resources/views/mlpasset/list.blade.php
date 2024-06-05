<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory Asset Management') }}
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
                        <h2 class="text-xl font-semibold">Inventory Asset Management</h2>
                        <a href="{{ route('add_inventory') }}"><x-primary-button class="items-center justify-center text-white font-bold py-2 px-4 rounded">
                                {{ __('Add Asset') }}
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
                                <th class="px-4 py-2">{{ __('User') }}</th>
                                <th class="px-4 py-2">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventory as $inv)
                            <tr class="border-b border-gray-200 text-center text-xs">
                                <?php
                                // dd($inv);
                                ?>
                                <td>{{ $inv->asset_code }}</td>
                                <td>{{ $inv->old_asset_code }}</td>
                                <td>{{ $inv->asset_category }}</td>
                                <td>{{ $inv->asset_position_dept }}</td>
                                <td>{{ $inv->asset_type }}</td>
                                <td>{{ $inv->description }}</td>
                                <td>{{ $inv->serial_number }}</td>
                                <td>{{ $inv->acquisition_date }}</td>
                                <td>{{ $inv->acquisition_value }}</td>
                                <td>{{ $inv->location }}</td>
                                <td>{{ $inv->status }}</td>
                                @if(isset($inv->user))
                                <td>{{ $inv->user }}</td>
                                @else
                                <td>-</td>
                                @endif
                                <td>
                                    <div class="flex items-center justify-center">
                                        <div class="bg-indigo-100 rounded-lg p-2">
                                            <a href="{{ route('edit_inventory', ['id' => $inv->id]) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="mx-2"></div>
                                        <form action="{{ route('destroy_inventory', ['id' => $inv->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>