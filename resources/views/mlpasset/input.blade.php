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
                    <form method="POST" action="{{ route('store_user') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-6">
                                <div>
                                    <x-input-label for="name" :value="__('Kode Asset Lama')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="email" :value="__('Location')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="status" :value="__('Kategori')" />
                                    <select id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="status" required>
                                        <option value="" selected disabled>Select Status</option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Modified">Modified</option>
                                        <option value="Viewers">Viewers</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="password" :value="__('Asset Position')" />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="description" :value="__('Deskripsi')" />
                                    <textarea id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="description" required>{{ old('description') }}</textarea>
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
                                    <input type="date" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="disposal_date" class="block mt-1 w-full" name="disposal_date" :value="old('disposal_date')" required />
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