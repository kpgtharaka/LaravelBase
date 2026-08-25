<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <p
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    {{ $user->name }}
                                </p>
                            </div>


                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <p
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    {{ $user->email }}
                                </p>
                            </div>


                            <div>
                                <x-input-label for="created_at" :value="__('Registered Date')" />
                                <p
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    {{ $user->created_at->format('F j, Y g:i A') }}
                                </p>
                            </div>
                        </div>


                        <div class="space-y-6">
                            <div>
                                <x-input-label for="updated_at" :value="__('Last Updated')" />
                                <p
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    {{ $user->updated_at->format('F j, Y g:i A') }}
                                </p>
                            </div>


                            @if ($user->email_verified_at)
                                <div>
                                    <x-input-label for="verified" :value="__('Email Verified')" />
                                    <p
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        {{ $user->email_verified_at->format('F j, Y g:i A') }}
                                    </p>
                                </div>
                            @endif

                            <div>
                                <x-input-label :value="__('Role')" />
                                <p class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    {{ $user->role->name }}
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="flex items-center justify-end mt-6 space-x-3">
                        <a href="{{ route('users.index') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Back to List') }}
                        </a>

                        <a href="{{ route('users.edit', $user->id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Edit User') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
