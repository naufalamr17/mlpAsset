<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Asset') }}
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
                    <form method="POST" action="{{ route('update_inventory', $asset->id) }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-6">
                                <div>
                                    <x-input-label for="old_asset_code" :value="__('Kode Asset Lama')" />
                                    <x-text-input id="old_asset_code" class="block mt-1 w-full" type="text" name="old_asset_code" :value="old('old_asset_code', $asset->old_asset_code)" required autofocus />
                                    <x-input-error :messages="$errors->get('old_asset_code')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="location" :value="__('Location')" />
                                    <select id="location" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="location" required>
                                        <option value="" selected disabled>Select Location</option>
                                        <option value="Head Office" {{ $asset->location == 'Head Office' ? 'selected' : '' }}>Head Office</option>
                                        <option value="Office Kendari" {{ $asset->location == 'Office Kendari' ? 'selected' : '' }}>Office Kendari</option>
                                        <option value="Site Molore" {{ $asset->location == 'Site Molore' ? 'selected' : '' }}>Site Molore</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="asset_category" :value="__('Kategori')" />
                                    <select id="asset_category" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="asset_category" required>
                                        <option value="" selected disabled>Select Category</option>
                                        <option value="Kendaraan" {{ $asset->asset_category == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                                        <option value="Mesin" {{ $asset->asset_category == 'Mesin' ? 'selected' : '' }}>Mesin</option>
                                        <option value="Alat Berat" {{ $asset->asset_category == 'Alat Berat' ? 'selected' : '' }}>Alat Berat</option>
                                        <option value="Alat Lab" {{ $asset->asset_category == 'Alat Lab' ? 'selected' : '' }}>Alat Lab</option>
                                        <option value="Alat Preparasi" {{ $asset->asset_category == 'Alat Preparasi' ? 'selected' : '' }}>Alat Preparasi</option>
                                        <option value="Peralatan" {{ $asset->asset_category == 'Peralatan' ? 'selected' : '' }}>Peralatan</option>
                                        <option value="Perlengkapan" {{ $asset->asset_category == 'Perlengkapan' ? 'selected' : '' }}>Perlengkapan</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('asset_category')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="asset_position_dept" :value="__('Asset Position')" />
                                    <x-text-input id="asset_position_dept" class="block mt-1 w-full" type="text" name="asset_position_dept" :value="old('asset_position_dept', $asset->asset_position_dept)" required />
                                    <x-input-error :messages="$errors->get('asset_position_dept')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="asset_type" :value="__('Jenis')" />
                                    <input list="asset_types" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="asset_type" name="asset_type" value="{{ old('asset_type', $asset->asset_type) }}" required>
                                    <datalist id="asset_types">
                                        <option value="LV">LV</option>
                                        <option value="Mobil Tangki">Mobil Tangki</option>
                                        <option value="Dump Truck">Dump Truck</option>
                                        <option value="Elf">Elf</option>
                                        <option value="Mobil Operasional">Mobil Operasional</option>
                                        <option value="Motor Operasional">Motor Operasional</option>
                                        <option value="Speed Boat">Speed Boat</option>
                                        <option value="Genset">Genset</option>
                                        <option value="Compressor">Compressor</option>
                                        <option value="Crusher Big">Crusher Big</option>
                                        <option value="Excavator">Excavator</option>
                                        <option value="Ramp Door">Ramp Door</option>
                                        <option value="Oven">Oven</option>
                                        <option value="Jaw Crusher">Jaw Crusher</option>
                                        <option value="Pul Vulizer">Pul Vulizer</option>
                                        <option value="Mixer Type C">Mixer Type C</option>
                                        <option value="Top Grinder">Top Grinder</option>
                                        <option value="Roll Crusher">Roll Crusher</option>
                                        <option value="Sieve Shaker Mesin">Sieve Shaker Mesin</option>
                                        <option value="Epsilon">Epsilon</option>
                                        <option value="Mesin Press">Mesin Press</option>
                                        <option value="Laptop/PC">Laptop/PC</option>
                                        <option value="Printer/Scanner">Printer/Scanner</option>
                                        <option value="UPS">UPS</option>
                                        <option value="GPS">GPS</option>
                                        <option value="Alat Komunikasi">Alat Komunikasi</option>
                                        <option value="Perangkat Jaringan">Perangkat Jaringan</option>
                                        <option value="Brankas">Brankas</option>
                                        <option value="Alat Kesehatan">Alat Kesehatan</option>
                                        <option value="Meja">Meja</option>
                                        <option value="Kursi">Kursi</option>
                                        <option value="Lemari">Lemari</option>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Tempat Tidur">Tempat Tidur</option>
                                        <option value="Lain - Lain">Lain - Lain</option>
                                    </datalist>
                                    <x-input-error :messages="$errors->get('asset_type')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="description" :value="__('Deskripsi')" />
                                    <x-text-input id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="description" :value="old('description', $asset->description)" required />
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="serial_number" :value="__('Serial Number')" />
                                    <x-text-input id="serial_number" class="block mt-1 w-full" type="text" name="serial_number" :value="old('serial_number', $asset->serial_number)" required />
                                    <x-input-error :messages="$errors->get('serial_number')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex flex-col gap-6">
                                <div>
                                    <x-input-label for="acquisition_date" :value="__('Tanggal Perolehan')" />
                                    <input type="date" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="acquisition_date" name="acquisition_date" value="{{ isset($asset->acquisition_date) ? $asset->acquisition_date : '' }}" required />
                                    <x-input-error :messages="$errors->get('acquisition_date')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="useful_life" :value="__('Umur ekonomis (Tahun)')" />
                                    <x-text-input type="number" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="useful_life" name="useful_life" :value="old('useful_life', $asset->useful_life)" required />
                                    <x-input-error :messages="$errors->get('useful_life')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="acquisition_value" :value="__('Nilai Perolehan')" />
                                    <x-text-input id="acquisition_value" class="block mt-1 w-full" type="number" name="acquisition_value" :value="old('acquisition_value', $asset->acquisition_value)" required />
                                    <x-input-error :messages="$errors->get('acquisition_value')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="hand_over_date" :value="__('Tanggal Serah Terima')" />
                                    <input type="date" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="hand_over_date" name="hand_over_date" value="{{ isset($asset->hand_over_date) ? $asset->hand_over_date : '' }}" />
                                    <x-input-error :messages="$errors->get('hand_over_date')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="user" :value="__('User')" />
                                    <x-text-input id="user" class="block mt-1 w-full" type="text" name="user" :value="old('user', $asset->user)" />
                                    <x-input-error :messages="$errors->get('user')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="dept" :value="__('Dept')" />
                                    <x-text-input id="dept" class="block mt-1 w-full" type="text" name="dept" :value="old('dept', $asset->dept)" />
                                    <x-input-error :messages="$errors->get('dept')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <x-primary-button class="w-1/3 flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Update Asset') }}
                            </x-primary-button>

                            <a href="{{ route('inventory') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 bg-red-500 hover:bg-red-700">
                                {{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>