<?php

namespace App\Livewire\Aws;

use Livewire\Component;
use App\Mail\SendSesTest;
use Illuminate\Support\Facades\Mail;

class SesTest extends Component
{
    public function render()
    {
        return view('livewire.aws.ses-test');
    }

    public function handlePost()
    {
        Mail::to('hsiiq96173@yahoo.co.jp')->send(new SendSesTest());
    }
}
