<?php

namespace App\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    
    public $date, $status, $none = "No Order found";

    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'date' => ['date'],
        'status' => ['string']
    ];

    public function placeholder()
    {
        $name = "Orders";

        return  view('admin.placeholder.index-table', compact('name'));
    }

    public function filter(){
        $this->validate();
    }

    public function render()
    {
        $orders = Order::when($this->status, function($q){
                            $q->where('status_message', $this->status);
                        })
                        ->when($this->date, function($q){
                            $q->whereDate('created_at', $this->date);
                        })
                        ->orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.orders.index', compact('orders'));
    }
}
