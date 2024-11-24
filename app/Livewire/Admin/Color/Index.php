<?php

namespace App\Livewire\Admin\Color;

use App\Models\Color;
use Livewire\Component;
use SebastianBergmann\CodeCoverage\Report\Html\Colors;

class Index extends Component
{
    public $color;

    public $none;

    public function deleteColor(Color $color){

        $this->color = $color;

    }

    public function destroy(){
        $this->color->delete();

        session()->flash('message', 'Color deleted');

        $this->dispatch('close-modal');
    }

    public function placeholder()
    {
        $name = "Colors";

        return  view('admin.placeholder.index-table', compact('name'));
    }

    public function render()
    {
        $colors = Color::select(['id', 'name'])->get();
        
        $this->none = 'No colors added';

        return view('livewire.admin.color.index', compact('colors'));
    }
}
