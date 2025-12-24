<div class="w-full p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex justify-between items-center mt-8">
        <h1 class="text-2xl font-medium text-gray-900">
            {{ __('Role Management') }}
        </h1>
        <x-button wire:click="createRole">
            {{ __('Create Role') }}
        </x-button>
    </div>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        {{ __('Manage roles and assign permissions.') }}
    </p>

    <div class="mt-6 overflow-hidden border border-gray-300 rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-300 w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-300 border-r">{{ __('Name') }}</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-300 border-r">{{ __('Permissions') }}</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-300">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300">
                @foreach($roles as $role)
                    <tr class="hover:bg-blue-100 transition-colors duration-200 ease-in-out">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800 font-medium border-r border-gray-200">{{ $role->name }}</td>
                        <td class="px-6 py-4 text-center border-r border-gray-200">
                            <div class="flex flex-wrap gap-1 justify-center">
                                @forelse($role->permissions as $permission)
                                    <span class="px-2 w-auto inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 shadow-sm border border-green-200">
                                        {{ __($permission->name) }}
                                    </span>
                                @empty
                                    <span class="text-xs text-gray-400">{{ __('No permissions') }}</span>
                                @endforelse
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium">
                            <button wire:click="editRole({{ $role->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3 transition-transform hover:scale-125 font-bold" title="{{ __('Edit') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button wire:click="confirmRoleDeletion({{ $role->id }})" class="text-red-600 hover:text-red-900 transition-transform hover:scale-125 font-bold" title="{{ __('Delete') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </table>
    </div>

    <div class="mt-4">
        {{ $roles->links() }}
    </div>

    <!-- Role Modal -->
    <x-dialog-modal wire:model.live="managingRole">
        <x-slot name="title">
            {{ isset($state['id']) ? __('Edit Role') : __('Create Role') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-6 gap-6">
                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" />
                    <x-input-error for="state.name" class="mt-2" />
                </div>

                <!-- Permissions -->
                <div class="col-span-6">
                    <x-label value="{{ __('Permissions') }}" class="mb-2" />
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 bg-gray-50 p-4 rounded-lg">
                        @foreach($permissions as $permission)
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" wire:model.defer="state.permissions" value="{{ $permission->name }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                <span class="text-sm text-gray-700">{{ __($permission->name) }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('managingRole', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:click="saveRole" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Delete Role Confirmation Modal -->
    <x-confirmation-modal wire:model.live="confirmingRoleDeletion">
        <x-slot name="title">
            {{ __('Delete Role') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this role?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingRoleDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" wire:click="deleteRole" wire:loading.attr="disabled">
                {{ __('Delete Role') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
