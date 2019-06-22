@setup
function logMessage($message) {
return "echo '\033[32m" .$message. "\033[0m';\n";
}
@endsetup

@servers(['mani' => 'mani'])

<?php

if ( ! isset($server)) {
    throw new Exception('--server must be specified');
}

$repo = 'git@github.com:mani2889/laravel-pro.git';
$wwwRoot = '/var/www/html/';
$env = 'stage';

if ( ! isset($branch)) {
    $devBranch = 'dev';
    $stageBranch = 'stage';
    $productionBranch = 'master';
} else {
    $devBranch = $branch;
    $stageBranch = $branch;
    $productionBranch = $branch;
}

if ($dir === 'dev' || $dir === 'stage' || $dir === 'live') {
    $releaseDir = $wwwRoot . 'releases';
    $logDir = $wwwRoot . 'logs';
    $envFile = '.env';
    $dir = 'dev';
} else {
    $releaseDir = $wwwRoot . 'releases-' . $dir;
    $logDir = $wwwRoot . 'logs-' . $dir;
    $envFile = '.env-' . $dir;
}

if ($server === 'prod3' || $server === 'prod2') {
    $appDir = $wwwRoot . 'app';
} elseif ($server === 'dev' || $server === 'dev2') {
    $appDir = $wwwRoot . $dir;
} else {
    $appDir = $wwwRoot . 'dev';
}


$now = new DateTime();
$dateDisplay = $now->format('Y-m-d H:i:s');
$release = 'release_' . $now->format('YmdHis');
?>

@macro('deploy_dev', ['on' => ['dev', 'dev2']])
fetch_dev_repo
run_dev_composer
update_permissions
update_symlinks
cache_settings
restart_apache
remove_old_files
@endmacro

@task('fetch_dev_repo')
{{ logMessage("\u{1F6B6}  Current release: ". $release) }}
[ -d {{ $releaseDir }} ] || mkdir {{ $releaseDir }};
cd {{ $releaseDir }};
git clone -b {{ $devBranch }} --depth 1 {{ $repo }} {{ $release }};
{{ logMessage("\u{1F6B2}  Source code downloaded.") }}
@endtask

