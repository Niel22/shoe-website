<?php

namespace App\Livewire\Frontend\Profile;

use Livewire\Component;

class TrackOrder extends Component
{

    public $order;

    public function render()
    {
        return view('livewire.frontend.profile.track-order', [
            'order' => $this->order
        ]);
    }
}
