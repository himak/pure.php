<?php
declare(strict_types=1);

require_once __DIR__ . '/../../app/bootstrap.php';

use App\Models\Contact;

$contacts = [
    ['name' => 'Jozef Mrkva', 'email' => 'jozef@example.com'],
    ['name' => 'Anna Kapusta', 'email' => 'anna@example.com'],
    ['name' => 'Marek Zelený', 'email' => 'marek@example.com'],
];

foreach ($contacts as $data) {
    Contact::query()->create($data);
}

echo "Seedovanie tabuľky ". (new Contact())->getTable() ." prebehlo úspešne.\n";
