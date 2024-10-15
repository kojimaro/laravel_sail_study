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
    }

    public function render()
    {
        return view('livewire.scraps.create-scrap');
    }
}
