<?php

namespace App\Livewire\Scraps;

use App\Models\Scrap;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

class ScrapList extends Component
{
    #[Title('スクラップ')]

    public $scraps;

    public Scrap $scrap;

    public function mount()
    {
        $this->getScraps();
    }

    #[On('scrap-created')]
    public function getScraps()
    {
        $this->scraps = Scrap::all();
    }

    public function editScrap($id)
    {
        $this->scrap = Scrap::find($id);
    }

    public function render()
    {
        return view('livewire.scraps.scrap-list', [
            'scraps' => $this->scraps
        ]);
    }
}
