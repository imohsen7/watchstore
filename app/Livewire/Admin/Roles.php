<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';

    public function render()
    {
        $roles = Role::paginate(5);
        return view('livewire.admin.roles',compact('roles'));
    }
}
