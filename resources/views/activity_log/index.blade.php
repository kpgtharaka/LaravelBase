<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Activity Log') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
<div class="flex w-full justify-end">
                    <button onclick="document.getElementById('filter-panel').classList.toggle('hidden')"
                        class="bg-blue-600 text-white px-4 py-2 rounded right-0">
                        <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25" />
                        </svg>
                    </button>
                </div>

                <div id="filter-panel" class="bg-white overflow-x-visible shadow-sm sm:rounded-lg hidden mt-6 ">
                    <div class="p-6 text-gray-900">
                        <div class="text-right">
                            <!-- 1. Filter Form -->
                            <form action="{{ request()->url() }}" method="GET"
                                class="bg-white p-4 rounded-lg shadow mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">

                                <!-- Filter by Module -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Module</label>
                                    <select name="module" class="w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">All Modules</option>
                                        <option value="Employee Management"
                                            {{ request('module') == 'Employee Management' ? 'selected' : '' }}>Employee
                                            Management</option>
                                        <option value="Employee Role Management"
                                            {{ request('module') == 'Employee Role Management' ? 'selected' : '' }}>
                                            Employee
                                            Role Management</option>
                                        <option value="Computer Management"
                                            {{ request('module') == 'Computer Management' ? 'selected' : '' }}>Computer
                                            Management</option>
                                        <option value="Computer Assignment Management"
                                            {{ request('module') == 'Computer Assignment Management' ? 'selected' : '' }}>
                                            Computer
                                            Assignment Management</option>
                                        <option value="Peripherals Management"
                                            {{ request('module') == 'Peripherals Management' ? 'selected' : '' }}>
                                            Peripherals Management</option>
                                        <option value="Peripherals Assignment Management"
                                            {{ request('module') == 'Peripherals Assignment Management' ? 'selected' : '' }}>
                                            Peripherals Assignment Management</option>
                                        <option value="Task Management"
                                            {{ request('module') == 'Task Management' ? 'selected' : '' }}>Task
                                            Management
                                        </option>
                                        <option value="Note Management"
                                            {{ request('module') == 'Note Management' ? 'selected' : '' }}>Note
                                            Management
                                        </option>
                                        <option value="User Management"
                                            {{ request('module') == 'User Management' ? 'selected' : '' }}>User
                                            Management
                                        </option>
                                        <!-- Add other log names here -->
                                    </select>
                                </div>

                                <!-- Filter by Action -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Action</label>
                                    <select name="action" class="w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">All Actions</option>
                                        <option value="created" {{ request('action') == 'created' ? 'selected' : '' }}>
                                            Created</option>
                                        <option value="updated" {{ request('action') == 'updated' ? 'selected' : '' }}>
                                            Updated</option>
                                        <option value="deleted" {{ request('action') == 'deleted' ? 'selected' : '' }}>
                                            Deleted</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Search by User</label>
                                    <select name="user_id" class="w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">All Users</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ request('user_id') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Search Data Keyword -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Search Data
                                        Changes</label>
                                    <input type="text" name="search_data" value="{{ request('search_data') }}"
                                        placeholder="e.g. john@company.com"
                                        class="w-full border-gray-300 rounded-md shadow-sm">
                                </div>

                                <!-- Actions Buttons -->
                                <div class="flex items-end space-x-2">
                                    <button type="submit"
                                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 shadow-sm w-full">Filter</button>
                                    <a href="{{ request()->url() }}"
                                        class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 text-center w-full">Reset</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                

                <div class="bg-white overflow-x-visible shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900"></div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date</th>
                                <th
                                    class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Module</th>
                                <th
                                    class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                                <th
                                    class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    User</th>
                                <th
                                    class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Component</th>
                                <th
                                    class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Data Changes</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($logs as $log)
                                <tr>
                                    <td class="px-3 py-4 whitespace-wrap min-w-40 w-[300px] max-w-[15vw]">
                                        <div class="flex justify-center">
                                            <span x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                                                x-on:mouseleave="tooltip = false" class="relative cursor-pointer">
                                                {{ $log->created_at->format('Y-m-d H:i:s') }}
                                                <!-- Tooltip Box -->
                                                <div x-show="tooltip" x-transition
                                                    class=" inline-block font-medium rounded-base shadow-xs tooltip absolute top-full mt-2  text-center transform -translate-x-1/2 text-xs rounded py-1 px-2 whitespace-normal break-words z-10  bg-gray-200 text-gray-700">
                                                    @if ($log->properties->has('attributes') || $log->properties->has('old'))
                                                        <pre><code>{{ json_encode($log->properties, JSON_PRETTY_PRINT) }}</code></pre>
                                                    @elseif($log->attribute_changes != '[]')
                                                        {{ $log->attribute_changes }}<br />
                                                    @endif

                                                    @if ($log->properties->has('properties') || $log->properties->has('old'))
                                                        <pre><code>{{ json_encode($log->properties, JSON_PRETTY_PRINT) }}</code></pre>
                                                    @elseif($log->properties != '[]')
                                                        {{ $log->properties }}
                                                    @endif
                                                </div>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap"><a
                                            href="{{ request()->url() }}?module={{ $log->log_name }}"><span
                                                class="badge">{{ $log->log_name }}</span></a></td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        <strong>{{ strtoupper($log->description) }}</strong>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap"><a
                                            href="{{ request()->url() }}?user_id={{ $log->causer_id }}">{{ $log->causer->name ?? 'System/Automated' }}</a>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">{{ $log->subject_id ?? 'N/A' }}</td>
                                    <td class="px-3 py-4 whitespace-wrap">
                                        <div style="/*overflow-x: scroll; width:300px;*/">
                                            <!-- Displaying the old vs new JSON attributes beautifully -->
                                            @if ($log->properties->has('attributes') || $log->properties->has('old'))
                                                <pre><code>{{ json_encode($log->properties, JSON_PRETTY_PRINT) }}</code></pre>
                                            @elseif($log->attribute_changes != '[]')
                                                <button command="show-modal" commandfor="dialog"
                                                    onclick="loaddata({{ $log->attribute_changes }})">View
                                                    Attributes</button><br />
                                            @endif

                                            @if ($log->properties->has('properties') || $log->properties->has('old'))
                                                <pre><code>{{ json_encode($log->properties, JSON_PRETTY_PRINT) }}</code></pre>
                                            @elseif($log->properties != '[]')
                                                <button command="show-modal" commandfor="dialog"
                                                    onclick="loaddata({{ $log->properties }})">View Properties</button>
                                            @endif
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="p-6">
                        {{ $logs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <el-dialog>
        <dialog id="dialog" aria-labelledby="dialog-title"
            class="fixed inset-0 size-auto max-h-none max-w-none min-w-80 overflow-y-auto bg-transparent backdrop:bg-transparent">
            <el-dialog-backdrop
                class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in dark:bg-gray-900/50"></el-dialog-backdrop>

            <div tabindex="0"
                class="rounded flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                <el-dialog-panel
                    class="relative transform overflow-hidden rounded-lg bg-gray-900 text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95 dark:bg-gray-800 dark:outline dark:-outline-offset-1 dark:outline-white/10">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 dark:bg-gray-800">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10 dark:bg-red-500/10">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true"
                                    class="size-6 text-red-600 dark:text-red-400">
                                    <path
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 id="dialog-title" class="text-base font-semibold text-gray-900 dark:text-white">
                                    Detailed Log</h3>
                                <div class="mt-2">
                                    <div id="modalProperties"
                                        class="text-sm text-gray-500 dark:text-gray-400 text-left"
                                        style="overflow-x: scroll;width:400px">[Data]</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 dark:bg-gray-700/25">
                        {{-- <button type="button" command="close" commandfor="dialog" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto dark:bg-red-500 dark:shadow-none dark:hover:bg-red-400">Deactivate</button> --}}
                        <button type="button" command="close" commandfor="dialog"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto dark:bg-white/10 dark:text-white dark:shadow-none dark:inset-ring-white/5 dark:hover:bg-white/20">Close</button>
                    </div>
                </el-dialog-panel>
            </div>
        </dialog>
    </el-dialog>


    <script>
        function loaddata($data) {
            document.getElementById("modalProperties").textContent = "Not Loaded Data!";
            document.getElementById("modalProperties").textContent = JSON.stringify($data);
        }
    </script>
</x-app-layout>
