<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add User') }}
        </h2>
    </x-slot>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('add_user') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-6">
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="status" :value="__('Status')" />
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
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between">
                                    <x-input-label for="access" :value="__('Access')" />
                                    <x-primary-button type="button" id="add-access" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                    </x-primary-button>
                                </div>
                                <div id="access-container" class="mt-2 space-y-4">
                                    <div class="flex items-center">
                                        <select name="access[]" class="block mt-1 mr-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                            <option value="" disabled selected>Select Access</option>
                                            <option value="Asset Management">Asset Management</option>
                                            <option value="IT Asset Management">IT Asset Management</option>
                                            <option value="ATK Management">ATK Management</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('access')" class="mt-2" />
                                        <button type="button" class="ml-2 bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded remove-access">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <x-primary-button class="w-1/3 flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Create Account') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-access').addEventListener('click', function() {
            var container = document.getElementById('access-container');
            var div = document.createElement('div');
            div.className = 'flex items-center mt-4';

            var select = document.createElement('select');
            select.name = 'access[]';
            select.className = 'block mt-1 mr-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm';
            select.required = true;

            var optionDefault = document.createElement('option');
            optionDefault.value = '';
            optionDefault.disabled = true;
            optionDefault.selected = true;
            optionDefault.textContent = 'Select Access';

            var option1 = document.createElement('option');
            option1.value = 'Asset Management';
            option1.textContent = 'Asset Management';

            var option2 = document.createElement('option');
            option2.value = 'IT Asset Management';
            option2.textContent = 'IT Asset Management';

            var option3 = document.createElement('option');
            option3.value = 'ATK Management';
            option3.textContent = 'ATK Management';

            select.appendChild(optionDefault);
            select.appendChild(option1);
            select.appendChild(option2);
            select.appendChild(option3);

            var button = document.createElement('button');
            button.type = 'button';
            button.className = 'ml-2 bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded remove-access';
            button.textContent = 'Remove';

            div.appendChild(select);
            div.appendChild(button);
            container.appendChild(div);
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-access')) {
                e.target.parentElement.remove();
            }
        });
    </script>
</x-app-layout>