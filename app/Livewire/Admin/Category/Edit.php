<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;

    public $category;

    public $name, $description, $meta_title, $meta_keyword, $status, $meta_description, $slug;

    protected $rules = [
        'name' => ['required', 'string'],
        'description' => ['required'],
        'meta_title' => ['required', 'string'],
        'meta_keyword' => ['required', 'string'],
        'meta_description' => ['required', 'string'],
    ];

    public function mount($category)
    {
        // dd($category);
        $this->name = $category->name;
        $this->description = $category->description;
        $this->meta_title = $category->meta_title;
        $this->meta_keyword = $category->meta_keyword;
        $this->status = $category->status;
        $this->meta_description = $category->meta_description;
        $this->slug = $category->slug;
    }

    public function update()
    {
        $category = $this->validate();

        $category['slug'] = Str::slug($category['name']);

        $category['status'] = $this->status == true ? 1 : 0;



        $this->category->update($category);

        session()->flash('success', 'Category Updated Successfully');

        return $this->redirect(route('category.index'));
    }

    public function render()
    {
        return view('livewire.admin.category.edit');
    }
}
