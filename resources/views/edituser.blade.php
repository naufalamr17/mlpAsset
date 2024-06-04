<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
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

                    <form method="POST" action="{{ route('update_user', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-6">
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="status" :value="__('Status')" />
                                    <select id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="status" required>
                                        <option value="" disabled>Select Status</option>
                                        <option value="Administrator" {{ $user->status == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                        <option value="Admin" {{ $user->status == 'Admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="Modified" {{ $user->status == 'Modified' ? 'selected' : '' }}>Modified</option>
                                        <option value="Viewers" {{ $user->status == 'Viewers' ? 'selected' : '' }}>Viewers</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
                                    <small class="text-gray-600">Leave blank to keep current password</small>
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
                                    @foreach($user->accesses as $access)
                                    <?php
                                    // dd($user->accesses);
                                    $accessName = $access['access'];
                                    // dump($accessName);
                                    ?>
                                    <div class="flex items-center">
                                        <select name="access[]" class="block mt-1 mr-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                            <option value="" disabled>Select Access</option>
                                            <option value="Asset Management" {{ $accessName == 'Asset Management' ? 'selected' : '' }}>Asset Management</option>
                                            <option value="IT Asset Management" {{ $accessName == 'IT Asset Management' ? 'selected' : '' }}>IT Asset Management</option>
                                            <option value="ATK Management" {{ $accessName == 'ATK Management' ? 'selected' : '' }}>ATK Management</option>
                                        </select>
                                        <button type="button" class="ml-2 bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded remove-access">Remove</button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <x-primary-button class="w-1/3 flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Update User') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('add-access').addEventListener('click', function() {
            const container = document.getElementById('access-container');
            const newAccess = document.createElement('div');
            newAccess.classList.add('flex', 'items-center', 'mt-2');
            newAccess.innerHTML = `
                <select name="access[]" class="block mt-1 mr-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    <option value="" disabled selected>Select Access</option>
                    <option value="Asset Management">Asset Management</option>
                    <option value="IT Asset Management">IT Asset Management</option>
                    <option value="ATK Management">ATK Management</option>
                </select>
                <button type="button" class="ml-2 bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded remove-access">Remove</button>
            `;
            container.appendChild(newAccess);

            newAccess.querySelector('.remove-access').addEventListener('click', function() {
                container.removeChild(newAccess);
            });
        });

        document.querySelectorAll('.remove-access').forEach(button => {
            button.addEventListener('click', function() {
                this.parentElement.remove();
            });
        });
    </script>
</x-app-layout>