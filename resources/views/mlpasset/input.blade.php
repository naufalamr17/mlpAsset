<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Inventory') }}
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
                    <form method="POST" action="{{ route('store_inventory') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-6">
                                <div>
                                    <x-input-label for="old_asset_code" :value="__('Kode Asset Lama')" />
                                    <x-text-input id="old_asset_code" class="block mt-1 w-full" type="text" name="old_asset_code" :value="old('old_asset_code')" required autofocus />
                                    <x-input-error :messages="$errors->get('old_asset_code')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="location" :value="__('Location')" />
                                    <select id="location" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="location" required>
                                        <option value="" selected disabled>Select Location</option>
                                        <option value="Head Office">Head Office</option>
                                        <option value="Office Molore">Office Molore</option>
                                        <option value="Site Molore">Site Molore</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="asset_category" :value="__('Kategori')" />
                                    <select id="asset_category" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="asset_category" required>
                                        <option value="" selected disabled>Select Category</option>
                                        <option value="Kendaraan">Kendaraan</option>
                                        <option value="Peralatan">Peralatan</option>
                                        <option value="Perlengkapan">Perlengkapan</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('asset_category')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="asset_position_dept" :value="__('Asset Position')" />
                                    <x-text-input id="asset_position_dept" class="block mt-1 w-full" type="text" name="asset_position_dept" required />
                                    <x-input-error :messages="$errors->get('asset_position_dept')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="asset_type" :value="__('Jenis')" />
                                    <x-text-input id="asset_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="asset_type" required>{{ old('asset_type') }}</x-tect-input>
                                        <x-input-error :messages="$errors->get('asset_type')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="description" :value="__('Deskripsi')" />
                                    <x-text-input id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="description" required>{{ old('description') }}</x-tect-input>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex flex-col gap-6">
                                <div>
                                    <x-input-label for="serial_number" :value="__('Serial Number')" />
                                    <x-text-input id="serial_number" class="block mt-1 w-full" type="text" name="serial_number" :value="old('serial_number')" required />
                                    <x-input-error :messages="$errors->get('serial_number')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="acquisition_date" :value="__('Tanggal Perolehan')" />
                                    <input type="date" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="acquisition_date" class="block mt-1 w-full" name="acquisition_date" :value="old('acquisition_date')" required />
                                    <x-input-error :messages="$errors->get('acquisition_date')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="disposal_date" :value="__('Tanggal Penghapusan')" />
                                    <input type="date" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="disposal_date" class="block mt-1 w-full" name="disposal_date" :value="old('disposal_date')" />
                                    <x-input-error :messages="$errors->get('disposal_date')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="useful_life" :value="__('Umur ekonomis (Tahun)')" />
                                    <input type="number" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="useful_life" class="block mt-1 w-full" type="number" name="useful_life" :value="old('useful_life')" required />
                                    <x-input-error :messages="$errors->get('useful_life')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="acquisition_value" :value="__('Nilai Perolehan')" />
                                    <x-text-input id="acquisition_value" class="block mt-1 w-full" type="number" name="acquisition_value" :value="old('acquisition_value')" required />
                                    <x-input-error :messages="$errors->get('acquisition_value')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <x-primary-button class="w-1/3 flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Add Inventory') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>