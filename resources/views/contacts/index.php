<?php
declare(strict_types=1);

require_once __DIR__ . '/../../../app/bootstrap.php';

use App\Http\Controllers\ContactController;

$controller = new ContactController();
$contacts = $controller->index();
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Zoznam kontaktov</h4>
    <button class="btn btn-success" data-toggle="modal" data-target="#contactModal">Pridať kontakt</button>
</div>

<?php view('contacts/_partials/table', ['contacts' => $contacts]); ?>

<?php include __DIR__ . '/../../views/contacts/_partials/modal.php'; ?>
<?php include __DIR__ . '/../../views/contacts/_partials/script.php'; ?>
