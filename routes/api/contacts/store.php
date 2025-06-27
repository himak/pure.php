<?php
declare(strict_types=1);
header('Content-Type: application/json');

require_once __DIR__ . '/../../../app/bootstrap.php';

use App\Http\Controllers\Api\ContactController;
use Illuminate\Http\Request;

$request = Request::capture();

$controller = new ContactController();
$response = $controller->store($request);

echo json_encode($response, JSON_UNESCAPED_UNICODE);
