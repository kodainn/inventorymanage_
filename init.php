<?php
function e(string $str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}