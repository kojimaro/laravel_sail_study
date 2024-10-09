<?php

namespace App\Livewire\Scraps;

use App\Models\Scrap;
use Livewire\Component;
use Livewire\Attributes\On;

class ScrapList extends Component
{
    public $scraps;

    public function mount()
    {
        $this->getScraps();
    }

    #[On('scrap-created')]
    public function getScraps()
    {
        $this->scraps = Scrap::all();
    }

    public function render()
    {
        return view('livewire.scraps.scrap-list', [
            'scraps' => $this->scraps
        ]);
    }
}
