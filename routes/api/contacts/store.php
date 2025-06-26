<?php
declare(strict_types=1);
header('Content-Type: application/json');

require_once __DIR__ . '/../../../app/bootstrap.php';
use App\Http\Controllers\ContactController;

$controller = new ContactController();
$response = $controller->store($_POST);

if ($response['success']) {
    $contact = \App\Models\Contact::query()->latest('id')->first()->toArray();

    $html = view_content('contacts/_partials/table-row', ['contact' => $contact]);

    $response['row'] = $html;
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
