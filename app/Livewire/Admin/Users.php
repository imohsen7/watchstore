<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Enums\UserStatus;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    protected $paginationTheme='bootstrap';

    public function changeUserStatus($id) { 

        $user = User::query()->find($id);
        if ($user->status == UserStatus::Active->value  ) { 
            $user->update([
                'status' => UserStatus::InActive->value
            ]);
        }else{ 
            $user->update([
                'status' => UserStatus::Active->value
            ]);
        }

    }

    public function render()
    {
        $users = User::paginate(2);
        return view('livewire.admin.users',compact('users'));
    }
}
