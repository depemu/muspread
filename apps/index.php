<?php

date_default_timezone_set('Asia/Jakarta');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../private/libraries/Muspread.php';

$client = getClient();
$spreadsheetId = isset($_GET['spreadsheetId']) ? $_GET['spreadsheetId'] : '';
$range = isset($_GET['range']) ? $_GET['range'] : '';

$m = new Muspread($client);
$m->setSpreadsheetId($spreadsheetId);

$result = $m->read($range);
echo json_encode($result);
