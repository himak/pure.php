<?php declare(strict_types=1); ?>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Meno</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php /** @var array $contacts */ ?>
    <?php foreach ($contacts as $c): ?>
        <?php show('contacts._partials.table-row', ['contact' => $c]); ?>
    <?php endforeach; ?>
    </tbody>
</table>
