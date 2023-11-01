<?php

$argv;

$branch = $argv[1] ?? 'develop';
$project = $argv[2] ?? str_replace('prefix-', '', basename(getcwd()));

$gitTag = trim(shell_exec('git describe --exact-match --tags 2> /dev/null'));
echo "gitTag: $gitTag \n";
echo "project: $project \n";
if(empty($gitTag)) {
    echo "Git tag missing";
    exit;
}

$jenkinsUrl = "https://jenkins.dv.local:8080/job/backend/job/staging/job/$project/buildWithParameters?delay=0sec";
$jenkinsParams = http_build_query([
    'name' => 'component',
    'value' => 'anything',
    'git_branch' => $gitTag,
    'statusCode' => 303,
    'Jenkins-Crumb' => 'e60b533c45d396b11f02b496ae456799300a1f280ccfc0c7b4fcbc0d99457887',
]);

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_PORT           => "443",
    CURLOPT_URL            => $jenkinsUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING       => "",
    CURLOPT_POSTFIELDS     => $jenkinsParams,
    CURLOPT_MAXREDIRS      => 10,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST  => "POST",
    CURLOPT_HTTPHEADER     => [
        "Cache-Control: no-cache",
        'Connection: keep-alive',
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Basic '. base64_encode("<user>:<token>"),
        "Jenkins-Crumb: e60b533c45d396b11f02b496ae456799300a1f280ccfc0c7b4fcbc0d99457887",
    ],
]);

$response = curl_exec($curl);
$err      = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response.PHP_EOL;
    echo 'successfully deployed :)'.PHP_EOL;
}
