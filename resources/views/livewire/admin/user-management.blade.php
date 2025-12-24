<div class="w-full p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex justify-between items-center mt-8">
        <h1 class="text-2xl font-medium text-gray-900">
            {{ __('User Management') }}
        </h1>
        <x-button wire:click="createUser">
            {{ __('Registrar Usuario') }}
        </x-button>
    </div>

    <p class="mt-6 text-gray-500 leading-relaxed">
        {{ __('Manage users and their roles.') }}
    </p>

    <div class="mt-6 overflow-hidden border border-gray-300 rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-300 w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-300 border-r">{{ __('Name') }}</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-300 border-r">{{ __('Email') }}</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-300 border-r">{{ __('Phone') }}</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-300 border-r">{{ __('Job Title') }}</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-300 border-r">{{ __('Role') }}</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-300">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300">
                @foreach($users as $user)
                    <tr class="hover:bg-blue-100 transition-colors duration-200 ease-in-out">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800 font-medium border-r border-gray-200">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-600 border-r border-gray-200">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-600 border-r border-gray-200">{{ $user->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-600 border-r border-gray-200">{{ $user->job_title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center border-r border-gray-200">
                            @foreach($user->roles as $role)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 shadow-sm border border-blue-200">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium">
                            <button wire:click="manageUser({{ $user->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3 transition-transform hover:scale-125 font-bold" title="{{ __('Edit') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            @if($user->id !== auth()->id())
                                <button wire:click="confirmUserDeletion({{ $user->id }})" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 transition-transform hover:scale-125 font-bold" title="{{ __('Delete') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

    <!-- User Modal -->
    <x-dialog-modal wire:model.live="managingUser">
        <x-slot name="title">
            {{ isset($state['id']) ? __('Manage Account') : __('Registrar Usuario') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-6 gap-6">
                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
                    <x-input-error for="state.name" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
                    <x-input-error for="state.email" class="mt-2" />
                </div>

                <!-- Phone -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="phone" value="{{ __('Phone') }}" />
                    <x-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="state.phone" />
                    <x-input-error for="state.phone" class="mt-2" />
                </div>

                <!-- Job Title -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="job_title" value="{{ __('Job Title') }}" />
                    <x-input id="job_title" type="text" class="mt-1 block w-full" wire:model.defer="state.job_title" />
                    <x-input-error for="state.job_title" class="mt-2" />
                </div>

                <!-- Role -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="role" value="{{ __('Role') }}" />
                    <select id="role" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model.defer="state.role">
                        <option value="">{{ __('Select Role') }}</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="state.role" class="mt-2" />
                </div>

                @if(!isset($state['id']))
                    <!-- Password -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
                        <x-input-error for="state.password" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                        <x-input-error for="state.password_confirmation" class="mt-2" />
                    </div>
                @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('managingUser', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:click="saveUser" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Delete User Confirmation Modal -->
    <x-confirmation-modal wire:model.live="confirmingUserDeletion">
        <x-slot name="title">
            {{ __('Delete User') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this user?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingUserDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                {{ __('Delete User') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
