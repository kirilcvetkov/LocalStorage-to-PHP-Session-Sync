<?php

require_once '../app.php';

$json = json_decode(file_get_contents('php://input'), true);

if (empty($json['auth']) || ! SetSessionAuth::getInstance()->validate($json['auth'])) {
    exit('Unauthorized');
}

LocalStorageSession::getInstance()->set(
    $json['name'] ?? null,
    $json['value'] ?? null
);