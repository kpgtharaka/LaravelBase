<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Roles') }}
            </h2>
            <a href="{{ route('user_role.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3 md:mb-0">
                Create New Role
            </a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col md:flex-row justify-end items-center mb-4">
                        <form action="{{ route('user_role.index') }}" method="GET" class="w-full md:w-auto">
                            <div class="flex items-center">
                                <input type="text"
                                    class="border border-gray-300 px-3 py-2 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 w-full md:w-auto"
                                    placeholder="Search by name" name="q" value="{{ request('q') }}">
                                <button
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r-md"
                                    type="submit">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                    @if($userRoles->isEmpty())
                            <p class="text-center text-gray-500 col-span-full">No user roles found.</p>
                    @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($userRoles as $role)
                             {{-- @if($role->id!=1) --}}
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $role->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap"><a href="{{ route('user_role.show', $role) }}">{{ $role->name }}</a></td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $role->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            
                                            <a href="{{ route('user_role.edit', $role) }}"
                                                class="w-6"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg></a>
                                            {{-- <form action="{{ route('user_role.destroy', $role) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                                {{-- @endif --}}
                            @endforeach                            
                        </tbody>
                    </table>
                    @endif
                    <div class="mt-4">
                        {{ $userRoles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
