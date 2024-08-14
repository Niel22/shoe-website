<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Color;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    // public $categories;

    public $colors;

    public $category_id;
    public $name;
    public $small_description;
    public $description;
    public $original_price;
    public $selling_price;
    public $quantity;
    public $trending;
    public $status;
    public $meta_title;
    public $meta_keyword;
    public $meta_description;
    public $image = [];
    public $color = [];
    public $size = [];
    public $type;
    public $material;
    public $style;

    protected $rules = [
        'category_id' => ['required', 'integer'],
        'name' => ['required', 'string'],
        'small_description' => ['required', 'string'],
        'description' => ['required', 'string'],
        'original_price' => ['required', 'integer'],
        'selling_price' => ['required', 'integer'],
        'quantity' => ['required', 'integer'],
        'image' => ['required', 'array', 'min:2'],
        'image.*' => ['required','extensions:jpg,png,jpeg,jfif'],
        'color' => ['required'],
        'size' => ['required'],
        'type' => ['required'],
        'material' => ['required'],
        'style' => ['required'],
    ];



    public function store(){
        $newproduct = $this->validate();



        $category = Category::findOrFail($newproduct['category_id']);


        $newproduct['slug'] = Str::slug($newproduct['name']);

        $newproduct['trending'] = $this->trending ? 1 : 0;

        $newproduct['status'] = $this->status ? 1 : 0;

        $newproduct['meta_title'] = $this->name;

        $newproduct['meta_keyword'] = $this->name;

        $newproduct['meta_description'] = $this->description;




        $product = $category->products()->create($newproduct);

        if($this->image){
            $i = 1;
            foreach($this->image as $image){
                $file = $image;

                $fileName = time() . $i++ . '.' . $file->getClientOriginalExtension();

                $file->storeAs('uploads/products/', $fileName, 'public');

                $product->productImages()->create(['image' => $fileName]);

            }
        }

        if ($this->color) {
            foreach ($this->color as $color) {
                $product->productColors()->create([
                    'color_id' => $color
                ]);
            }
        }

        if ($this->size) {
            foreach ($this->size as $size) {
                $product->productSizes()->create([
                    'size' => $size
                ]);
            }
        }

        session()->flash('message', 'Product Added Successfully');

        return $this->redirect(route('product.index'));


    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.product.create', compact('categories'));
    }
}
