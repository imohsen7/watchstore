<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\On; 

class Categories extends Component
{

    protected $listeners = [
        'destroyCategory',
        'refreshComponent' => '$refresh'
    ];

    #[On('delete-category')] 
    public function deleteCategory($id)
    {
        $this->dispatch('deleteCategorynext',id:$id);

    }

    public function destroyCategory($id) { 
        Category::destroy($id);
        $this->dispatch('refreshComponent');
    }
    
    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.admin.categories',compact('categories'));
    }
}
