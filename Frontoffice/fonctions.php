<?php
require_once(__DIR__ . '/connexionBDD.php');

function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}
