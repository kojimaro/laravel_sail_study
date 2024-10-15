<?php

namespace App\Livewire\Scraps;

use Livewire\Component;
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
    }

    public function render()
    {
        return view('livewire.scraps.edit-scrap');
    }
}
