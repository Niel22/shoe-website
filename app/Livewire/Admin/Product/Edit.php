<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\productColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $categories;

    public Product $product;

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
        'image' => ['array', 'min:0'],
        'image.*' => ['extensions:jpg,png,jpeg'],
        'size' => [''],
        'type' => ['required'],
        'material' => ['required'],
        'style' => ['required'],
    ];

    public function mount(Product $product)
    {
        $this->categories = Category::select(['id', 'name'])->get();
        $product_color = $product->productColors->pluck('color_id')->toArray();
        $this->colors = Color::whereNotIn('id', $product_color)->select(['id', 'name'])->get();

        $this->category_id = $product->category_id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->small_description = $product->small_description;
        $this->status = $product->status;
        $this->trending = $product->trending;
        $this->quantity = $product->quantity;
        $this->selling_price = $product->selling_price;
        $this->original_price = $product->original_price;
        $this->type = $product->type;
        $this->material = $product->material;
        $this->style = $product->style;

    }

    public function deleteImage(ProductImage $singleImage)
    {

        if (File::exists('storage/uploads/products/' . $singleImage->image)) {

            File::delete('storage/uploads/products/' . $singleImage->image);
        }
        $singleImage->delete();
    }

    public function updateColorQuantity( $colorId, $newquantity){

        $color = Color::where('id', $colorId)->select(['id', 'name'])->first();
        $color->update([
            'quantity' => $newquantity,
        ]);

        session()->flash('message', 'Color quantity updated, navigate back to the section to continue');

    }

    public function deleteColor(productColor $color){
        $color->delete();

        $product_color = $this->product->productColors->pluck('color_id')->toArray();
        $this->colors = Color::whereNotIn('id', $product_color)->select(['id', 'name'])->get();

        session()->flash('message', 'Color deleted, navigate back to the section to continue');
    }

    public function deleteSize(ProductSize $size){
        $size->delete();


        session()->flash('message', 'Size deleted, navigate back to the section to continue');
    }

    public function update()
    {
        $updatedProduct = $this->validate();

        $updatedProduct['slug'] = Str::slug($updatedProduct['name']);

        $updatedProduct['trending'] = $this->trending ? 1 : 0;

        $updatedProduct['status'] = $this->status ? 1 : 0;

        $updatedProduct['meta_title'] = $this->name;

        $updatedProduct['meta_keyword'] = $this->name;

        $updatedProduct['meta_description'] = $this->description;

        $product = $this->product;


        if ($product) {

            if ($this->image) {

                $i = 1;

                foreach ($this->image as $image) {

                    $file = $image;

                    $fileName = time() . $i++ . '.' . $file->getClientOriginalExtension();

                    $file->storeAs('uploads/products/', $fileName, 'public');

                    $this->product->productImages()->create(['image' => $fileName]);
                }

            }

            if ($this->color) {
                foreach ($this->color as $color) {
                    $product->productColors()->create([
                        'color_id' => $color,
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

            $product->update($updatedProduct);

            session()->flash('message', 'Product Updated Successfuly');

            return $this->redirect(route('product.index'));

        } else {
            session()->flash('message', 'This Product has not being created');

            return $this->redirect(route('product.index'));
        }
    }

    public function render()
    {
        $this->categories = Category::select(['id', 'name'])->get();
        $product_color = $this->product->productColors->pluck('color_id')->toArray();
        $this->colors = Color::whereNotIn('id', $product_color)->select(['id', 'name'])->get();

        return view('livewire.admin.product.edit');
    }
}
