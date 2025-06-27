<?php
declare(strict_types=1);

require_once __DIR__ . '/../../../app/bootstrap.php';
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Zoznam kontaktov</h4>
    <button class="btn btn-success" data-toggle="modal" data-target="#contactModal">Pridať kontakt</button>
</div>

<?php show('contacts/_partials/table', ['contacts' => $contacts]); ?>
<?php show('contacts/_partials/modal'); ?>
<?php show('contacts/_partials/script'); ?>
