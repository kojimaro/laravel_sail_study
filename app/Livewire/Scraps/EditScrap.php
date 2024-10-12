<?php

namespace App\Livewire\Scraps;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Scrap;
use App\Livewire\Forms\ScrapForm;

class EditScrap extends Component
{
    public ScrapForm $form;

    public function mount(Scrap $scrap)
    {
        $this->form->setScrap($scrap);
    }

    public function save()
    {
        $this->form->update();
        // 上部に#[On('scrap-created')]が付与されている別コンポーネントのイベント呼び出す
        $this->dispatch('scrap-created');
    }

    public function render()
    {
        return view('livewire.scraps.edit-scrap');
    }
}
