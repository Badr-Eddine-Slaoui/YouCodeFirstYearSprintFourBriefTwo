<?php

$path = __DIR__ . '/../../.env';

if (!file_exists($path)) {
    return;
}

$lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    if (str_starts_with(trim($line), '#')) {
        continue;
    }

    [$key, $value] = array_map('trim', explode('=', $line, 2));

    $value = trim($value, "\"'");

    $_ENV[$key] = $value;
    putenv("$key=$value");
}