<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Scrap;

class ScrapForm extends Form
{
    public ?Scrap $scrap;

    #[Validate('required')]
    public $body = '';

    public function setScrap(Scrap $scrap)
    {
        $this->scrap = $scrap;
        $this->body  = $scrap->body;
    }

    public function store()
    {
        $this->validate();

        Scrap::create($this->all());

        $this->reset('body');
    }

    public function update()
    {
        $this->validate();

        $this->scrap->update($this->all());
    }
}
