<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Hash;

use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    // public $users; // Removed to use pagination in render
    public $roles;

    public $confirmingUserDeletion = false;
    public $managingUser = false;
    public $userIdBeingDeleted;

    public $state = [];

    public function mount()
    {
        $this->roles = Role::all();
    }

    // loadData removed, pagination handles reloading

    public function confirmUserDeletion($userId)
    {
        $this->confirmingUserDeletion = true;
        $this->userIdBeingDeleted = $userId;
    }

    public function deleteUser()
    {
        $user = User::find($this->userIdBeingDeleted);

        if ($user) {
            $user->delete();
            // $this->loadData(); // No need to reload manually
            $this->confirmingUserDeletion = false;
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => __('User deleted successfully.'),
                'timer' => 3000,
                'showConfirmButton' => false,
            ]);
        }
    }

    public function createUser()
    {
        $this->managingUser = true;
        $this->resetErrorBag();
        $this->state = [
            'name' => '',
            'email' => '',
            'phone' => '',
            'job_title' => '',
            'role' => '',
            'password' => '',
            'password_confirmation' => '',
        ];
    }

    public function manageUser($userId)
    {
        $this->managingUser = true;
        $this->resetErrorBag();
        $user = User::with('roles')->find($userId);
        
        $this->state = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'job_title' => $user->job_title,
            'role' => $user->roles->first() ? $user->roles->first()->name : '',
        ];
    }

    public function saveUser()
    {
        $rules = [
            'state.name' => 'required|string|max:255',
            'state.email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->state['id'] ?? null)],
            'state.phone' => 'nullable|string|max:20',
            'state.job_title' => 'nullable|string|max:100',
            'state.role' => 'required|exists:roles,name',
        ];

        if (!isset($this->state['id'])) {
            $rules['state.password'] = 'required|confirmed|min:8';
        }

        $this->validate($rules);

        if (isset($this->state['id'])) {
            $user = User::find($this->state['id']);
            $user->update([
                'name' => $this->state['name'],
                'email' => $this->state['email'],
                'phone' => $this->state['phone'],
                'job_title' => $this->state['job_title'],
            ]);
            $message = __('User updated successfully.');
        } else {
            $user = User::create([
                'name' => $this->state['name'],
                'email' => $this->state['email'],
                'phone' => $this->state['phone'],
                'job_title' => $this->state['job_title'],
                'password' => Hash::make($this->state['password']),
            ]);
            $message = __('User created successfully.');
        }

        $user->syncRoles($this->state['role']);

        // $this->loadData(); // Pagination auto-updates
        $this->managingUser = false;
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => $message,
            'timer' => 3000,
            'showConfirmButton' => false,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.user-management', [
            'users' => User::with('roles')->paginate(5)
        ])->layout('layouts.app');
    }
}
