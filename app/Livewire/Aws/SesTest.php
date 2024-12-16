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
        $to = env('AWS_SES_TEST_ADDRESS');
        Mail::to($to)->send(new SendSesTest());
    }
}
