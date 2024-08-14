<?php

namespace App\Livewire\Admin\Color;

use App\Models\Color;
use Livewire\Component;

class Edit extends Component
{
    public $color;

    public $name;
    public $code;
    public $status;

    public function mount(Color $color){
        $this->name = $color->name;
        $this->code = $color->code;
        $this->status = $color->status;
    }

    protected $rules = [
        'name' => ['required', 'string'],
        'code' => ['required', 'string'],
    ];

    public function update(){
        $updatedColor = $this->validate();

        $updatedColor['status'] = $this->status ? 1 : 0;

        $this->color->update($updatedColor);

        session()->flash('message', 'Color updated Successfully');

        return $this->redirect(route('color.index'));
    }

    public function render()
    {
        return view('livewire.admin.color.edit');
    }
}
