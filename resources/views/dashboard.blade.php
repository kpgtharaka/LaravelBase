<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-2">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 mx-3 px-2 md:px-0 mb-6">
                    {{ __("You're logged in!") }}
                    <p>
                        @admin
                            Administrator
                        @endadmin
                    </p>
                    {{-- Users Card --}}
                    <a href="{{ route('users.index') }}"
                        class="block p-6 bg-yellow-100 border border-gray-200 rounded-lg shadow hover:bg-yellow-200">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Users Module</h5>
                        <p class="font-normal text-gray-700">Manage user accounts and permissions.</p>
                    </a>

                    {{-- User Roles Card --}}
                    <a href="{{ route('user_role.index') }}"
                        class="block p-6 bg-yellow-100 border border-gray-200 rounded-lg shadow hover:bg-yellow-200">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Users Roles Module</h5>
                        <p class="font-normal text-gray-700">Manage user roles.</p>
                    </a>

                    {{-- Activity Log Card --}}
                    <a href="{{ route('activity_log.index') }}"
                        class="block p-6 bg-yellow-100 border border-gray-200 rounded-lg shadow hover:bg-yellow-200">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Activity Log Module</h5>
                        <p class="font-normal text-gray-700">View Activity Logs.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
