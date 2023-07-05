<?php
$format = "json";
$applicationId = "1043753971279152325";
$rakutenRecipeAPI = "https://app.rakuten.co.jp/services/api/Recipe/CategoryRanking/20170426?format={$format}&applicationId=$applicationId";

$context = stream_context_create([
    'http' => [
        'ignore_errors' => true,
    ],
]);

$response = file_get_contents($rakutenRecipeAPI, false, $context);

if ($response !== false) {
    $httpCode = explode(' ', $http_response_header[0])[1];
    if ($httpCode === '200') {
        $recipeData = json_decode($response, true);
        // レスポンスを処理するコード
    } else {
        echo 'エラーが発生しました。HTTPステータスコード: ' . $httpCode;
    }
} else {
    echo 'エラーが発生しました。HTTPリクエストが失敗しました。';
}