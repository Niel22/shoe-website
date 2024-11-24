<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;

    public $category, $priceInput, $min_price, $max_price, $min_size, $max_size, $colorProduct = [];

    public $none;
    // protected $listeners = ['quick-view' => 'view'];


    public $rules = [
        'min_price' => ['integer'],
        'max_price' => ['integer'],
        'min_size' => ['integer'],
        'max_size' => ['integer'],
    ];

    public function mount($category){

        $this->category = $category;
    }

    public function resetFilter(){
        $this->reset('min_price');
        $this->reset('max_price');
    }

    public function resetSize(){
        $this->reset('min_size');
        $this->reset('max_size');
    }

    public function filter(){
        dd($this->validate());
    }

    public function fetchCategory($id){
        $this->category = Category::where('id', $id)->select(['id','name'])->first();
    }

    public function viewProduct($id){
        $product = Product::where('id', $id)->select(['id','slug'])->first();

        $category = Category::where('id', $this->category->id)->select(['id','slug'])->first();

        // dd($category);


        return $this->redirect($this->category->slug . '/'. $product->slug);

    }

    public function render()
    {
        $products = Product::with(['category', 'productImages', 'productColors'])
        ->where('category_id', $this->category->id)
        ->when($this->priceInput, function ($q) {
            $q->when($this->priceInput == 'high-to-low', function ($q2) {
                $q2->orderBy('selling_price', 'DESC');
            })
                ->when($this->priceInput == 'low-to-high', function ($q2) {
                    $q2->orderBy('selling_price', 'ASC');
                })
                ->when($this->priceInput == 'date-added', function ($q2) {
                    $q2->orderBy('created_at', 'DESC');
                });
        })
            ->when($this->min_price, function ($q) {
                $q->where('selling_price', '>=', $this->min_price);
            })
            ->when($this->max_price, function ($q) {
                $q->where('selling_price', '<=', $this->max_price);
            })
            ->when($this->min_size, function ($q) {
                $q->whereHas('productSizes', function ($query) {
                    $query->where('size', '>=', $this->min_size);
                });
            })
            ->when($this->max_size, function ($q) {
                $q->whereHas('productSizes', function ($query) {
                    $query->where('size', '<=', $this->max_size);
                });
            })->when($this->colorProduct, function ($q) {
                $q->whereHas('productColors', function ($query) {
                    $query->whereIn('color_id', $this->colorProduct);
                });
            })
            ->where('status', 1)
            ->select(['id', 'slug', 'name', 'selling_price', 'original_price', 'small_description', 'category_id', 'material', 'style', 'type'])
            ->paginate(8);


        $categories = Category::select(['id', 'name', 'slug'])->where('status', 1)->get();
        $colors = Color::select(['id', 'name', 'code'])->get();
        $this->none = "No Products Found";

        return view('livewire.frontend.product.index', compact('categories', 'colors'), [
            'products' => $products,
        ]);
    }
}
