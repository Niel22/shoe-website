<?php

namespace App\Livewire\Admin\Color;

use App\Models\Color;
use Livewire\Component;

class Create extends Component
{

    public $name;
    public $code;
    public $status;

    protected $rules = [
        'name' => ['required', 'string'],
        'code' => ['required', 'string'],
    ];



    public function store(){
        $color = $this->validate();
        $color['status'] = $this->status ? 1 : 0;

        Color::create($color);

        session()->flash('message', 'Color Added Successfully');

        return $this->redirect(route('color.index'));
    }

    public function render()
    {
        return view('livewire.admin.color.create');
    }
}
