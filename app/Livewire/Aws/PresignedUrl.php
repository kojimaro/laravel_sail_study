<?php

namespace App\Livewire\Aws;

use Livewire\Component;
use Aws\S3\S3Client;
use Aws\CloudFront\CloudFrontClient;
use Aws\Exception\AwsException;

class PresignedUrl extends Component
{
    public string $url;

    public function mount()
    {
        $this->signAPrivateDistribution();
    }

    public function render()
    {
        return view('livewire.aws.presigned-url');
    }

    private function signPrivateDistribution(
        $cloudFrontClient,
        $resourceKey,
        $expires,
        $privateKey,
        $keyPairId
    ) {
        try {
            $result = $cloudFrontClient->getSignedUrl([
                'url' => $resourceKey,
                'expires' => $expires,
                'private_key' => $privateKey,
                'key_pair_id' => $keyPairId
            ]);

            return $result;
        } catch (AwsException $e) {
            return 'Error: ' . $e->getAwsErrorMessage();
        }
    }

    private function signAPrivateDistribution()
    {
        $resourceKey = 'https://d147ogo90t1bjs.cloudfront.net/videos/1.mp4';
        $expires = time() + 300; // 5 minutes (5 * 60 seconds) from now.
        $privateKey = storage_path('/app/private/cloudfront') . '/private_key.pem';
        $keyPairId = 'K3FPAA5D47QJAJ';

        $cloudFrontClient = new CloudFrontClient([
            'region' => 'ap-northeast-1'
        ]);

        $this->url = $this->signPrivateDistribution(
            $cloudFrontClient,
            $resourceKey,
            $expires,
            $privateKey,
            $keyPairId
        );
    }
}
