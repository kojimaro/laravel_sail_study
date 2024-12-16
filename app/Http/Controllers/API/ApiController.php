<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Aws\CloudFront\CloudFrontClient;
use Aws\Exception\AwsException;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getVideoUrl(Request $request)
    {
        // 許可されたIPアドレスのリスト
        $allowedIps = [
            //'192.168.1.1',    // 許可するIPアドレス
            //'203.0.113.5',    // 別の許可するIPアドレス
            '192.168.65.1',      // ローカルホスト（開発環境用）
        ];

        // リクエスト元のIPアドレスを取得
        $clientIp = $request->ip();
        dd($clientIp);

        // 許可されたIPアドレスかどうかを確認
        if (!in_array($clientIp, $allowedIps)) {
            return response()->json(['message' => 'Access denied'], 403);
        }

        $videoId = $request->get('v_id', '1');
        if ($videoId) {
            $signedUrl = $this->signAPrivateDistribution();
            //dd($signedUrl);

            // CloudFrontから動画データを取得
            $response = Http::get($signedUrl);

            // Content-Typeを動画のMIMEタイプに設定して返す
            return response($response->body(), 200)
            ->header('Content-Type', 'video/mp4');
        }

        return response('', 404);
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

        return $this->signPrivateDistribution(
            $cloudFrontClient,
            $resourceKey,
            $expires,
            $privateKey,
            $keyPairId
        );
    }
}
