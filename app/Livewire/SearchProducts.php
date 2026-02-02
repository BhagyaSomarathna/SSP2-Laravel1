<?php

namespace Apps\Livewire; // matches your folder "apps/livewire"

use Livewire\Component;
use App\Models\item;

class SearchProducts extends Component
{
    public $query = '';

    public function render()
    {
        $products = [];

        if ($this->query !== '') {
            $products = item::where('name', 'like', '%' . $this->query . '%')->get();
        }

        return view('livewire.search-products', compact('products'));
    }
}
