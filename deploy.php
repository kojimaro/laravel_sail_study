<?php
namespace Deployer;

require 'recipe/laravel.php';
// npm向けのレシピ（テンプレート）を読み込む
require 'contrib/npm.php';

// 環境変数から取得（GitHub Actions の `env` から設定される）
$sshUser = getenv('SSH_USER');
$sshHost = getenv('SSH_HOST');
$deployPath = getenv('DEPLOY_PATH');

// Config

set('repository', 'git@github.com:kojimaro/study_laravelwire.git');

// releaseのバージョンを保持する数
set('keep_releases', 3);

// ブランチ
set('branch', 'develop');

add('shared_files', ['.env']);
add('shared_dirs', ['storage']);
add('writable_dirs', [
    'bootstrap/cache',
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/cache/data',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);

// Hosts
// デプロイ先のサーバーのアドレス（IPまたはホスト名）を設定する
host($sshHost)
    #->set('identity_file', '~/.ssh/id_rsa') //SSH接続に使用する秘密鍵
    ->set('remote_user', 'ec2-user') //SSH接続するユーザー名
    ->set('deploy_path', $deployPath) //デプロイ先のディレクトリ
    ->set('composer_options', '--verbose --prefer-dist --no-progress --no-interaction --optimize-autoloader'); // 開発サーバーには開発用のパッケージ (require-dev) を入れたいので--no-devを削除 (デフォルトだと--no-devが入る)

// Tasks
after('deploy:vendors', 'key:init');
after('artisan:migrate', 'npm:install');
after('npm:install', 'npm:run:build');

// APP_KEYが設定されていない場合に、key:generateを実行するタスク
desc('key generate if not exists');
task('key:init', function () {
    $key = run("grep '^APP_KEY=' {{deploy_path}}/shared/.env | cut -d '=' -f2-");
    if (empty($key)) {
        artisan('key:generate')();
    }
});

// npm run buildを実行するタスク
task('npm:run:build', function () {
    cd('{{release_path}}');
    run('npm run build');
});

// Hooks

after('deploy:failed', 'deploy:unlock');
