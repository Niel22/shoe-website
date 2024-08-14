<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $none = "No Users";

    protected $paginationTheme = 'tailwind';

    public function placeholder()
    {
        $name = "Products";

        return  view('admin.placeholder.index-table', compact('name'));
    }

    public function render()
    {
        $users = User::paginate(8);
        return view('livewire.admin.users.index', compact('users'));
    }
}
