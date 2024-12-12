<?php

namespace App\Livewire\Aws;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class S3IamRoleTest extends Component
{
    public function render()
    {
        $contents = Storage::disk('s3')->get('sample.txt');
        dump($contents);

        return view('livewire.aws.s3-iam-role-test');
    }
}
