<?php

namespace App\Livewire\Scraps;

use App\Livewire\Forms\ScrapForm;
use Livewire\Component;

class CreateScrap extends Component
{
    public ScrapForm $form;

    public function save()
    {
        $this->validate();

        $this->form->store();

        // 上部に#[On('scrap-created')]が付与されている別コンポーネントのイベント呼び出す
        $this->dispatch('scrap-created');
    }

    public function render()
    {
        return view('livewire.scraps.create-scrap');
    }
}
