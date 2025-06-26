<?php
declare(strict_types=1);

use App\Http\Controllers\ContactController;

require_once __DIR__ . '/../../app/bootstrap.php';


$controller = new ContactController();
$contacts = $controller->index();

include __DIR__ . '/../../resources/views/contacts/index.php';
