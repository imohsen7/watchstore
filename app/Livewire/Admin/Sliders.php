<?php

namespace App\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\Attributes\On; 

class Sliders extends Component
{
    protected $listeners = [
        'destroySlider',
        'refreshComponent' => '$refresh'
    ];

    #[On('delete-slider')] 
    public function deleteSlider($id)
    {
        $this->dispatch('deleteSlidernext',id:$id);

    }

    public function destroySlider($id) { 
        Slider::destroy($id);
        $this->dispatch('refreshComponent');
    }

    public function render()
    {
        $sliders = Slider::paginate(5);
        return view('livewire.admin.sliders',compact('sliders'));
    }
}
