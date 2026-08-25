<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Role Details') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Role Information</h3>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            {{ __('Name') }}
                        </label>
                        <div id="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                            {{ $userRole->name }}
                        </div>
                    </div>


                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                            {{ __('Description') }}
                        </label>
                        <div id="description"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                            {{ $userRole->description }}
                        </div>
                    </div>


                    <div class="flex items-center justify-start space-x-2">
                        <a href="{{ route('user_role.index') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('Back to List') }}
                        </a>
                        {{-- <a href="{{ route('user_role.edit', $userRole->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a> --}}
                        {{-- Conditionally show Delete button --}}
                        @if ($userRole->users->isEmpty())
                            <form action="{{ route('user_role.destroy', $userRole->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this role?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Users List --}}
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Users in this Role</h3>
                        @if ($userRole->users->isNotEmpty())
                            {{-- Use grid layout similar to user index --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
                                @foreach ($userRole->users as $user)
                                    <table class="table-auto min-w-full">
                                        <tr>
                                            <td class="w-20 min-w-20">
                                                <div class="grid grid-cols-2">
                                                    <div>
                                                        <a href="{{ route('users.edit', $user->id) }}" class="w-6">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                            </svg>

                                                        </a>
                                                    </div>
                                                    <div>
                                                        <form action="{{ route('users.destroy', $user) }}"
                                                            method="POST" id="deleteForm{{ $user->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="text-red-800"
                                                                onclick="confirmDelete({{ $user->id }})"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="size-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>

                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $user->created_at->format('M d, Y') }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">No users are currently assigned to this role.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Add script section for confirmDelete if not already in app layout --}}
    @push('scripts')
        <script>
            function confirmDelete(userId) {
                if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                    document.getElementById('deleteForm' + userId).submit();
                }
            }
        </script>
    @endpush
</x-app-layout>
