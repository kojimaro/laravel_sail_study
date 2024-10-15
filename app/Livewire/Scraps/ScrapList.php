<?php

namespace App\Livewire\Scraps;

use App\Models\Scrap;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class ScrapList extends Component
{
    use WithPagination;

    #[Title('スクラップ')]

    public Scrap $scrap;

    public function editScrap($id)
    {
        $this->scrap = Scrap::find($id);
    }

    public function deleteScrap($id)
    {
        $scrap = Scrap::find($id);
        $scrap->delete();
    }

    public function render()
    {
        return view('livewire.scraps.scrap-list', [
            'scraps' => Scrap::orderBy('id','desc')->paginate(4)
        ]);
    }
}
