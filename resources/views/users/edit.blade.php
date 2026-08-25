<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')


                        <div class="grid grid-cols-1 gap-6 mt-4">
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="$user->name" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>


                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="$user->email" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="user_role_id" :value="__('Employee Role')" />
                                <select name="user_role_id" id="user_role_id" class="form-control" required>
                                    <option value="">Select Role</option>
                                    @foreach ($userRoles as $roles)
                                        @if ($roles->id == 1 && !auth()->user()->isAdmin())
                                            @continue
                                        @endif
                                        <option value="{{ $roles->id }}"
                                            {{ $user->user_role_id == $roles->id ? 'selected' : '' }}>
                                            {{ $roles->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('user_role_id')" class="mt-2" />
                            </div>


                            <div class="mb-6">
                                <x-input-label for="password" :value="__('New Password (leave blank to keep current)')" />
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>


                            <div class="flex items-center justify-between">
                                <a href="{{ route('users.index') }}"
                                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
