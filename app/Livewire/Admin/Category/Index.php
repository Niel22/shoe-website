<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $category;

    public $none = "";

    protected $paginationTheme = 'tailwind';

    public function deleteCategory($id){
        $category = Category::where('id', $id)->select(['id', 'name'])->first();
        $this->category = $category;
    }

    public function destroy()
    {

        // dd($this->category);
        if ($this->category->image) {
            $path = 'uploads/category/' . $this->category->image;

            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $this->category->delete();

        session()->flash('message', 'Category deleted');

        $this->dispatch('close-modal');
    }

    public function updateStatus($id){
        $category = Category::where('id', $id)->select(['id', 'status'])->first();

        $category->update([
            'status' => !$category->status,
        ]);
    }

    public function placeholder()
    {
        $name = "Categories";

        return  view('admin.placeholder.index-table', compact('name'));
    }

    public function render()
    {
        $categories = Category::select(['id', 'name', 'status'])->orderBy('id', 'DESC')->paginate(10);

        $this->none = "No Categories Added Yet";

        return view('livewire.admin.category.index', compact('categories'));
    }
}
