<?php

namespace App\Livewire\Admin\Category;

// use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $name = "", $description = "", $status = "", $slug = "";

    protected $rules = [
        'name' => ['required', 'string'],
        'description' => ['required'],
    ];


    public function store()
    {
        $category = $this->validate();

        $category['slug'] = Str::slug($category['name']);

        $category['status'] = $this->status == true ? 1 : 0;

        $category['meta_title'] = $this->name;

        $category['meta_keyword'] = $this->name;

        $category['meta_description'] = $this->description;



        Category::create($category);

        session()->flash('success', 'Category Added Successfully');

        return $this->redirect(route('category.index'));
    }


    public function render()
    {
        return view('livewire.admin.category.create');
    }
}
