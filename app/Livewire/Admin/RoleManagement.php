<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

use Livewire\WithPagination;

class RoleManagement extends Component
{
    use WithPagination;

    // public $roles; // Removed to use pagination in render
    public $permissions;
    public $permissions_by_group = [];

    public $confirmingRoleDeletion = false;
    public $managingRole = false;
    public $roleIdBeingDeleted;

    public $state = [
        'name' => '',
        'permissions' => [],
    ];

    public function mount()
    {
        // $this->loadData();
        $this->permissions = Permission::all();
    }

    // loadData removed

    public function createRole()
    {
        $this->resetErrorBag();
        $this->state = [
            'name' => '',
            'permissions' => [],
        ];
        $this->managingRole = true;
    }

    public function editRole($roleId)
    {
        $this->resetErrorBag();
        $role = Role::with('permissions')->find($roleId);
        $this->state = [
            'id' => $role->id,
            'name' => $role->name,
            'permissions' => $role->permissions->pluck('name')->map(fn($val) => (string)$val)->toArray(),
        ];
        $this->managingRole = true;
    }

    public function saveRole()
    {
        $rules = [
            'state.name' => ['required', 'string', 'max:255', Rule::unique('roles', 'name')->ignore($this->state['id'] ?? null)],
            'state.permissions' => 'array',
        ];

        $this->validate($rules);

        if (isset($this->state['id'])) {
            $role = Role::find($this->state['id']);
            $role->update(['name' => $this->state['name']]);
            $message = __('Role updated successfully.');
        } else {
            $role = Role::create(['name' => $this->state['name']]);
            $message = __('Role created successfully.');
        }

        $role->syncPermissions($this->state['permissions']);

        // $this->loadData();
        $this->managingRole = false;
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => $message,
            'timer' => 3000,
            'showConfirmButton' => false,
        ]);
    }

    public function confirmRoleDeletion($roleId)
    {
        $this->confirmingRoleDeletion = true;
        $this->roleIdBeingDeleted = $roleId;
    }

    public function deleteRole()
    {
        $role = Role::find($this->roleIdBeingDeleted);

        if ($role) {
            $role->delete();
            // $this->loadData();
            $this->confirmingRoleDeletion = false;
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => __('Role deleted successfully.'),
                'timer' => 3000,
                'showConfirmButton' => false,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.role-management', [
            'roles' => Role::with('permissions')->paginate(5)
        ])->layout('layouts.app');
    }
}
