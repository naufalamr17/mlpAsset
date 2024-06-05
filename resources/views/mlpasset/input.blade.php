<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Asset') }}
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
                                        <option value="Office Kendari">Office Kendari</option>
                                        <option value="Site Molore">Site Molore</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="asset_category" :value="__('Kategori')" />
                                    <select id="asset_category" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="asset_category" required>
                                        <option value="" selected disabled>Select Category</option>
                                        <option value="Kendaraan">Kendaraan</option>
                                        <option value="Mesin">Mesin</option>
                                        <option value="Alat Berat">Alat Berat</option>
                                        <option value="Alat Lab">Alat Lab</option>
                                        <option value="Alat Preparasi">Alat Preparasi</option>
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
                                    <input list="asset_types" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="asset_type" name="asset_type" required>
                                    <datalist id="asset_types">
                                        <option value="LV">LV (ID: 001)</option>
                                        <option value="Mobil Tangki">Mobil Tangki (ID: 002)</option>
                                        <option value="Dump Truck">Dump Truck (ID: 003)</option>
                                        <option value="Elf">Elf (ID: 004)</option>
                                        <option value="Mobil Operasional">Mobil Operasional (ID: 005)</option>
                                        <option value="Motor Operasional">Motor Operasional (ID: 006)</option>
                                        <option value="Speed Boat">Speed Boat (ID: 007)</option>
                                        <option value="Genset">Genset (ID: 008)</option>
                                        <option value="Compressor">Compressor (ID: 009)</option>
                                        <option value="Crusher Big">Crusher Big (ID: 010)</option>
                                        <option value="Excavator">Excavator (ID: 011)</option>
                                        <option value="Ramp Door">Ramp Door (ID: 012)</option>
                                        <option value="Oven">Oven (ID: 013)</option>
                                        <option value="Jaw Crusher">Jaw Crusher (ID: 014)</option>
                                        <option value="Pul Vulizer">Pul Vulizer (ID: 015)</option>
                                        <option value="Mixer Type C">Mixer Type C (ID: 016)</option>
                                        <option value="Top Grinder">Top Grinder (ID: 017)</option>
                                        <option value="Roll Crusher">Roll Crusher (ID: 018)</option>
                                        <option value="Sieve Shaker Mesin">Sieve Shaker Mesin (ID: 019)</option>
                                        <option value="Epsilon">Epsilon (ID: 020)</option>
                                        <option value="Mesin Press">Mesin Press (ID: 021)</option>
                                        <option value="Laptop/PC">Laptop/PC (ID: 022)</option>
                                        <option value="Printer/Scanner">Printer/Scanner (ID: 023)</option>
                                        <option value="UPS">UPS (ID: 024)</option>
                                        <option value="GPS">GPS (ID: 025)</option>
                                        <option value="Alat Komunikasi">Alat Komunikasi (ID: 026)</option>
                                        <option value="Perangkat Jaringan">Perangkat Jaringan (ID: 027)</option>
                                        <option value="Brankas">Brankas (ID: 028)</option>
                                        <option value="Alat Kesehatan">Alat Kesehatan (ID: 029)</option>
                                        <option value="Meja">Meja (ID: 030)</option>
                                        <option value="Kursi">Kursi (ID: 031)</option>
                                        <option value="Lemari">Lemari (ID: 032)</option>
                                        <option value="Elektronik">Elektronik (ID: 033)</option>
                                        <option value="Tempat Tidur">Tempat Tidur (ID: 034)</option>
                                        <option value="Lain - Lain">Lain - Lain (ID: 050)</option>
                                    </datalist>
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

                                <!-- <div>
                                    <x-input-label for="disposal_date" :value="__('Tanggal Penghapusan')" />
                                    <input type="date" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="disposal_date" class="block mt-1 w-full" name="disposal_date" :value="old('disposal_date')" />
                                    <x-input-error :messages="$errors->get('disposal_date')" class="mt-2" />
                                </div> -->

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
                                {{ __('Add Asset') }}
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