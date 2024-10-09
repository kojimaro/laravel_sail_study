<?php

namespace App\Livewire\Scraps;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Models\Scrap;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

class CreateScrap extends Component
{
    #[Title('スクラップ')]

    #[Validate('required')]
    public $body;

    public function save()
    {
        $this->validate();

        Scrap::create(
            $this->only(['body'])
        );

        $this->reset();

        // 上部に#[On('scrap-created')]が付与されている別コンポーネントのイベント呼び出す
        $this->dispatch('scrap-created');
    }

    public function render()
    {
        return view('livewire.scraps.create-scrap');
    }
}
