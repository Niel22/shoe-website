<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $product;

    public $none = "";

    protected $paginationTheme = 'tailwind';

    public function placeholder()
    {
        $name = "Products";

        return  view('admin.placeholder.index-table', compact('name'));
    }

    public function deleteProduct(Product $product){
        $this->product = $product;

    }

    public function destroy(){

        $images = $this->product->productImages;


        foreach($images as $image){
            $path = 'storage/uploads/products/'. $image->image;

            if(File::exists($path)){
                File::delete($path);
            }
        }

        $this->product->delete();

        session()->flash('message', 'Product deleted');

        $this->dispatch('close-modal');

    }

    public function updateStatus($id){
        $product = Product::where('id', $id)->select(['id', 'status'])->first();

        $product->update([
            'status' => !$product->status,
        ]);
    }

    public function render()
    {
        $products = Product::with('category')->select(['id', 'category_id', 'name', 'selling_price', 'quantity', 'status'])->orderBy('id', 'DESC')->paginate(10);

        $this->none = "No Product Added Yet";

        return view('livewire.admin.product.index', compact('products'));
    }
}
