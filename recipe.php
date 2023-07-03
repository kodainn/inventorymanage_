<?php
$format = "json";
$applicationId = "1043753971279152325";
$rakutenRecipeAPI = "https://app.rakuten.co.jp/services/api/Recipe/CategoryRanking/20170426?format={$format}&applicationId=$applicationId";
$recipeData = json_decode(file_get_contents($rakutenRecipeAPI), true);