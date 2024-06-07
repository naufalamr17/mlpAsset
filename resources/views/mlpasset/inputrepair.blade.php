<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Breakdown Asset') }}
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
                    <form method="POST" action="">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-6">
                                <div>
                                    <x-input-label for="asset_code" :value="__('Kode Asset')" />
                                    <x-text-input id="asset_code" class="block mt-1 w-full" type="text" name="asset_code" :value="old('asset_code')" autofocus />
                                    <x-input-error :messages="$errors->get('asset_code')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="location" :value="__('Location')" />
                                    <select id="location" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="location" disabled>
                                        <option value="" selected disabled>Select Location</option>
                                        <option value="Head Office">01 - Head Office</option>
                                        <option value="Office Kendari">02 - Office Kendari</option>
                                        <option value="Site Molore">03 - Site Molore</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="asset_category" :value="__('Kategori')" />
                                    <select id="asset_category" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="asset_category" disabled>
                                        <option value="" selected disabled>Select Category</option>
                                        <option value="Kendaraan">01 - Kendaraan</option>
                                        <option value="Mesin">02 - Mesin</option>
                                        <option value="Alat Berat">03 - Alat Berat</option>
                                        <option value="Alat Lab">04 - Alat Lab</option>
                                        <option value="Alat Preparasi">05 - Alat Preparasi</option>
                                        <option value="Peralatan">06 - Peralatan</option>
                                        <option value="Perlengkapan">07 - Perlengkapan</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('asset_category')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="asset_position_dept" :value="__('Asset Position')" />
                                    <input id="asset_position_dept" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="asset_position_dept" list="asset_position_list" disabled />
                                    <datalist id="asset_position_list">
                                        <option value="Geology">Geology</option>
                                        <option value="R. HSE">R. HSE</option>
                                        <option value="Klinik">Klinik</option>
                                        <option value="R. Finance">R. Finance</option>
                                        <option value="R. Meeting">R. Meeting</option>
                                        <option value="R. HRGA (SITE)">R. HRGA (SITE)</option>
                                        <option value="R. Logistik">R. Logistik</option>
                                        <option value="R. Produksi">R. Produksi</option>
                                        <option value="R. KTT">R. KTT</option>
                                        <option value="R. Eksternal">R. Eksternal</option>
                                        <option value="R. Shipping">R. Shipping</option>
                                        <option value="R. Maintenance">R. Maintenance</option>
                                        <option value="R. Lab">R. Lab</option>
                                        <option value="R. Preparasi">R. Preparasi</option>
                                        <option value="Pos Security">Pos Security</option>
                                        <option value="Pantry SITE">Pantry SITE</option>
                                        <option value="Gs Maintenance">Gs Maintenance</option>
                                        <option value="Rumah Genset">Rumah Genset</option>
                                        <option value="Room A1">Room A1</option>
                                        <option value="Room A2">Room A2</option>
                                        <option value="Room A3A">Room A3A</option>
                                        <option value="Room A3B">Room A3B</option>
                                        <option value="Room A4">Room A4</option>
                                        <option value="Room A5">Room A5</option>
                                        <option value="Room A6">Room A6</option>
                                        <option value="Room A7">Room A7</option>
                                        <option value="Room A8">Room A8</option>
                                        <option value="Room A9">Room A9</option>
                                        <option value="Room A10">Room A10</option>
                                        <option value="Room B1">Room B1</option>
                                        <option value="Room B2">Room B2</option>
                                        <option value="Room B3A">Room B3A</option>
                                        <option value="Room B3B">Room B3B</option>
                                        <option value="Room B4">Room B4</option>
                                        <option value="Room B5">Room B5</option>
                                        <option value="Room B6">Room B6</option>
                                        <option value="Room B7">Room B7</option>
                                        <option value="Room B8">Room B8</option>
                                        <option value="Room B9">Room B9</option>
                                        <option value="Room B10">Room B10</option>
                                        <option value="User">User</option>
                                        <option value="Mushola">Mushola</option>
                                        <option value="R. Dapur">R. Dapur</option>
                                        <option value="Gudang GA">Gudang GA</option>
                                        <option value="Stone Crusher">Stone Crusher</option>
                                        <option value="Survey">Survey</option>
                                        <option value="Jetty">Jetty</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="Room VIP 1">Room VIP 1</option>
                                        <option value="Room VIP 2">Room VIP 2</option>
                                        <option value="Room VIP 3A">Room VIP 3A</option>
                                        <option value="Room VIP 3B">Room VIP 3B</option>
                                        <option value="Room VIP 5">Room VIP 5</option>
                                        <option value="Laundry">Laundry</option>
                                        <option value="Gudang Mesin">Gudang Mesin</option>
                                        <option value="LV 01">LV 01</option>
                                        <option value="LV 02">LV 02</option>
                                        <option value="LV 03">LV 03</option>
                                        <option value="LV 05">LV 05</option>
                                        <option value="LV 06">LV 06</option>
                                        <option value="LV 07">LV 07</option>
                                        <option value="LV 08">LV 08</option>
                                        <option value="LV 09">LV 09</option>
                                        <option value="LV 10">LV 10</option>
                                        <option value="LV 11">LV 11</option>
                                        <option value="LV 12">LV 12</option>
                                        <option value="LV 16">LV 16</option>
                                        <option value="LV 15">LV 15</option>
                                        <option value="ELF">ELF</option>
                                        <option value="Dump Truck">Dump Truck</option>
                                        <option value="R. PAK WIN">R. PAK WIN</option>
                                        <option value="R. Pantry">R. Pantry</option>
                                        <option value="R. Meeting Kecil">R. Meeting Kecil</option>
                                        <option value="R. Meeting Besar">R. Meeting Besar</option>
                                        <option value="R. Staff">R. Staff</option>
                                        <option value="R. Manager 4">R. Manager 4</option>
                                        <option value="R. Deputy GM Support">R. Deputy GM Support</option>
                                        <option value="R. Manager 1">R. Manager 1</option>
                                        <option value="R. Manager 2">R. Manager 2</option>
                                        <option value="R. Manager 3">R. Manager 3</option>
                                        <option value="R. Direksi 1">R. Direksi 1</option>
                                        <option value="R. Direksi 2">R. Direksi 2</option>
                                        <option value="R. Direksi 3">R. Direksi 3</option>
                                        <option value="R. Lounge">R. Lounge</option>
                                        <option value="R. Legal">R. Legal</option>
                                        <option value="R. Receptionist">R. Receptionist</option>
                                        <option value="Basement">Basement</option>
                                        <option value="R. HRGA-IT">R. HRGA-IT</option>
                                        <option value="R. Staff 18B/L">R. Staff 18B/L</option>
                                        <option value="R. GM Operation">R. GM Operation</option>
                                        <option value="R. Deputy GM Operation">R. Deputy GM Operation</option>
                                        <option value="R. Manager Engineer">R. Manager Engineer</option>
                                        <option value="R. Manager 18B/L">R. Manager 18B/L</option>
                                        <option value="R. Smooking Room">R. Smooking Room</option>
                                        <option value="R. CEO">R. CEO</option>
                                    </datalist>
                                    <x-input-error :messages="$errors->get('asset_position_dept')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="asset_type" :value="__('Jenis')" />
                                    <input list="asset_types" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="asset_type" name="asset_type" disabled>
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
                                    <x-text-input id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="description" disabled>{{ old('description') }}</x-tect-input>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="serial_number" :value="__('Serial Number')" />
                                    <x-text-input id="serial_number" class="block mt-1 w-full" type="text" name="serial_number" :value="old('serial_number')" disabled />
                                    <x-input-error :messages="$errors->get('serial_number')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex flex-col gap-6">
                                <div>
                                    <x-input-label for="acquisition_date" :value="__('Tanggal Perolehan')" />
                                    <input type="date" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="acquisition_date" class="block mt-1 w-full" name="acquisition_date" :value="old('acquisition_date')" disabled />
                                    <x-input-error :messages="$errors->get('acquisition_date')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="useful_life" :value="__('Umur ekonomis (Tahun)')" />
                                    <input type="number" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="useful_life" class="block mt-1 w-full" type="number" name="useful_life" :value="old('useful_life')" disabled />
                                    <x-input-error :messages="$errors->get('useful_life')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="acquisition_value" :value="__('Nilai Perolehan')" />
                                    <x-text-input id="acquisition_value" class="block mt-1 w-full" type="text" name="acquisition_value" :value="old('acquisition_value')" disabled/>
                                    <x-input-error :messages="$errors->get('acquisition_value')" class="mt-2" />
                                </div>

                            </div>
                        </div>

                        <div class="mt-6">
                            <x-primary-button class="w-1/3 flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Submit') }}
                            </x-primary-button>

                            <a href="{{ route('inventory') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 bg-red-500 hover:bg-red-700">
                                {{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Menggunakan jQuery untuk memudahkan pemilihan elemen dan manipulasi DOM
        $(document).ready(function() {
            // Event listener untuk input asset_code
            $('#asset_code').on('input', function() {
                // Ambil nilai yang dimasukkan ke dalam input asset_code
                var assetCode = $(this).val();

                // Lakukan permintaan AJAX untuk mendapatkan data inventaris berdasarkan kode aset
                $.ajax({
                    type: 'GET',
                    url: '/get-inventory-data', // Ganti dengan URL yang benar sesuai dengan rute Anda
                    data: {
                        asset_code: assetCode
                    },
                    success: function(response) {
                        // Isi input lainnya dengan data yang diterima dari permintaan AJAX
                        $('#location').val(response.location);
                        $('#asset_category').val(response.asset_category);
                        $('#asset_position_dept').val(response.asset_position_dept);
                        $('#asset_type').val(response.asset_type);
                        $('#description').val(response.description);
                        $('#serial_number').val(response.serial_number);
                        $('#acquisition_date').val(response.acquisition_date);
                        $('#useful_life').val(response.useful_life);
                        $('#acquisition_value').val(response.acquisition_value);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log pesan kesalahan ke konsol
                        // Atau tampilkan pesan kesalahan kepada pengguna
                        alert('Terjadi kesalahan saat mengambil data inventaris. Silakan coba lagi.');
                    }
                });
            });
        });
    </script>

</x-app-layout>